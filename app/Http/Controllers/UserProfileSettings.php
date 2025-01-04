<?php

namespace App\Http\Controllers;

use App\Models\UjiTampil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class UserProfileSettings extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user-dashboard/settings', [
            'title' => 'Settings'
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

     public function update(Request $request)
     {
         $user = auth()->user();
     
         $rules = [
             'fullname' => 'sometimes|max:255',
             'username' => 'sometimes',
             'email' => 'sometimes|email',
             'password' => 'sometimes',
             'image' => 'sometimes|file'
         ];
         $validateData = $request->validate($rules);
     
         if (!empty($request->password)) {
             $validateData['password'] = Hash::make($request->password);
         } else {
             unset($validateData['password']);
         }
     
         if ($request->has('cropped_image')) {
             $image_data = $request->input('cropped_image');
             $image_name = time() . '.png';
             $image_path = 'user-images/' . $image_name;
     
             // Decode the image
             $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image_data));
     
             // Store the image in the filesystem
             Storage::put($image_path, $image);
     
             // Delete the previous profile picture if it exists
             if ($user->image && Storage::exists($user->image)) {
                 Storage::delete($user->image);
             }
     
             // Update user's profile picture path
             $validateData['image'] = $image_path;
         }
     
         User::where('id', $user->id)->update($validateData);
     
         return redirect('/dashboard/profile')->with('success', 'Profile updated successfully.');
    }

    public function reducePoints(Request $request)
    {
        $userId = auth()->id();
        $pointsToReduce = 100;

        // Mengambil poin pengguna saat ini
        $user = User::find($userId);
        if ($user->point >= $pointsToReduce) {
            $newPoints = $user->point - $pointsToReduce;

            // Mengupdate poin pengguna
            User::where('id', $userId)->update(['point' => $newPoints]);

            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Insufficient points'], 400);
        }
    }

    public function joinEvent(Request $request)
    {
        $request->validate([
            'uji_tampil_id' => 'required|exists:uji_tampils,id',
        ]);

        $ujiTampil = UjiTampil::findOrFail($request->uji_tampil_id);

        // Check current number of participants
        $currentParticipants = $ujiTampil->participants()->count();
        $maxParticipants = 20; // Define maximum participants

        if ($currentParticipants >= $maxParticipants) {
            return redirect()->back()->with('error', 'Maaf Kuota Partisipan Telah Penuh');
        }

        // Check if user is already a participant
        if ($ujiTampil->participants->contains(auth()->user()->id)) {
            return redirect()->back()->with('error', 'Anda sudah menjadi partisipan.');
        }

        // Add user as participant
        $ujiTampil->participants()->attach(auth()->user()->id);

        return redirect()->back()->with('success', 'Anda berhasil menjadi partisipan.');
    }





     


     


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
