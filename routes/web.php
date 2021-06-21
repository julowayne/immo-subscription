<?php

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

// Route::inertia('/actualites', 'News');
Route::get('/actualites', [NewsController::class, 'index']);
Route::inertia('/actualites/1', 'SingleNews');

Route::inertia('/contact', 'Contact');
Route::post('/contact', [ContactController::class, 'sendmail']);

Route::inertia('/services', 'Subscribe');
Route::post('/services', [CheckoutController::class, 'store']);

Route::inertia('/profile', 'Profile');

Route::post('/profile', [ProfileController::class, 'update']);
Route::inertia('/checkout', 'Checkout');

Route::get('/admin/newsdashboard', [NewsController::class, 'store']);
Route::post('/admin/newsdashboard', [NewsController::class, 'create']);
Route::post('/admin/newsdashboard/edit', [NewsController::class, 'update']);
Route::delete('/admin/newsdashboard/delete', [NewsController::class, 'destroy']);



Route::get('/admin/userdashboard', [ProfileController::class, 'getAllUsers']);
Route::post('/admin/userdashboard', [ProfileController::class, 'create']);


Route::inertia('/admin/subscribedashboard', 'Admin/SubscribeDashboard');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
