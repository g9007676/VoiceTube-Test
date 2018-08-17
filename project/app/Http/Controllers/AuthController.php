<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function register(RegisterFormRequest $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();
        return response(
            [
                'status' => 'success',
                'data' => $user
            ],
            Response::HTTP_OK
        );
    }


    public function login(Request $request, JWTAuth $JWTAuth)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = $JWTAuth->attempt($credentials)) {
            return response(
                [
                    'status' => 'error',
                    'error' => 'invalid.credentials',
                    'msg' => 'Invalid Credentials.'
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
        return response(
            [
                'status' => 'success',
                'token' => $token
            ],
            Response::HTTP_OK
        );
    }


    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return response(
            [
                'status' => 'success',
                'data' => $user
            ],
            Response::HTTP_OK
        );
    }

    public function refresh()
    {
        return response(
            [
                'status' => 'success'
            ],
            Response::HTTP_OK
        );
    }

    public function check(JWTAuth $JWTAuth)
    {
        try {
            $JWTAuth->getToken();
            $JWTAuth->authenticate();
            return response(
                [
                    'status' => 'success'
                ],
                Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return response(
                [
                    'status' => 'error'
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}
