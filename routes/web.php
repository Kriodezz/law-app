<?php

use App\Http\Controllers\Application\AcceptController;
use App\Http\Controllers\Application\CompleteController;
use App\Http\Controllers\Application\UpdateAnswerController;
use App\Http\Controllers\Application\UpdateCommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Application\CreateController;
use App\Http\Controllers\Application\DestroyController;
use App\Http\Controllers\Application\EditController;
use App\Http\Controllers\Application\IndexController;
use App\Http\Controllers\Application\ShowController;
use App\Http\Controllers\Application\StoreController;
use App\Http\Controllers\Application\UpdateController;

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

Route::middleware('auth')->get('/', IndexController::class)->name('application.index');

Route::group(['prefix' => 'applications', 'middleware' => 'auth'], function () {
    Route::get('/', IndexController::class)->name('application.index');
    Route::get('/create', CreateController::class)->name('application.create');
    Route::post('/', StoreController::class)->name('application.store');
    Route::get('/{application}', ShowController::class)->name('application.show');
    Route::patch('/accept/{application}', AcceptController::class)->name('application.accept');
    Route::patch('/complete/{application}', CompleteController::class)->name('application.complete');
    Route::get('/{application}/edit', EditController::class)->name('application.edit');
    Route::patch('/{application}', UpdateController::class)->name('application.update');
    Route::patch('/answer/{application}', UpdateAnswerController::class)->name('application.update.answer');
    Route::patch('/comment/{application}', UpdateCommentController::class)->name('application.update.comment');
    Route::delete('/{application}', DestroyController::class)->name('application.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
