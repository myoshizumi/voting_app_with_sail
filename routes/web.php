<?php

use App\Http\Controllers\IdeaController;
use App\Http\Controllers\RankingManagement;
use App\Http\Controllers\ThanksMessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IdeaController::class, 'index'])->name('idea.index');
Route::get('/ideas/{idea:slug}', [IdeaController::class, 'show'])
// ->middleware(['auth'])
->name('idea.show');
Route::get('/thanks-messeges', [ThanksMessageController::class, 'index'])->name('thanks-message.index')->middleware(['auth']);

Route::get('/users', [UserController::class, 'index'])->name('user.index')->middleware('admin');
Route::get('/ranking-management', RankingManagement::class)->middleware('admin');


require __DIR__ . '/auth.php';