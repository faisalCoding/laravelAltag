<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Day;
use App\Models\StudensState;

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

Route::get('/info/{md5}', function ($md5) {


  $resulte = Day::with('studensStates')->get() ;

if($md5 ==  md5(serialize($resulte))){
  return response()->json([
    "update" => "no update avalble"
  ]);
}

return response()->json([
"md5" => md5(serialize($resulte)),
"data" => $resulte]);
});




