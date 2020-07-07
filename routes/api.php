<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix("v0")->namespace("API")->group(function (){
    Route::post("recognize","Process@recognize");
});

Route::prefix("bblr/basic")->namespace("BBLR")->group(function (){
    Route::post("auth","Auth@index");
    Route::get("me","Auth@me")->middleware("jwt_gate");
    Route::post("register","Register@index");
    Route::get("verify","Register@verify");
});

Route::prefix("bblr/admin")->namespace("BBLR")->middleware("jwt_gate:0")->group(function (){

    Route::get("bblr_rule","Admin@bblr_rule_read");
    Route::post("bblr_rule","Admin@bblr_rule_save");
    Route::put("bblr_rule","Admin@bblr_rule_update");
    Route::delete("bblr_rule/{id}","Admin@bblr_rule_delete");
    //TODO Statstic Di Lewat Dulu
    Route::get("statistic","Admin@statistic");

    Route::get("users","Admin@user_read");
    Route::get("users/detail","Admin@user_detail");
    Route::post("users","Admin@user_save");
    Route::put("users/{id}","Admin@user_update");
    Route::delete("users","Admin@user_delete");
    //TODO Sampe Sini
    Route::get("articles","Admin@article_read");
    Route::get("articles/detail","Admin@detail_article_read");
    Route::post("articles","Admin@article_save");
    Route::put("articles/{id}","Admin@article_update");
    Route::delete("articles","Admin@article_delete");

    Route::get("article_categories","Admin@article_categories_read");
    Route::post("article_categories","Admin@article_categories_save");
    Route::put("article_categories","Admin@article_categories_update");
    Route::delete("article_categories","Admin@article_categories_delete");

});

Route::prefix("bblr/mom")->namespace("BBLR")->group(function (){
    Route::get("statistic","Moms@statistic");
    Route::put("me","Moms@me_update");
    Route::get("articles","Moms@article_read");
    Route::get("articles/detail","Moms@detail_article_read");

    Route::get("babies","Moms@babies_read");
    Route::post("babies","Moms@babies_save");
    Route::put("babies","Moms@babies_update");
    Route::delete("babies","Moms@babies_delete");

    Route::get("treatment","Moms@treatment_read");
    Route::post("treatment","Moms@treatment_save");
    Route::get("treatment/{id}","Moms@detail_treatment");
    Route::get("treatment/{id}/logs","Moms@treatment_logs_read");
    Route::get("treatment/{id}/logs/detail","Moms@treatment_baby_logs_read");
    Route::post("treatment/{id}/logs","Moms@treatment_logs_save");
    Route::put("treatment/{id}/logs","Moms@treatment_logs_update");


});

Route::prefix("bblr/nurse")->namespace("BBLR")->group(function (){
    Route::get("statistic","Nurses@statistic");
    Route::put("me","Nurses@me_update");

    Route::get("treatment","Nurses@treatment_read");
    Route::put("treatment/{id}","Nurses@treatment_update");
    Route::get("treatment/{id}/logs","Nurses@treatment_logs_read");
    Route::get("treatment/{id}/logs/detail","Nurses@treatment_baby_logs_read");
    Route::post("treatment/{id}/logs","Nurses@treatment_logs_save");
    Route::put("treatment/{id}/logs","Nurses@treatment_logs_update");


});
