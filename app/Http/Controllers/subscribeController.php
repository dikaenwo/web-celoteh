<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class subscribeController extends Controller
{

    public function thanksPro(){
       // Set session flag untuk menandai bahwa user telah melakukan pembayaran
       Session::put('payment_completed', true);

       // Redirect ke halaman /thanks-pro
       return redirect('/thanks-pro');
    }

    public function thanksBasic(){
        // Set session flag untuk menandai bahwa user telah melakukan pembayaran
        Session::put('payment_completed_basic', true);
 
        // Redirect ke halaman /thanks-pro
        return redirect('/thanks-basic');
     }
 


    public function basic(){
        if (!Session::has('payment_completed_basic')) {
            return redirect('/')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        // Ambil user yang sedang login
        $userId = Auth::id();

        if (!$userId) {
            return redirect('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Update status_member menjadi 'pro'
        User::where('id', $userId)->update(['status_member' => 'basic']);

        // Hapus session setelah digunakan
        Session::forget('payment_completed_basic');
        
        return view('thanks/thanks-basic',[
            'title' => 'Pembelian Paket Basic'
        ]);
    }

    public function pro(){
        if (!Session::has('payment_completed')) {
            return redirect('/')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        // Ambil user yang sedang login
        $userId = Auth::id();

        if (!$userId) {
            return redirect('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Update status_member menjadi 'pro'
        User::where('id', $userId)->update(['status_member' => 'pro']);

        // Hapus session setelah digunakan
        Session::forget('payment_completed');
        return view('thanks/thanks-pro',[
            'title' => 'Pembelian Paket Pro'
        ]);
    }
}
