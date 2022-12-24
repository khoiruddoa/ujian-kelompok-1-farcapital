<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $payload = $request->all();
        $validator = Validator::make($payload, [
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $payload['name'],
            'name' => $payload['username'],
            'email' => $payload['email'],
            'password' => bcrypt($payload['password'])
        ]);

        if($user) {
            return response()->json([
                'success' => true,
                'user' => $user,  
            ], 201);
        }

        return response()->json([
            'success' => false,
        ], 409);
    }
}
