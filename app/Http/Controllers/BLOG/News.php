<?php

namespace App\Http\Controllers\BLOG;

use App\BLOG\Article;
use App\BLOG\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class News extends Controller
{
    public function feed(Request $req){
        $req->validate([
            "id"=>"exists:articles,id",
            "category_id"=>"exists:articles,category_id",
            "limit"=>"numeric|gt:0",
            "sort"=>"numeric|in:1,2",
        ]);
        if ($req->has("id")){
            $row = Article::where(["id"=>$req->id]);
            if ($req->has("category_id")){
                $row->where(["category_id"=>$req->category_id]);
            }
            if ($row->count() > 0){
                $data = $row->first();
                $data->category_name = (($data->category()->first()->name)?$data->category()->first()->name:NULL);
                return response()->json(["code"=>200,"msg"=>"OK","data"=>$data],200);
            }else{
                return response()->json(["code"=>404,"msg"=>"Not Found"],200);
            }
        }else{
            if ($req->sort == 1){
                $obj = Article::orderBy("created_at","ASC");

            }else{
                $obj = Article::orderBy("created_at","DESC");
            }
            if ($req->has("category_id")){
                $obj->where(["category_id"=>$req->category_id]);
            }
            $obj = $obj->paginate($req->limit);
            $obj->getCollection()->transform(function ($value) {
                // Your code here
                $split = str_split(strip_tags($value->content));
                $new = [];
                $max = 100;
                foreach ($split as $index => $item) {
                    if ($index >= $max && $item == " "){
                        break;
                    }
                    $new[] = $item;
                }
                $value->content = implode("",$new)." . . . .";
                $value->category_name = (($value->category()->first()->name)?$value->category()->first()->name:NULL);
                return $value;
            });
            return $obj;
        }
    }

    public function category(Request $req){
        $req->validate([
            "id"=>"exists:categories,id",
            "parent"=>"required|boolean",
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
                if ($req->parent){
                    $obj->where(["parent_id"=>NULL]);

                }else{
                    $obj->where("parent_id","!=",NULL);

                }
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
}
