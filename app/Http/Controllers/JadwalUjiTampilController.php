<?php

namespace App\Http\Controllers;

use App\Models\UjiTampil;
use Illuminate\Http\Request;

class JadwalUjiTampilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ujitampil = UjiTampil::where('is_validate', 1)->paginate(12);
        return view('uji-tampil/jadwaluji', [
            'title' => 'Jadwal Uji Tampil',
            'ujitampil' => $ujitampil
        ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
