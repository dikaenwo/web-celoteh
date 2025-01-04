<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\UjiTampil;
use App\Models\UsedCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function Psy\debug;

class UjiTampilController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
       
        return view('uji-tampil/ujitampil', [
            'title' => "Buat Jadwal Uji Tampil"
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
        $validateData = $request->validate([
            'image' => 'required|file',
            'judul_presentasi' => 'required|max:255',
            'nama' => 'required',
            'tanggal_presentasi' => 'required|date',
            'deskripsi' => 'required',
            'jam_tampil' => 'required',
            'zoom_link' => 'required'
        ]);

        $validateData['unique_code'] = Str::random(5);

        if ($request->hasFile('image')) {
            $validateData['image'] = $request->file('image')->store('uji-tampil');
        }

        $validateData['author_id'] = auth()->user()->id;
        UjiTampil::create($validateData);
        return redirect('/uji-tampil/buat-uji-tampil')->with('success', 'Anda akan dijadwalkan, silahkan menunggu operator untuk memvalidasi');

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

    public function ujiTampilDetail(UjiTampil $ujitampil){
        $totalParticipants = $ujitampil->participants->count();
        return view('uji-tampil/ujitampildetails',[
            'title' => 'Uji Tampil Detail',
            'ujitampil' => $ujitampil,
            'totalpartisipan' => $totalParticipants
        ]);
    }

    public function addPoint(Request $request)
    {
        $request->validate([
            'uji_tampil_id' => 'required|exists:uji_tampils,id',
            'unique_code' => 'required|string',
        ]);

        $ujiTampil = UjiTampil::findOrFail($request->input('uji_tampil_id'));

        // Cek apakah kode unik sesuai
        if ($ujiTampil->unique_code == $request->input('unique_code')) {
            $userId = auth()->user()->id;

            // Cek apakah pengguna sudah pernah menggunakan kode ini
            $hasUsedCode = UsedCode::where('user_id', $userId)
                                    ->where('unique_code', $request->input('unique_code'))
                                    ->exists();

            if ($hasUsedCode) {
                return redirect()->back()->with('error', 'Anda sudah menggunakan kode ini sebelumnya.');
            }

            // Tambah poin untuk pengguna
            $newPoints = auth()->user()->point + 5;
            User::where('id', $userId)->update(['point' => $newPoints]);

            // Simpan kode yang telah digunakan
            UsedCode::create([
                'user_id' => $userId,
                'unique_code' => $request->input('unique_code'),
            ]);

            return redirect('/uji-tampil/'.$ujiTampil->id)->with('success', 'Berhasil menambahkan poin.');
        } else {
            return redirect('/uji-tampil/'.$ujiTampil->id)->with('error', 'Kode unik tidak valid.');
        }
    }

    public function validasi_view()
    {
        $ujiTampil = UjiTampil::all();
        return view('instructor-dashboard/validasi-uji-tampil', [
            'title' => "Validasi Uji Tampil",
            'ujiTampils' => $ujiTampil
        ]);  
    }

    // UjiTampilController.php
    public function validateUji(Request $request, $id)
    {
        // Temukan data berdasarkan ID
        $ujiTampil = UjiTampil::findOrFail($id);

        // Update nilai is_validate
        $ujiTampil->is_validate = true;
        $ujiTampil->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data telah divalidasi.');
    }



    
}
