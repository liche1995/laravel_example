<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get("/", function(){
    return view("first_index");
});

Route::get("/load_layout_page", function(){
    $now_date = getdate(time());
    $time_string = $now_date["year"] . "/" .  $now_date["mon"] . "/" . $now_date["mday"] 
    . " " . $now_date["hours"] . ":" . $now_date["minutes"] . ":" . $now_date["seconds"] ;
    return view("load_layout_page",["time" => $time_string]);
});

Route::get("/test",function(){
    $now_date = getdate(time());
    $date_string =  $now_date["year"] . "/" .  $now_date["mon"] . "/" . $now_date["mday"] 
    . " " . $now_date["hours"] . ":" . $now_date["minutes"] . ":" . $now_date["seconds"] ;
    echo "right now is：" .$date_string;
});
