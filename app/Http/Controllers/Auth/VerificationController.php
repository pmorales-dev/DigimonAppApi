<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function verify($request){
        $user=User::find($request);
        $user->email_verified_at = now();
        $user->save();
        return view('verification_success',['user'=>$user]);
    }
}
