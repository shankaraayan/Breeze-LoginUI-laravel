<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\WorkPostSetupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WebController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/password', [ProfileController::class, 'password_edit'])->name('password.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile-update-picture', [ProfileController::class, 'update_photo'])->name('profile.update.photo');
    Route::patch('/profile-update-aadhar', [ProfileController::class, 'update_aadhar'])->name('update.aadhar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/apply-post', [WorkPostSetupController::class, 'edit'])->name('apply.post.edit');
    Route::patch('/apply-post', [WorkPostSetupController::class, 'update'])->name('apply.post.update');
    Route::patch('/apply-post-update-payment', [WorkPostSetupController::class, 'update_payment'])->name('apply.post.update-payment');

    Route::get('/my-team', [WorkPostSetupController::class, 'my_team'])->name('my.team.view');

    Route::get('/my-code', [ProfileController::class, 'CodeEdit'])->name('my.code.edit');
    Route::patch('/my-code', [ProfileController::class, 'CodeUpdate'])->name('my.code.update');

    //Send Mail
    Route::post('/mail-send', [MailController::class, 'send'])->name('mail.send');
});

require __DIR__ . '/auth.php';