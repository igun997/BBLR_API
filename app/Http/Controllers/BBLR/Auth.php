<?php

namespace App\Http\Controllers\BBLR;

use App\BBLR\User;
use App\Http\Controllers\Controller;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class Auth extends Controller
{
   public function index(Request $request){
       $request->validate([
          "username"=>"required",
          "password"=>"required"
       ]);

       $data = $request->all();
       $expired = strtotime(date("Y-m-d H:i:s")) + (60*60)*4;
       if ($request->has("required")){
           $expired = 99999999999999;
       }
       unset($data["required"]);

       $find = User::where(["username"=>$data["username"],"password" => $data["password"],"status"=>1]);

       if ($find->count() > 0){
           $priv = file_get_contents(base_path()."/main.key");
           $row = $find->first();
           $payload = ["id"=>$row->id,"level"=>$row->level,"expired"=>$expired];
           $token = JWT::encode($payload,$priv,"RS256");
           $find->update(["token"=>$token]);

           return response()->json(["code"=>200,"msg"=>"OK","data"=>["token"=>$token]],200);
       }else{
           return response()->json(["code"=>400,"msg"=>"Bad Request"],200);
       }

   }

   public function me(Request $request){
       $info = $request->get("info");

       return response()->json(["code"=>200,"msg"=>"OK","data"=>$info],200);
   }
}
