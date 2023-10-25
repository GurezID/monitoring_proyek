<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.profile.edit', [
            "title" => "Edit Profile",
            "user" => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|alpha_dash|min:3|max:255',
            'email' => 'required|max:124',
            'profil' => 'image|max:1024',
        ]);

        if ($request->file('profil')) {
            if ($user->profil && $user->profil === 'dafult.jpg') {
            } else {
                if ($user->profil) {
                    Storage::delete($user->profil); 
                }
            }
            $imgPath = $request->file('profil')->store('img/profil');
            $user->update(['profil' => $imgPath]);
        }
       
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
        ]);

        toastr()->success('Successfully Update Profile', 'Sukses');
        return redirect()->back();
    }

    public function destroy(User $user)
    {
        //
    }
}
