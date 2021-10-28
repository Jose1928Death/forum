<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuestionController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [QuestionController::class, 'home'])->name('home');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

    //Editar perfil
    Route::get('/profile/edit', [PageController::class,'editProfile']);
    Route::post('/profile/edit', [PageController::class,'postEditProfile']);

    //Pregunta detalle
    Route::get('/question/detail/{post}', [QuestionController::class,'detail'])->name('question.detail');
    Route::get('/question/like/{id}',[QuestionController::class,'like']);

    //Comentario
    Route::post('question/comment/create',[QuestionController::class, 'createCommet']);
});

Route::group(['middleware' => 'NotLogin'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');
    //register
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');
});
