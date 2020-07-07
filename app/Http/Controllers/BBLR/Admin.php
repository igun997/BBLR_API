<?php

namespace App\Http\Controllers\BBLR;

use App\BBLR\BblrRule;
use App\BBLR\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Admin extends Controller
{

    public function bblr_rule_read(Request $req){
        $req->validate([
            "limit"=>"required|numeric|gt:0",
            "sort"=>"required|numeric|gt:0",
        ]);
        if ($req->sort == 1){
            $obj = BblrRule::orderBy("created_at","ASC")->paginate($req->limit);

        }else{
            $obj = BblrRule::orderBy("created_at","DESC")->paginate($req->limit);
        }

        return $obj;

    }

    public function bblr_rule_save(Request $req){
        $req->validate([
            "status"=>"required",
            "from_weight"=>"numeric|gt:0",
            "to_weight"=>"required|numeric|gt:0|gt:from_weight",
        ]);

        $data = $req->all();

        $ins = BblrRule::create($data);
        if ($ins){
            return response()->json(["code"=>200,"msg"=>"Success"]);
        }else{
            return response()->json(["code"=>400,"msg"=>"Bad Request"]);
        }
    }

    public function bblr_rule_update(Request $req){
        $req->validate([
            "id"=>"required|exists:bblr_rules,id"
        ]);

        $find = BblrRule::where(["id"=>$req->id])->update($req->all());

        if ($find){
            return response()->json(["code"=>200,"msg"=>"OK"]);
        }else{
            return response()->json(["code"=>400,"msg"=>"Bad Request"]);
        }


    }

    public function bblr_rule_delete($id){
        $find = BblrRule::find($id)->delete();
        return response()->json(["code"=>200,"msg"=>"OK"]);
    }

    public function user_read(Request $req){
        $req->validate([
            "limit"=>"required|numeric|gt:0",
            "sort"=>"required|numeric|gt:0",
        ]);
        if ($req->sort == 1){
            $list_users = User::orderBy("created_at","ASC")->paginate($req->limit);
        }else{
            $list_users = User::orderBy("created_at","DESC")->paginate($req->limit);
        }
        return $list_users;
    }

    public function user_save(Request $req){
        $req->validate([
            "username"=>"required|unique:users,username",
            "password"=>"required",
            "phone"=>"required|unique:users,phone",
            "email"=>"required|unique:users,email",
            "level"=>"required",
            "status"=>"required",
        ]);

        $data = $req->all();
        $data["created_at"] = date("Y-m-d");

        $ins = User::create($data);
        if ($ins){
            return response()->json(["code"=>200,"msg"=>"OK"]);
        }else{
            return response()->json(["code"=>400,"msg"=>"Bad Request"]);
        }

    }

    public function user_detail(Request $req){
        $req->validate([
            "id"=>"required|exists:users,id",
        ]);

        $find = User::where(["id"=>$req->id]);
        if ($find->count() > 0){
            $data = $find->first();
            $data->moms();
            $data->babies();
            $data->nurses();
            return response()->json(["code"=>200,"data"=>$data,"msg"=>"OK"],200);
        }else{
            return response()->json(["code"=>404,"msg"=>"Not Found"],200);
        }



    }

    public function user_update(Request $req,$id){
        $req->validate([
            "email"=>"required",
            "phone"=>"required",
            "level"=>"required",
            "status"=>"required",
        ]);

        if ($req->has("username")){
            return  response()->json(["code"=>400,"msg"=>"Bad Request"]);
        }

        $data = $req->all();
        $data["created_at"] = date("Y-m-d");
        if ($req->has("password")){
            if ($data["password"] == ""){
                unset($data["password"]);
            }
        }
        $up = User::where(["id"=>$id])->update($data);
        if ($up){
            return response()->json(["code"=>200,"msg"=>"OK"]);
        }else{
            return response()->json(["code"=>400,"msg"=>"Bad Request"]);
        }

    }
}
