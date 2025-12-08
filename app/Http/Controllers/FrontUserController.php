<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Subject;
use App\Models\UserSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Midtrans\Snap;
use Midtrans\Config as MidtransConfig;


class FrontUserController extends Controller
{


    function home() {
        
        $subjects = Subject::where('isReady', 1)->with('users')->take(3)->get();
        return view('front.home', compact('subjects'));
    }

    function about() {
        return view('front.about');
    }
    
    function subject() {
        
        $subjects = Subject::where('isReady', 1)->get();
        return view('front.program', compact('subjects'));
    }
    
    function mySubject() {
        $user = Auth::user();
        $mySubject = UserSubject::where('user_id', $user->id)->where('transaction_status', 'success')
                                ->with('subject')
                                ->get();
        return view('front.programSaya', compact('mySubject'));
    }

    function subjectPreview(Subject $subject) {
        $subject->load('materials');
        
        $userSubject = null;

        if (Auth::check()) {
            $userSubject = UserSubject::where('user_id', Auth::id())
                                        ->where('subject_id', $subject->id)
                                        ->where('transaction_status', 'success')
                                        ->first();
        }

        return view('front.reviewProgram', compact('subject', 'userSubject'));    
    }

    function material($id) {
        $material = Material::find($id);

        $materials = Material::where('subject_id', $material->subject_id)->get();

        $hasEnrolled = UserSubject::where('user_id', Auth::id())
            ->where('subject_id', $material->subject_id)
            ->where('transaction_status', 'success')
            ->exists();

        if (!$hasEnrolled) {
            return redirect()->route('subjectPreview', $material->subject_id)
                ->with('error', 'Anda harus membeli kelas ini untuk mengakses materi.');
        }

        return view('front.materi', compact('material', 'materials'));
    }

    protected function initMidtrans()
    {
        MidtransConfig::$serverKey = config('midtrans.server_key');
        MidtransConfig::$isProduction = filter_var(config('midtrans.is_production'), FILTER_VALIDATE_BOOLEAN);
        MidtransConfig::$isSanitized = config('midtrans.is_sanitized');
        MidtransConfig::$is3ds = config('midtrans.is_3ds');
    }

    public function checkout(Request $request, Subject $subject)
    {

        $this->initMidtrans();

        $orderId = 'order-'.time();
        $harga = $subject->harga;

        $userSubject = userSubject::create([
            'order_id' => $orderId,
            'harga' => $harga,
            'user_id' => Auth::user()->id,
            'subject_id' => $subject->id,
            'transaction_status' => 'pending',
            'tanggal' => date('Y-m-d')
        ]);


        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $harga,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name ?? 'guest',
                'email' => Auth::user()->email,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            $userSubject->update(['snap_token' => $snapToken]);

            return response()->json(['snapToken' => $snapToken, 'orderId' => $orderId,]);
        } catch (\Exception $e) {
            Log::error('Midtrans getSnapToken error: '.$e->getMessage(), [
                'orderId' => $orderId,
                'params' => $params,
            ]);
            return response()->json(['message' => 'Gagal generate token'], 500);
        }
    }

    // public function notification(Request $request)
    // {
    //     $this->initMidtrans();

    //      try {
    //         $notif = new \Midtrans\Notification();

    //         $orderId = $notif->order_id ?? null;

    //         if (!$orderId) {
    //             Log::warning('Midtrans notification missing order_id', (array)$notif);
    //             return response('Bad Request', 400);
    //         }

    //         $order = UserSubject::where('order_id', $orderId)->first();
    //         if (!$order) {
    //             Log::warning('Order not found for midtrans notification', ['order_id' => $orderId]);
    //             return response('Order not found', 404);
    //         }

    //         $order->transaction_status = 'success';
    //         $order->save();

    //         return response('OK', 200);
    //     } catch (\Exception $e) {
    //         Log::error('Midtrans notification error: '.$e->getMessage());
    //         return response('Server Error', 500);
    //     }
    // }

    public function paymentSuccess(Request $request)
    {
        $orderId = $request->query('order_id');
        $userSubject = UserSubject::where('order_id', $orderId)->firstOrFail();
        $subject = Subject::find($userSubject->subject_id);


        $userSubject->transaction_status = 'success';
        $userSubject->save();


        return view('front.reviewProgram', compact('subject', 'userSubject'));
    }
}

