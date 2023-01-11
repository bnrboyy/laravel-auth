<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function onRegister(Request $req) {
        try {
            $createUser = new User();
            $createUser->email = $req->email;
            $createUser->password = Hash::make($req->password);
            $result = $createUser->save();

            if($result) {
                // dd($result);
                return response([
                    'message' => 'ok',
                    'description' => 'Create User Success',
                ], 201);
            } else {
                return response([
                    'message' => 'error',
                    'description' => 'Create User Error'
                ], 401);
            }
        
        } catch (Exception $e) {
            return response([
                'message' => 'server error',
                'description' => $e
            ], 500);
        }
    }

    public function onLogin(Request $req) {
        try {
            $email = $req->email;
            $password = $req->password;

            $auth = Auth::attempt(['email' => $email, 'password' => $password]); // true or false
            // dd($auth);
            if($auth) {
                return response([
                    'message' => 'ok',
                    'description' => 'Login Success',
                ], 200);
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
                    'description' => 'Logout Success.'
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
