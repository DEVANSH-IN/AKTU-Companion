<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PYQController;
use App\Http\Controllers\QuantumController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
//authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/check',[QuantumController::class,'listQuantumFiles']);
//ADMIN ROUTES
//------------------------CRUD of Quantums--------------------------------------------------
Route::get('/admin/viewQuantums', [QuantumController::class, 'showQuantum'])->name('admin.show.quantum');
Route::post('admin/editQuantums/{id}', [QuantumController::class, 'editQuantums'])->name('admin.edit.quantum');
Route::post('/admin/addQuantum', [QuantumController::class, 'addQuantum'])->name('admin.add.quantum');
Route::post('/admin/deleteQuantum/{id}', [QuantumController::class, 'deleteQuantum'])->name('admin.delete.quantum');

//-----------------------------CRUD of PYQs--------------------------------------------------
Route::get('/admin/viewPYQs', [PYQController::class, 'showPYQ'])->name('admin.show.PYQ');
Route::post('admin/editPYQs/{id}', [PYQController::class, 'editPYQs'])->name('admin.edit.PYQ');
Route::post('/admin/addPYQ', [PYQController::class, 'addPYQ'])->name('admin.add.PYQ');
Route::post('/admin/deletePYQ/{id}', [PYQController::class, 'deletePYQ'])->name('admin.delete.PYQ');


//Students routes
Route::get('/student/viewPYQs',[StudentController::class,'showPYQ']);
Route::get('/student/viewQuantums',[StudentController::class,'showQuantums']);













