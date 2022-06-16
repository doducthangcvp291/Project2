<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function showList(){
        return User::orderBy('created_at','DESC')->get();
    }

    public function store(Request $request){
        $newUser = new User;
        $newUser->name = $request->user['name'];
        $newUser->email = $request->user['email'];      
        $newUser->save();
        return $newUser;
    }
}
