<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(AuthUserRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
            return response()->json(['success' => false, 'message' => "No autorizado"],401);

        $data = [
            'token' => $request->user()->createToken('token')->plainTextToken,
        ];

        return response()->json(['success' => true, 'data' => $data, 200]);
    }
}
