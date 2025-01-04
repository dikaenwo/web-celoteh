<?php

namespace App\Http\Controllers;

use App\Models\Kemajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LacakKemajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = Kemajuan::where('user_id', auth()->id())->get();
        return view('lacak-kemajuan/lacak-kemajuan',[
            'title' => 'Yuk Lacak Kemjuan',
            'histories' => $histories
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
    public function store(Request $tolol)
    {
        $tolol->validate([
            'session_name' => 'required|string|max:255',
            'gesture_score' => 'required|integer',
            'expression_score' => 'required|integer',
            'vocal_quality_score' => 'required|integer',
            'gesture_feedback' => 'required|string',
            'expression_feedback' => 'required|string',
            'vocal_quality_feedback' => 'required|string',
        ]);

        Kemajuan::create([
            'user_id' => auth()->id(),
            'session_name' => $tolol->session_name,
            'gesture_score' => $tolol->gesture_score,
            'expression_score' => $tolol->expression_score,
            'vocal_quality_score' => $tolol->vocal_quality_score, // Ubah nama field ini
            'gesture_feedback' => $tolol->gesture_feedback,
            'expression_feedback' => $tolol->expression_feedback,
            'vocal_quality_feedback' => $tolol->vocal_quality_feedback,
        ]);

        return response()->json(['message' => 'Sesi berhasil disimpan'], 200);
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

    public function lacakKemajuanDetail ($id){
        $history = Kemajuan::find($id);

        // Pastikan data ditemukan, jika tidak bisa lempar 404 atau redirect
        if (!$history) {
            abort(404, 'Data tidak ditemukan');
        }

        if ($history->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk melihat data ini.');
        }
    
        return view('lacak-kemajuan/kemajuan-detail', [
            'title' => 'Lacak Kemajuan',
            'history' => $history
        ]);
    }
}
