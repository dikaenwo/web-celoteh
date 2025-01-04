<?php

namespace App\Http\Controllers;

use App\Models\Coursesa;
use App\Models\kurikulum;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Lesson $pelajaran, Coursesa $course)
    {
        $courseId = $pelajaran->kurikulum->course_id;
        $kurikulums = Kurikulum::where('course_id', $courseId)->get();

        // Fetch the course related to this lesson
        $course = $pelajaran->kurikulum->course;
        
        // Check if the course requires 'pro' membership and if the user has 'basic' status
        if ( Auth::user()->status_member !== $course->paid_for) {
            // Redirect or show an error message
            return redirect('/')->with('error', 'Maaf, modul ini hanya tersedia untuk member pro.');
        }

        return view('lesson/lesson', [
            'title' => 'Lesson',
            'pelajaran' => $pelajaran,
            'kurikulums' => $kurikulums
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
