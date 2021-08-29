<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $payload = $request->all();
        $payload['password'] = Hash::make($payload['password']);
        
        User::create($payload);

        return $this->sucess([
            'user' => $user,
            'token' => $user->createToken('API token')->plainTextToken
        ]);

    }
}
