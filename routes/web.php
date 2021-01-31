<?php

use Illuminate\Support\Facades\Route;
use App\Models\Day;
use App\Models\StudensState;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/info', function () {

    $bools = array(true,false,false);
$for_db = serialize($bools);



$boolsa = unserialize($for_db);

    return response()->json([
        'for_db' => $for_db,
        'boolsa' => $boolsa[2]
    ]);
});


Route::get('/cd', function () {

$day = Day::create([
    'date' => '12/3  الثلاثاء',
]);


    return  Day::with('studensStates')->get();
});

Route::get('/cs', function () {
    $day = StudensState::create([
        'name'       => 'ابو لستة',
        'hfrom'      => 'الفلق',
        'hto'        => 'الناس',
        'mto'        => 'الناس',
        'mfrom'      => 'القارعة',
        'starsCount' => 2,
        'list'       =>[true,false,false],
        'hasFire'    => true,
        'day_id'      => 2,
    ]);
        return $day;
});