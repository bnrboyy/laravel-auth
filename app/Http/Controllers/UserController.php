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

use stdClass; 

class UserController extends Controller
{
    public function onRegister(Request $req) {
        try {
            $createUser = new User();
            $createUser->email = $req->email;
            $createUser->password = Hash::make($req->password);
            $createUser->save();
            return response([
                'message' => 'ok',
                'description' => 'Create User Success',
            ], 201);
        } catch (Exception $e) {
            return response([
                'message' => 'server error',
                'description' => $e
            ], 500);
        }
    }

    public function onLogin(Request $req) {
        try {
            $data = [
                'email' => $req->email,
                'password' => $req->password
            ];

            if(Auth::attempt($data)) {
                $user = Auth::user();
                $user->tokens()->delete();
                $user->createToken($data['email'], ['admin', 'user']);

    

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
    public function onLogout() {
        try {
            Auth::logout(); // logout user
            
            if(!Auth::check()) {
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
