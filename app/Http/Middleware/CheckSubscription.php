<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
    
        if (!$user || !in_array($user->status_member, ['basic', 'pro'])) {
            // Set pesan alert di session
            session()->flash('alert', [
                'type' => 'warning',
                'message' => 'Silahkan Berlangganan Untuk Mengakses Fitur Buat Uji Tampil'
            ]);
    
            // Redirect ke halaman pricing
            return redirect('/#pricing');
        }
    
        return $next($request);
    }
    
}
