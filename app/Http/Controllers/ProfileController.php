<?php

namespace App\Http\Controllers;

use App\Models\Coursesa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        return view('user-dashboard/profile', [
            'title' => 'Profile'
        ]);
    }

    public function dashboardView(){
        if (!Auth::check()) {
            return redirect('/login');
        }
        $user = auth()->user();
        $courses = Coursesa::all();
        $users = User::all();
        $mentoringClasses = $user->mentorings()->with('pemateri')->get();
        return view('user-dashboard/dashboard', [
            'title' => 'Dashboard',
            'courses' => $courses,
            'users' => $users,
            'mentoringClasses' => $mentoringClasses
        ]);
    }

    public function listUserCourse(){
        $courses = Coursesa::all();
        return view('user-dashboard/list-user-course', [
            'title' => 'Course Saya',
            'courses' => $courses
        ]);
    }

    public function historyPembelian(){
        $ujiTampil = Auth::user()->ujiTampil()->with('pemateri')->get();
        return view('user-dashboard/history-pembelian', [
            'title' => 'Uji Tampil',
            'ujiTampil' => $ujiTampil
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
