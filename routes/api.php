<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChartsController;
use App\Models\Day;
use App\Models\StudentsState;
use App\Models\User;


use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::get('/info/{md5}', function ($md5) {


  $resulte = Day::with('studentsStates')->orderBy('date', 'desc')->get();

  if ($md5 ==  md5(serialize($resulte))) {
    return response()->json([
      "update" => "no update  avalble"
    ]);
  }

  return response()->json([
    "md5" => md5(serialize($resulte)),
    "data" => $resulte
  ]);
});


Route::get('date', function () {
  return view('date');
});



Route::get('tcount', function () {
  return response()->json([
    'tcoun' => count(StudentsState::get()),
    'mcount' =>  StudentsState::sum('mcount')
  ]);
});


Route::get('trend', function () {
  return StudentsState::select('name')->where('hasFire' , true)->orderBy('created_at','desc')->first();
});

Route::get('mcount', [ChartsController::class,'fiveTopMaxMStudents']);

Route::post('/sanctum/token', function (Request $request) {
  $request->validate([
      'email' => 'required|email',
      'password' => 'required',
      'device_name' => 'required',
  ]);

  $user = User::where('email', $request->email)->first();

  if (! $user || ! Hash::check($request->password, $user->password)) {
      throw ValidationException::withMessages([
          'email' => ['The provided credentials are incorrect.'],
      ]);
  }

  return $user->createToken($request->device_name)->plainTextToken;
});


Route::middleware('auth:sanctum')->get('/user/revoke', function (Request $request) {

  $user = $request->user();
  $user->tokens()->delete();
  return 'tokens are deleted';
});
