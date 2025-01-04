<?php

namespace App\Http\Controllers;

use App\Models\Coursesa;
use App\Models\kurikulum;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Coursesa::all();
        $users = User::all();
        return view('instructor-dashboard/instructor-dashboard', [
            'title' => 'Dashboard',
            'courses' => $courses,
            'users' => $users
        ]);
    }

    public function profileView()
    {
        return view('instructor-dashboard/profile', [
            'title' => 'Profile'
        ]);
    }

    public function reviewsView()
    {
        return view('instructor-dashboard/instructor-review', [
            'title' => 'Review'
        ]);
    }

    public function courseView()
    {
        $courses = Coursesa::all();
        return view('instructor-dashboard/instructor-course', [
            'title' => 'Course',
            'courses' => $courses
        ]);
    }

    public function inputLesson(Request $request){
        $validateData = $request->validate([
            'title' => 'required',
            'curriculum_id' => 'required',
            'durasi' => 'required',
            'video' => 'required',
            'bacaan' => 'file|mimes:pdf,docx'
        ]);

        $validateData['slug'] = Str::slug($validateData['title']);

        if ($request->file('bacaan')) {
            $fileName = time() . '_' . $request->file('bacaan')->getClientOriginalName();
            $path = $request->file('bacaan')->storeAs('bacaan', $fileName); // Simpan di folder 'storage/app/public/bacaan'
            $validateData['bacaan'] = $path; // Simpan path file dalam database
        }

        Lesson::create($validateData);
        return redirect('/instructor/course')->with('success', 'Kurikulum Berhasil Ditambahkan');  
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
        
    }

    public function kurikulum(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'course_id' => 'required'
        ]);

        kurikulum::create($validateData);
        return redirect('/instructor/course')->with('success', 'Kurikulum Berhasil Ditambahkan');  
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
