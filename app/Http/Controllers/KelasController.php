<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

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
        $kelases = kelas::orderBy('id', 'desc')->get();
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
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'harga' => 'required',
        ]);

        if ($request->isReady == "on") {
            $request['isReady'] = "yes";
        } else {
            $request['isReady'] = "no";
        }
        
        Kelas::create($request->all());
        
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
        ]);

        if ($request->isReady == "on") {
            $request['isReady'] = "yes";
        } else {
            $request['isReady'] = "no";
        }

        
        $kelas->judul = $request->judul;
        $kelas->deskripsi = $request->deskripsi;
        $kelas->harga = $request->harga;
        $kelas->isReady = $request->isReady;
        $kelas->update();


        
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
