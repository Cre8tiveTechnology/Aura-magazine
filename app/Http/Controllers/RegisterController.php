<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JD\Cloudder\Facades\Cloudder;

class RegisterController extends Controller
{
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  Request $request
     * @return \App\User
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_id' => ['required', 'exists:roles,id'],
            'name' => ['required', 'string', 'min:10'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {

            if ($request->has('photo')) {
                Cloudder::upload($request->photo, $request->name, [
                    'folder' => 'aura/',
                ]);
                $image_url = Cloudder::show(Cloudder::getPublicId());

                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'role_id' => $request->role_id,
                    'photo' => $image_url,
                    'password' => Hash::make($request->password),
                ]);
            } else {

                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'role_id' => $request->role_id,
                    'password' => Hash::make($request->password),
                ]);
            }

        }

    }
}