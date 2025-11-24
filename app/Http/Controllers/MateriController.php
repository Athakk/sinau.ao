<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

        $kelas = Kelas::find($id);
        
        if (!request()->ajax()) {
            return view('admin.kelas.materi.index', compact('kelas'));
        }

        return response()->json([
            'materis' => $kelas->materis,
            'kelas' => $kelas
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $kelas = Kelas::find($id);
        return view('admin.kelas.materi.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $kelas = Kelas::find($id);

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
            'kelas_id' => $kelas->id
        ];

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '-' . $image->getClientOriginalName();
            
            $path = $image->storeAs('materi', $image_name, 'public');
            
            $data['image'] = $image_name;
        }
            
        Materi::create($data);
        
        return redirect()->route('admin.kelas.materi.index', [$kelas])->with('success', 'Materi berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Materi $materi)
    {
        $kelas = Kelas::find($id);
        return view('admin.kelas.materi.edit', compact('kelas', 'materi'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, Materi $materi)
    {        
        $kelas = Kelas::find($id);

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'link_video' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            if ($materi->image) { 
                Storage::disk('public')->delete('materi/' . $materi->image);
            }

            $image = $request->file('image');
            $image_name = time() . '-' . $image->getClientOriginalName();
            
            $path = $image->storeAs('materi', $image_name, 'public');
            
            $materi->image = $image_name;
        }
        
        $materi->judul = $request->judul;
        $materi->deskripsi = $request->deskripsi;
        $materi->link_video = $request->link_video;
        $materi->kelas_id = $kelas->id;
        $materi->save();


        
        return redirect()->route('kelas.index')->with('success', 'Materi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Materi $materi)
    {
        if ($materi->image) {
            Storage::disk('public')->delete('materi/' . $materi->image);
        }

        Materi::destroy($materi->id);
        return response()->json(['status' => 'Materi berhasil dihapus!'])->with('success', 'Materi berhasil dihapus!');

    }
}
