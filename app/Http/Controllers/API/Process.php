<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Imagick;
use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;

class Process extends Controller
{
    public string $storage_path;
    public function __construct()
    {
        $this->storage_path = "public/process/image";
    }

    public function recognize(Request $req){
        $req->validate([
            "image"=>"mimes:jpg,png|required"
        ]);
        $path = $req->file("image")->store($this->storage_path);
        $link_path = storage_path(str_replace($this->storage_path,"app/public/process/image",$path));
        $public_path = url("storage/".str_replace("public/","",$path));
        $rgb = [];
        $palette = Palette::fromFilename($link_path);
        $extractor = new ColorExtractor($palette);
        $res = $extractor->extract(15);
        foreach ($res as $index => $item) {
            $rgb[] = Color::fromIntToHex($item);
        }
        $xy = NULL;
        try {
            $trim = new Imagick($link_path);
            $xy = [];
            $xy["geo"] = $trim->getImageGeometry();
            $xy["info"] = $trim->getImagePage();
        } catch (\ImagickException $e) {
            $xy = "Imagick Not Installed";
        }




        return response()->json(["status"=>1,"uploaded"=>$link_path,"link"=>$public_path,"rgb"=>$rgb,"xy"=>$xy]);

    }
}
