<?php

use App\Http\Controllers\ApiContactController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/', [NewsController::class, 'lastNews']);

Route::inertia('/register', 'Register');
Route::inertia('/login', 'Login');

Route::get('/actualites', [NewsController::class, 'index']);
Route::get('/actualites/{id}', [NewsController::class, 'show']);

Route::inertia('/contact', 'Contact');
Route::post('/contact', [ApiContactController::class, 'sendDesktopMail']);

Route::inertia('/services', 'Subscribe')->middleware('auth');

Route::post('/services', [CheckoutController::class, 'store']);
// Route::post('/services/abonnement', [CheckoutController::class, 'subscribe']);
Route::inertia('/checkout', 'CheckoutConfirmation');

Route::post('/checkout', [CheckoutController::class, 'subscribe']);
Route::post('/stripe/intent', [CheckoutController::class, 'newIntent']);



Route::inertia('/profile', 'Profile');

Route::post('/profile', [ProfileController::class, 'updateProfile']);

Route::get('/search', [NewsController::class, 'search'])->name('search');


Route::get('/admin/newsdashboard', [NewsController::class, 'store']);
Route::post('/admin/newsdashboard', [NewsController::class, 'create']);
Route::post('/admin/newsdashboard/edit', [NewsController::class, 'update']);
Route::delete('/admin/newsdashboard/delete', [NewsController::class, 'destroy']);

Route::get('/admin/subscribedashboard', [CheckoutController::class, 'store']);


Route::get('/admin/userdashboard', [ProfileController::class, 'getAllUsers']);
Route::post('/admin/userdashboard', [ProfileController::class, 'create']);
Route::post('/admin/userdashboard/edit', [ProfileController::class, 'update']);
Route::delete('/admin/userdashboard/delete', [ProfileController::class, 'destroy']);





Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
