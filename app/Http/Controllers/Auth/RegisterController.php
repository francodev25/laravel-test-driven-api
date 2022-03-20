<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    //
    public function __invoke(RegisterRequest $request)
    {
        if($request->validated()){
            $user = new User;
 
            $user->name = $request->name;
            $user->email = $request->email;

            $pass = Hash::make($request->password);
            
            $user->password = $pass;
            
            $user->save();
            return response()->json($user,Response::HTTP_CREATED);
        }

    }
}
