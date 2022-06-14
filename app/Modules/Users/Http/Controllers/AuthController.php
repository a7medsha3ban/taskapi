<?php

namespace Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Users\Http\Requests\Auth\LoginRequest;
use Users\Models\User;

class AuthController extends Controller
{

    public function login(LoginRequest $request){
        $user = User::where('email',$request->input('email'))->first();
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $token = $user->createToken('token')->plainTextToken;
            return response([
                'user'=>$user,
                'token'=>$token
            ]);
        }
        else{
            return response([
                'message'=>["These credentials doesn't match our records"]
            ]);
        }
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response([
            'message'=>["logged out successfully"]
        ]);
    }
}
