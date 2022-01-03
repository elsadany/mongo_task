<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::any('/', [UserController::class,'index'])->name('search');
Route::any('/analytics', [UserController::class,'analytics']);
Route::any('users/all', [UserController::class,'users']);
$users_columns=[
    'id'=>'User Id',
    'first_name'=>'FirstName',
    'last_name'=>'LastName',
    'full_name'=>'FullName',
    'gender'=>'Gender',
    'number_of_messages'=>'NumberOfMessages',
    'age'=>'Age',
    'creation_date'=>'CreationDate'
    
];
define('users_columns',$users_columns);
$operators=[
    '=','!=','>','<','startswith','endswith','contain','exact'
];
define('operators',$operators);