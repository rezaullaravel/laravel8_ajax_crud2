<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;


Route::get('/',[StudentController::class,'index']);
Route::post('/add/student',[StudentController::class,'addStudent'])->name('add.student');
Route::get('/edit/student/{id}',[StudentController::class,'editStudent'])->name('edit.student');
Route::post('/update/student',[StudentController::class,'updateStudent'])->name('update.student');
Route::post('/delete/student',[StudentController::class,'deleteStudent'])->name('delete.student');
Route::get('/student/pagination',[StudentController::class,'pagination']);
Route::get('/student/search',[StudentController::class,'search'])->name('search.student');



//teacher
Route::get('/teacher/show',[TeacherController::class,'show'])->name('teacher.show');
Route::post('/teacher/store',[TeacherController::class,'store'])->name('teacher.store');
Route::get('/edit/teacher/{id}',[TeacherController::class,'edit']);
Route::post('/update/teacher{id}',[TeacherController::class,'update']);
Route::get('/delete/teacher/{id}',[TeacherController::class,'delete']);
