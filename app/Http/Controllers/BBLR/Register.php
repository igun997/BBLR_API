<?php

namespace App\Http\Controllers\BBLR;

use App\BBLR\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Register extends Controller
{
    public function index(Request $request){
        $request->validate([
            "username"=>"required|unique:users,username",
            "password"=>"required",
            "email"=>"required|unique:users,email",
            "phone"=>"required",
        ]);

        $data = $request->all();

        $data["status"] = 1;
        $data["level"] = 0;
//        $data["level"] = 3;
        $data["time_created"] = date("Y-m-d");
        $ins = User::insert($data);

        if ($ins){
            return response()->json(["code"=>200,"msg"=>"Success"]);
        }else{
            return response()->json(["code"=>400,"msg"=>"Bad Request"]);
        }

    }
}
