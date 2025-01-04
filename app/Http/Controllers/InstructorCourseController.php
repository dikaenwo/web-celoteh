<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Coursesa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InstructorCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('instructor-dashboard/makeCourse', [
            'title' => 'Buat Course',
            'categories' => $categories
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
            'cover' => 'required|file',
            'title' => 'required',
            'category_id' => 'required',
            'paid_for' => 'required',
            'description' => 'required'
        ]);
        $validateData['total_lesson'] = 10;
        $validateData['slug'] = Str::slug($validateData['title']);
        if ($request->hasFile('cover')) {
            $validateData['cover'] = $request->file('cover')->store('course-cover');
        }

        Coursesa::create($validateData);
        return redirect('/instructor/course')->with('success', 'Anda akan dijadwalkan, silahkan menunggu operator untuk memvalidasi');
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
