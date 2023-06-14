<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;


Route::get('/',[StudentController::class,'index']);
Route::post('/add/student',[StudentController::class,'addStudent'])->name('add.student');
Route::get('/edit/student/{id}',[StudentController::class,'editStudent'])->name('edit.student');
Route::post('/update/student',[StudentController::class,'updateStudent'])->name('update.student');
Route::post('/delete/student',[StudentController::class,'deleteStudent'])->name('delete.student');
Route::get('/student/pagination',[StudentController::class,'pagination']);
Route::get('/student/search',[StudentController::class,'search'])->name('search.student');
