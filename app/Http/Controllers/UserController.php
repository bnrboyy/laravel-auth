<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use stdClass;

class UserController extends Controller
{
    public function onRegister(Request $req)
    {
        $validator = Validator::make($req->all(), [   //data validation
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        // dd($validator->errors());
        if ($validator->fails()) {
            return response([
                'message' => 'error',
                'errorMessage' => $validator->errors()
            ]);
        }
        // dd($req);

        $createUser = new User();
        if ($createUser) {
            $createUser->email = $req->email;
            $createUser->password = Hash::make($req->password);
            $createUser->save();
            return response([
                'message' => 'ok',
                'description' => 'Create User Success',
            ], 201);
        } else {
            return response([
                'message' => 'error',
                'description' => 'Register Error'
            ], 400);
        }
    }

    public function onGetAdminData()
    {
        try {
            $user = User::where("email", Auth::user()->email)->first();
            $user->name = "admin";
            $user->save();

            return response([
                'message' => 'ok',
                'description' => 'get admin data success'
            ], 200);
        } catch (Exception $e) {
            return response([
                'message' => 'server error',
                'errorMessage' => $e
            ], 500);
        }
    }
    public function onGetUserData()
    {
        try {
            $user = User::where("email", Auth::user()->email)->first();
            $user->name = "user";
            $user->save();

            return response([
                'message' => 'ok',
                'description' => 'get user data success'
            ], 200);
        } catch (Exception $e) {
            return response([
                'message' => 'server error',
                'errorMessage' => $e
            ], 500);
        }
    }

    public function onLogin(Request $req)
    {
        try {
            $data = [
                'email' => $req->email,
                'password' => $req->password
            ];

            if (Auth::attempt($data)) {
                $user = Auth::user();
                $user->tokens()->delete();
                $user->createToken($data['email'], ['admin']); // add Abilities => admin and user

                // $user = User::where('email', $data['email'])->first();
                // $member = Auth::user();
                // $token = urlencode($member->createToken($member->email.time())->plainTextToken);
                // dd($token);
                // $cookie = cookie('jwt', $token, 60);

                return response([
                    'message' => 'ok',
                    'description' => 'Login Success',
                    'data' => Auth::user()
                ]);
            } else {
                return response([
                    'message' => 'error',
                    'description' => 'Login Error'
                ], 401);
            }
        } catch (Exception $e) {
            return response([
                "message" => "error",
                "description" => "Something went wrong.",
                "errorMessage" => $e
            ], 500);
        }
    }
    public function onLogout()
    {
        try {
            Auth::logout(); // logout user

            if (!Auth::check()) {
                return response([
                    'message' => 'ok',
                    'description' => 'Logout Success.',
                    'data' => Auth::user()
                ], 200);
            } else {
                return response([
                    'message' => 'error'
                ], 500);
            }
        } catch (Exception $e) {
            return response([
                'message' => 'error',
                'description' => 'Something went wrong.',
                'errorMessage' => $e
            ]);
        }
    }
}
