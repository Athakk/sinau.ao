<?php

namespace App\Http\Controllers;

use App\Models\UserKelas;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class UserKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!request()->ajax()) {
            return view('admin.histori.index');
        }
        
        // Jika request adalah AJAX (dari JS kita), kirim data JSON
        $data = UserKelas::with(['user', 'kelas'])->orderBy('id', 'desc')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserKelas $userKelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserKelas $userKelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserKelas $userKelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserKelas $userKelas)
    {
        //
    }
}
