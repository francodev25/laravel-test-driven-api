<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    //
    public function __invoke(LoginRequest $request)
    {
        $user = User::whereEmail($request->email)->first();

        if(! $user){
            return response('Credentials does not exist.', Response::HTTP_UNAUTHORIZED);
        }

        if(!$user || ! Hash::check($request->password ,$user->password)){
            return response('Credentials does not match. ', Response::HTTP_UNAUTHORIZED);
        }

        return response(['token' => 'hello']);
    }
}
