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
Route::get('/about', [WebController::class, 'about']);
Route::get('/event', [WebController::class, 'event']);
Route::get('/gallery', [WebController::class, 'gallery']);
Route::get('/donate', [WebController::class, 'donate']);

Route::get('/about/{content}', [WebController::class, 'dynamic']);


Route::get('/our-footprints', function () {
    return view('our-footprint');
});

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
    Route::post('/apply-post-update-payment', [WorkPostSetupController::class, 'update_payment'])->name('apply.post.update-payment');
    Route::patch('/apply-post-payment-success', [WorkPostSetupController::class, 'paymentsuccess'])->name('apply.post.paymentsuccess-payment');

    Route::get('/my-team', [WorkPostSetupController::class, 'my_team'])->name('my.team.view');

    Route::get('/my-code', [ProfileController::class, 'CodeEdit'])->name('my.code.edit');
    Route::patch('/my-code', [ProfileController::class, 'CodeUpdate'])->name('my.code.update');

    Route::get('/bank-details', [ProfileController::class, 'view_bank'])->name('bank.details.view');
    Route::patch('/bank-details', [ProfileController::class, 'bank_update'])->name('bank.update');
    Route::get('/bank-details-edit', [ProfileController::class, 'bank_edit'])->name('edit.bank');

    Route::post('/mail-send', [MailController::class, 'send'])->name('mail.send');
});

require __DIR__ . '/auth.php';