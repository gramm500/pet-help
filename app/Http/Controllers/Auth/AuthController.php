<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signUp(SignUpRequest $request): JsonResponse
    {
        $requestData = $request->validated();
        $requestData['password'] = Hash::make($requestData['password']);

        User::create($requestData);

        return response()->json(['all good bro']);
    }
}
