<?php

namespace App\Http\Controllers;

use App\Models\Mentoring;
use Illuminate\Http\Request;

class MentoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mentorings = Mentoring::all();
        return view('mentoring/mentoring',[
            'title' => 'Program Mentoring',
            'mentorings' => $mentorings
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
        $validateData =  $request->validate([
                'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'nama_kelas' => 'required|string|max:255',
                'jam_mulai' => 'required|date_format:H:i',
                'jam_berakhir' => 'required|date_format:H:i',
                'tanggal_mulai' => 'required|date',
                'jadwal' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'bidang_kelas' => 'required|string',
                'nama_mentor' => 'required|string',
        ]);

        if ($request->hasFile('cover')) {
            $validateData['cover'] = $request->file('cover')->store('cover-mentoring');
        }

        Mentoring::create($validateData);
        return redirect('/instructor/buat-mentoring')->with('success', 'Kelas Sudah Dibuat');
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

    public function viewBuatMentoring()
    {
        return view('instructor-dashboard/makeMentoring',[
            'title' => 'Buat Kelas Mentoring'
        ]);
    }

    public function daftarMentoring($id)
    {
        $mentoring = Mentoring::findOrFail($id);
        $user = auth()->user();
    
        // Cek apakah status member user bukan "pro"
        if ($user->status_member !== 'pro') {
            return redirect()->back()->with('error', 'Maaf, kelas ini khusus untuk member pro.');
        }
    
        // Jika member pro, lanjutkan pendaftaran
        $user->mentorings()->attach($mentoring->id);
    
        return redirect()->back()->with('success', 'Berhasil mendaftar ke mentoring!');
    }
    
    

}
