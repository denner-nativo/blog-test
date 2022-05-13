<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        // $credentials = $request->only('email', 'password');
        $credentials = ["email" => $request->email, "password" =>$request->password];
        $token = auth('api')->attempt($credentials);

        if ($token) {
            // Authentication passed...
            
            $user = User::where('email', $request->email)->first();
            $user->last_login = now();
            $user->save();
            $user->role = $user->role;

            $data = [
                "user" => $user,
                "token" => $token
            ];

            return response()->json($data, 201);
        }else {
            return response()->json('Invalid crendentials', 401);
        }
    }

    public function logout(){
        $u = Auth::user();
        Auth::logout();
        return response()->json($u, 200);
    }

}
