<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {

      $data = $request->validate([
          'email'=> 'required|email|string',
          'password' => 'required|string|min:6',
      ]);
      $user = User::firstWhere('email' , $data['email']);
      if (!$user|| !Hash::check($data['password'] , $user->password)){
          throw ValidationException::withMessages([
              'email' => ['The provided credentials are incorrect.'],
          ]);
      }
      $token = $user->createToken('api_token')->plainTextToken;
      return response()->json([
          'user' =>$user,
          'token' => $token,
      ]);

    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'logged out successfully',
        ]);
    }
}
