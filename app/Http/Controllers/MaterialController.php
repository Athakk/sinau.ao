<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Materialal;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Subject $subject)
    {        
        if (!request()->ajax()) {
            return view('admin.subject.material.index', compact('subject'));
        }

        return response()->json([
            'materials' => $subject->materials,
            'subject' => $subject
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Subject $subject)
    {
        return view('admin.subject.material.create', compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Subject $subject)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'link_video' => 'nullable',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'link_video' => $request->link_video,
            'kelas_id' => $subject->id
        ];

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '-' . $image->getClientOriginalName();
            
            $path = $image->storeAs('material', $image_name, 'public');
            
            $data['image'] = $image_name;
        }
            
        Material::create($data);
        
        return redirect()->route('admin.subject.material.index', [$subject])->with('success', 'Material berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject, Material $material)
    {
        return view('admin.subject.material.edit', compact('subject', 'material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject, Material $material)
    {        
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'link_video' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            if ($material->image) { 
                Storage::disk('public')->delete('material/' . $material->image);
            }

            $image = $request->file('image');
            $image_name = time() . '-' . $image->getClientOriginalName();
            
            $path = $image->storeAs('material', $image_name, 'public');
            
            $material->image = $image_name;
        }
        
        $material->judul = $request->judul;
        $material->deskripsi = $request->deskripsi;
        $material->link_video = $request->link_video;
        $material->subject_id = $subject->id;
        $material->save();


        
        return redirect()->route('admin.subject.index')->with('success', 'Material berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject, Material $material)
    {
        if ($material->image) {
            Storage::disk('public')->delete('material/' . $material->image);
        }

        Material::destroy($material->id);
        return response()->json(['status' => 'Material berhasil dihapus!', 'success' =>'Materi berhasil dihapus!']);

    }
}
