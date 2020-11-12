<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use JD\Cloudder\Facades\Cloudder;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with("role")->withTrashed()->latest()->paginate(10);
        return response()->json(['users' => $users], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'role_id' => ['required', 'exists:roles,id'],
            'name' => ['required', 'string', 'min:10'],
        ]);
        if ($request->photo != null) {
            $use_existing_image = Str::containsAll($request->photo, ['res.', 'cloudinary.']);

            if (!$use_existing_image) {

                $imageName = Str::limit($request->title, 10);
                Cloudder::upload($request['photo'], $imageName, [
                    'folder' => 'aura/',
                ]);

                $image_url = Cloudder::show(Cloudder::getPublicId(),
                    ['format' => 'png']);
            } else {
                $image_url = $request->photo;
            }
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'photo' => isset($image_url) ? $image_url : null,
            'password' => $request->password == null ? $user->password : Hash::make($request->password),
        ];

        $updatedUser = $user->update($data);
        if ($updatedUser) {
            return response()->json('User was updated successfully!', 200);
        } else {
            return response()->json(
                'There was a problem while updating user',
                500
            );
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return response()->json("User has been removed successfully.", 200);
        }
    }

    /**
     * Restores the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        $user = User::onlyTrashed()->findOrFail($request->id);
        if ($user->restore()) {
            return response()->json("User has been restored successfully.", 200);
        }
    }
}
