<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcrptyHasher;


class UserController extends Controller 
{
    public function register(Request $request){
        $this->validate($request, [
            'name' => "required|min:3",
            'district' => "required",
            'mobile_no' => "required|min:10",
            'email' => "required|email|unique:users",
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'district' => $request->district,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'password' => app('hash')->make($request->password),
        ]);

        $token = $user->createToken('authToken')->accessToken;

        return response()->json(['token' => $token],200);
    }

    public function login(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(auth('web')->attempt($credentials)){
            $token = auth('web')->user()->createToken('authToken')->accessToken;
            return response()->json(['token'=>$token],200);
        }else{
            return response()->json(['error'=> 'Unauthorized'],401);
        }
    }
    public function details(){
        return response()->json(['user'=>auth()->user()],200);
    }
}