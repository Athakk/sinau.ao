<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Subject;
use App\Models\UserSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $mySubject = UserSubject::where('user_id', $user->id)
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
                                    ->first();
    }

    return view('front.reviewProgram', compact('subject', 'userSubject'));    }

    function material($id) {
        $material = Material::find($id);

        $materials = Material::where('subject_id', $material->subject_id)->get();

        $hasEnrolled = UserSubject::where('user_id', Auth::id())
            ->where('subject_id', $material->subject_id)
            ->exists();

        if (!$hasEnrolled) {
            return redirect()->route('subjectPreview', $material->subject_id)
                ->with('error', 'Anda harus membeli kelas ini untuk mengakses materi.');
        }

        return view('front.materi', compact('material', 'materials'));
    }

    function checkout(Subject $subject) {
        
    }
}

