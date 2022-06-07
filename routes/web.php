<?php

use App\Models\Listing;
use App\Models\listings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ListingController;

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
// // all listings
// Route::get('/', [ListingController::class, 'index']);
// //single listing
// // Route::get('/listings/{id}', function ($id) {
// //     return view('listing', [
// //         'listing' => Listing::find($id)
// //     ]);
// // });

// // all listings
// // Route::get('/', function () {
// //     return view('listings', [

// //         'lsitings' => Listing::all()
// //     ]);
// // });



// // show create form
// Route::get('/listings/create', [ListingController::class, 'create']);
// // store listing data
// Route::post('/listings', [ListingController::class, 'store']);
// // show Edit Form
// Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);
// //update listing
// Route::put('/listings/{listing}', [ListingController::class, 'update']);

// //delete listing
// Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// // // single listing
// Route::get('/listings/{listing}', [ListingController::class, 'show']);
// // show register Create form
// Route::get('/register', [UserController::class, 'create']);
// //create new User
// Route::post('/users', [UserController::class, 'store']);
// // log User Out
// Route::post('/logout', [UserController::class, 'logout']);
// Route::get('/login', [UserController::class, 'login'])->name('login');
// // log in user
// Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// // Manage Listings 
// Route::get('listings/manage', [ListingController::class, 'manage']);

Route::get('/', [ListingController::class, 'index']);

// show create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
// store listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings 
Route::get('listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// show register Create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//create new User
Route::post('/users', [UserController::class, 'store']);

// log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
// show login form
Route::get('/login', [UserController::class, 'login'])->name('login');

// log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

// Manage Listings 
Route::get('listings/manage', [ListingController::class, 'manage']);

Route::get('booking', function () {
    return view('booking');
});
