<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ConnexionUserRequest;
use App\Http\Requests\InscriptionUserRequest;


class UserController extends Controller
{
    public function inscription(InscriptionUserRequest $request){
        $user = User::create($request->all(),201);
        return $user;
    }

    public function connexion(ConnexionUserRequest $request){
        $user = User::where("email", "=", $request->email)->first();
        if(!$user)
            return response("Utilisateur non trouvé",401);
        
        if(!Hash::check($request->password,$user->password))
            return response("mot de passe invalide");

        $token = $user->createToken("abcd")->plainTextToken;
        return $token;
    }
}

