<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AuthController extends Controller
{
    public function signUp(SignUpRequest $request)
    {
        $requestData = $request->validated();
        $requestData['password'] = Hash::make($requestData['password']);

        $user = User::create($requestData);
        $token = $user->createToken(User::USER_TOKEN_KEY)->plainTextToken;

        $request->session()->put('auth', $token);
        return view('play');
    }

    public function login(LoginRequest $request)
    {
        $validator = $request->validated();

        $user = User::whereEmail($validator['email'])->firstOrFail();

        if (!Hash::check($validator['password'], $user->password)) {
            throw new AccessDeniedHttpException();
        }
        $request->session()->start();
//        $token = $user->createToken(User::USER_TOKEN_KEY)->plainTextToken;
//        $request->session()->put('auth', $token);

        return view('play');
    }
}
