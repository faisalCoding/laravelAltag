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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/info', function () {
  return response()->json([
       
    "الاحد 12/3" => [
      1 => [
        "name" => "خالد",
        "hfrom" => "القارعة",
        "hto" => "الليل",
        "mto" => "الناس",
        "mfrom" => "المسد",
        "starsCount" => 3,
        "list" => [true,true,true],
        "hasFire" => true,
      ],
      2 => [
        "name" => "حسام",
        "hfrom" => "القارعة",
        "hto" => "الليل",
        "mto" => "الناس",
        "mfrom" => "المسد",
        "starsCount" => 2,
        "list" => [true,false,true],
        "hasFire" => true,
      ],
    ],
    "الاثنين 12/4" => [
      1 => [
        "name" => "خالد",
        "hfrom" => "القارعة",
        "hto" => "الليل",
        "mto" => "الناس",
        "mfrom" => "المسد",
        "starsCount" => 3,
        "list" => [false,false,false],
        "hasFire" => false,
      ],
    ],
    "الاثلاثاء 12/5" => []
  
]);
});

Route::get('/checkUpdate', function () {
  return md5('{"الاحد 12/3":{"1":{"name":"خالد","hfrom":"القارعة","hto":"الليل","mto":"الناس","mfrom":"المسد","starsCount":3,"list":[true,true,true],"hasFire":true},"2":{"name":"حسام","hfrom":"القارعة","hto":"الليل","mto":"الناس","mfrom":"المسد","starsCount":2,"list":[true,false,true],"hasFire":true}},"الاثنين 12/4":{"1":{"name":"خالد","hfrom":"القارعة","hto":"الليل","mto":"الناس","mfrom":"المسد","starsCount":3,"list":[false,false,false],"hasFire":false}},"الاثلاثاء 12/5":[]}');
});

