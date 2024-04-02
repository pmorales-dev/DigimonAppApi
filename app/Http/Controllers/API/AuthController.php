<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $validateData=$request->validate([
            'name'      =>  'required|max:40',
            'lastname'  =>  'required|max:40',
            'email'     =>  'required|email|unique',
            'password'  =>  'required|confirmed'
        ]);

        $validateData['password'] = Hash::make($request->password);
        $user = User::create($validateData);
        $accessToken = $user->createToken('authToken')->accessToken;
        return response([
            'usuario'       =>  $user->only('name','lastname','email'),
            'access_token'  =>  $accessToken
        ],200);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email'     =>  'email|required',
            'password'  =>  'required'
        ]);

        $user=User::where('email',$request->email)->first();

        if (!Auth::attempt($loginData)) {
            return response(['message' => 'Credenciales no coinciden'],401);
        };
        if (!$user->email_verified_at) {
            return response(['message' => 'User has not verified email'], 401);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user'=>auth()->user()->only('name','lastname'),'access_token'=>$accessToken]);
  
    }

    public function logout(){
        auth()->user()->token()->revoke();
        return response([
            'message'   =>  'Logout Successful'
        ]);
    }

}
