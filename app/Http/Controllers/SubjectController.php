<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!request()->ajax()) {
            return view('admin.subject.index');
        }

        // Jika request adalah AJAX (dari JS kita), kirim data JSON
        $subjects = Subject::orderBy('id', 'asc')->get();
        return response()->json($subjects);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'harga' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'isReady' => 'nullable'
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'isReady'   => $request->has('isReady') ? 'yes' : 'no',        
        ];

        


        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $image_name = time() . '-' . $file->getClientOriginalName();
            
            $path = $file->storeAs('subject', $image_name, 'public');
            
            $data['image'] = $image_name;
            unset($request['file']);
        }
            
        Subject::create($data);
        
        return redirect()->route('admin.subject.index')->with('success', 'Subject berhasil ditambah!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        return view('admin.subject.edit', compact('subject'));
    }
    
    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, Subject $subject)
    {        
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'harga' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'isReady' => 'nullable'
        ]);

        if ($request->hasFile('file')) {
            if ($subject->image) { 
                Storage::disk('public')->delete('subject/' . $subject->image);
            }

            $file = $request->file('file');
            $image_name = time() . '-' . $file->getClientOriginalName();
            
            $path = $file->storeAs('subject', $image_name, 'public');
            
            $subject->image = $image_name;
            unset($request['file']);
        }
        
        $subject->judul = $request->judul;
        $subject->deskripsi = $request->deskripsi;
        $subject->harga = $request->harga;
        $subject->isReady = $request->has('isReady') ? 'yes' : 'no';
        $subject->save();


        
        return redirect()->route('admin.subject.index')->with('success', 'Subject berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        if ($subject->image) {
            Storage::disk('public')->delete('subject/' . $subject->image);
        }

        Subject::destroy($subject->id);
        return response()->json(['status' => 'Subject berhasil dihapus!', 'success' =>'Subject berhasil dihapus!']);


    }
}
