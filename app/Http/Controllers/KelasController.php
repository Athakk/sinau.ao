<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Laravel\Pail\File;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!request()->ajax()) {
            return view('admin.kelas.index');
        }

        // Jika request adalah AJAX (dari JS kita), kirim data JSON
        $kelases = kelas::orderBy('id', 'asc')->get();
        return response()->json($kelases);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kelas.create');
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
            
            $path = $file->storeAs('kelas', $image_name, 'public');
            
            $data['image'] = $image_name;
            unset($request['file']);
        }
            
        Kelas::create($data);
        
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambah!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kelas = Kelas::find($id);
        return view('admin.kelas.edit', compact('kelas'));
    }
    
    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'harga' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'isReady' => 'nullable'
        ]);

        if ($request->hasFile('file')) {
            if ($kelas->image) { 
                Storage::disk('public')->delete('kelas/' . $kelas->image);
            }

            $file = $request->file('file');
            $image_name = time() . '-' . $file->getClientOriginalName();
            
            $path = $file->storeAs('kelas', $image_name, 'public');
            
            $kelas->image = $image_name;
            unset($request['file']);
        }
        
        $kelas->judul = $request->judul;
        $kelas->deskripsi = $request->deskripsi;
        $kelas->harga = $request->harga;
        $kelas->isReady = $request->has('isReady') ? 'yes' : 'no';
        $kelas->save();


        
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);

        if ($kelas->image) {
            Storage::disk('public')->delete('kelas/' . $kelas->image);
        }

        Kelas::destroy($kelas->id);
        return response()->json(['status' => 'Kelas berhasil dihapus!'])->with('success', 'Kelas berhasil dihapus!');


    }
}
