<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;

class AuthController extends Controller
{
    use ApiResponser;

    public function register(RegisterUserRequest $request)
    {
        $payload = $request->all();
        $payload['password'] = Hash::make($payload['password']);
        
        User::create($payload);

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API token')->plainTextToken
        ]);

    }
}
