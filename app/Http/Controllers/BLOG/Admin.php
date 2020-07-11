<?php

namespace App\Http\Controllers\BLOG;

use App\BLOG\Article;
use App\BLOG\Category;
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
                $data = $row->first();
                $data->category_name = (($data->category()->first()->name)?$data->category()->first()->name:NULL);
                return response()->json(["code"=>200,"msg"=>"OK","data"=>$data],200);
            }else{
                return response()->json(["code"=>404,"msg"=>"Not Found"],200);
            }
        }else{
            if ($req->sort == 1){
                $obj = Article::orderBy("created_at","ASC")->paginate($req->limit);

            }else{
                $obj = Article::orderBy("created_at","DESC")->paginate($req->limit);
            }
            $obj->getCollection()->transform(function ($value) {
                // Your code here
                $value->category_name = (($value->category()->first()->name)?$value->category()->first()->name:NULL);
                return $value;
            });
            return $obj;
        }


    }

    public function news_insert(Request $req){
        $path = "/public/blog/article";
        $req->validate([
            "featured_image"=>"mimes:jpg,png,jpeg,gif",
            "featured_video"=>"mimes:mp4",
            "title"=>"required|min:4",
            "content"=>"required|min:10",
            "category_id"=>"exists:categories,id",
        ]);

        $data = $req->all();
        $info = $req->get("info");
        $data["user_id"] = $info->id;
        if ($req->has("featured_image")){
            $path = $req->file("featured_image")->store($path);
            $data["featured_image"] = $path;
        }

        if ($req->has("featured_video")){
            $path = $req->file("featured_video")->store($path);
            $data["featured_video"] = $path;
        }
        $save = Article::create($data);
        if ($save){
            return response()->json(["code"=>200,"msg"=>"OK"],200);
        }else{
            return response()->json(["code"=>500,"msg"=>"Error"],200);
        }

    }

    public function news_update(Request $req,$id){
        $path = "/public/blog/article";
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
                $path = $req->file("featured_image")->store($path);
                $build["featured_image"] = $path;
            }

            if ($req->has("featured_video")){
                $path = $req->file("featured_video")->store($path);
                $build["featured_video"] = $path;
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

    public function category_read(Request $req){
        $req->validate([
            "id"=>"exists:categories,id",
            "parent"=>"boolean",
            "limit"=>"numeric|gt:0",
            "sort"=>"numeric|in:1,2",
        ]);
        if ($req->has("id")){
            $row = Category::where(["id"=>$req->id]);
            if ($req->has("parent")){
                $row->where(["parent_id"=>NULL]);
            }
            if ($row->count() > 0){
                $data = $row->first();
                $data->parent = $data->category()->get();
                return response()->json(["code"=>200,"msg"=>"OK","data"=>$data],200);
            }else{
                return response()->json(["code"=>404,"msg"=>"Not Found"],200);
            }
        }else{
            if ($req->sort == 1){
                $obj = Category::orderBy("created_at","ASC");

            }else{
                $obj = Category::orderBy("created_at","DESC");
            }
            if ($req->has("parent")){
                $obj->where(["parent_id"=>NULL]);
            }
            $obj = $obj->paginate($req->limit);
            $obj->getCollection()->transform(function ($value) {
                // Your code here
                $value->parent = $value->category()->get();
                return $value;
            });
            return $obj;
        }
    }

    public function category_insert(Request $req){
        $req->validate([
            "name"=>"required",
            "parent_id"=>"exists:categories,id",
        ]);

        $data = $req->all();
        $data["created_at"] = date("Y-m-d");
        $save = Category::create($data);
        if ($save){
            return response()->json(["code"=>200,"msg"=>"OK"],200);
        }else{
            return response()->json(["code"=>500,"msg"=>"Error"],200);
        }

    }

    public function category_update(Request $req,$id){
        $req->validate([
            "name"=>"required",
            "parent_id"=>"exists:categories,id",
        ]);

        $find = Category::where(["id"=>$id]);
        if ($find->count() > 0){
            $content = $req->all();
            $build = [
                "name"=>$req->name,
            ];
            if ($req->has("parent_id")){
                $build["parent_id"] = $req->parent_id;
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

    public function category_delete(Request $req,$id){
        $find = Category::where(["id"=>$id]);
        if ($find->count() > 0){
            $find->delete();
            return response()->json(["code"=>200,"msg"=>"OK"]);
        }else{
            return response()->json(["code"=>500,"msg"=>"Error"]);
        }
    }


}
