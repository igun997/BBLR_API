<?php

namespace App\Http\Controllers\BLOG;

use App\BLOG\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function news_read(Request $req){
       $req->validate([
           "id"=>"exists:articles,id",
           "limit"=>"numeric",
           "sort"=>"numeric",
       ]);
        if ($req->has("id")){
            $row = Article::where(["id"=>$req->id]);
            if ($row->count() > 0){
                return response()->json(["code"=>200,"msg"=>"OK","data"=>$row->first()],200);
            }else{
                return response()->json(["code"=>404,"msg"=>"Not Found"],200);
            }
        }else{
            if ($req->sort == 1){
                $obj = Article::orderBy("created_at","ASC")->paginate($req->limit);

            }else{
                $obj = Article::orderBy("created_at","DESC")->paginate($req->limit);
            }

            return $obj;
        }


    }

    public function news_insert(Request $req){
        $req->validate([
            "user_id"=>"required|exists:users,id",
            "featured_image"=>"mimes:jpg,png,jpeg,gif",
            "featured_video"=>"mimes:mp4",
            "title"=>"required|min:4",
            "content"=>"required|min:10",
            "category_id"=>"exists:categories,id",
        ]);

        $data = $req->all();
        $save = Article::create($data);
        if ($save){
            return response()->json(["code"=>200,"msg"=>"OK"],200);
        }else{
            return response()->json(["code"=>500,"msg"=>"Error"],200);
        }

    }

    public function news_update(Request $req,$id){
        $req->validate([
            "featured_image"=>"mimes:jpg,png,jpeg,gif",
            "featured_video"=>"mimes:mp4",
            "title"=>"min:4",
            "content"=>"min:10",
            "category_id"=>"exists:categories,id",
        ]);
        $find = Article::where(["id"=>$id]);
        if ($find->count() > 0){
            $content = $req->all();
            $build = [
                "title"=>$req->title,
                "content"=>$content["content"],
                "category_id"=>$req->category_id,
            ];
            if ($req->has("featured_image")){

            }
            if ($req->has("featured_video")){

            }
            $update = $find->update($build);
            if ($update){
                return response()->json(["code"=>200,"msg"=>"OK"],200);
            }else{
                return response()->json(["code"=>500,"msg"=>"Error"],200);
            }
        }else{
            return response()->json(["code"=>404,"msg"=>"Not Found"],200);
        }
    }

    public function news_delete(Request $req,$id){
       $find = Article::where(["id"=>$id]);
       if ($find->count() > 0){
           $find->delete();
           return response()->json(["code"=>200,"msg"=>"OK"]);
       }else{
           return response()->json(["code"=>500,"msg"=>"Error"]);
       }
    }
}
