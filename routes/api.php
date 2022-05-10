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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/user/all', function (Request $request) {
    return \DB::table('users')->get();
});

Route::middleware('auth:sanctum')->get('/user-edit/{id}', function (Request $request,$id) {
    $user = \DB::table('users')->where('id',$id)->get();
    return $user;
});

Route::middleware('auth:sanctum')->get('/athenticated', function () {
    return true;
});
Route::post('register', 'RegisterController@register');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout');

Route::middleware('auth:sanctum')->post('/update/{id}', function (Request $request,$id) {
    $name  = $request->name;
    $email = $request->email;
    $res   = \DB::table('users')->where('id',$id)->update(['name' => $name,'email' => $email]);
    return $res;
});


Route::middleware('auth:sanctum')->get('/delete/{id}', function (Request $request,$id) {
    $res   = \DB::table('users')->where('id',$id)->delete();
    return $res;
});