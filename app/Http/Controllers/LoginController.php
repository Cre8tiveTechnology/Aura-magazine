<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * register
     *
     * @param  mixed $request
     * @return void
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentails are invalid'],
            ]);
        }

        $token = $user->createToken($request->email)->plainTextToken;
        return response()->json([
            "user" => $user,
            "token" => $token,
        ]
            , 200);

    }

    /**
     * logout
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return void
     */
    public function logout(Request $request, User $user)
    {
        $email = $request->email;
       $logout = $user->tokens()->where('name', $email)->delete();
        if ($logout) {
            return response()->json(
                ['message' => 'Logged Out'],
                200
            );
        } else {
                return response()->json(
                    ['message' => 'User is not Logged In'],
                    200
                );
        }
    }
}