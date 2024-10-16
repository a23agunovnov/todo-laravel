<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;


Route::get("/register", [UserController::class, "index"]);

Route::post("/register", [UserController::class, "register"]);

//Desde la funcion 'index' en el controlador 'TaskController' retornamos la vista que queremos ver en '/'
Route::get('/', [TaskController::class, 'index']);
Route::post('/', [TaskController::class, 'store']);
Route::get('/edit/{id}', [TaskController::class, 'edit']);
Route::patch('/edit/{id}', [TaskController::class, 'update']);
Route::delete('/{id}', [TaskController::class, 'destroy'])->name('task.destroy');

Route::resource('categories', CategoriesController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class,'login']);