<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Register', [
            'title' => 'Register'
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
        // Validate the request
        $validateData = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255|confirmed',
            'cropped_image' => 'required|string', // Validate the cropped image
            'accept_pp' => 'required',
        ]);

        $validateData['password'] = Hash::make($request->password);

        // Handle image upload and processing
        if ($request->has('cropped_image')) {
            $image_data = $request->input('cropped_image');
            $image_name = time() . '.png';
            $image_path = 'user-images/' . $image_name;

            // Decode the image
            $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image_data));

            // Store the image in the filesystem
            Storage::put($image_path, $image);

            // Add the image path to the validated data
            $validateData['image'] = $image_path;
        }

        // Create the user
        User::create($validateData);

        // Redirect to login page with a success message
        return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Login');
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
