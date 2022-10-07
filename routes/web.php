<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

// Common Resource Routes:
// index - Show all listings
// show - show single listing
// create - show form to create new listing
// store - store new listing
// edit - show form to edit listing
// update - update listing
// destroy - Delete listing

// All Listings
// get the ListingController class in Controllers folder and the public function index
Route::get('/', [ListingController::class, 'index']);

// SHOW CREATE FORM
// before create or posting a job make sure you are logged in -> uses middleware
Route::get('/listings/create', [ListingController::class,'create'])->middleware('auth');

// Store listing data (add new listing)
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update listing data
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete listing data
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Single listing
// get the ListingController class in Controllers folder and the public function show
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register/Create Form
// if you are logged in, you can't go to the url register -> uses middleware
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show login form
// redirect to login page if the user tries to manipulate the app (post a job);
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


// for reference
// Route::get('/hello', function() {
//     return response('<h1>Hello World</h1>', 200)
//     ->header('Content-Type', 'text/plain')
//     ->header('foo', 'bar');// Update listing data
// });

// Route::get('/posts/{id}', function($id) {
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');

// Route::get('search', function(Request $request){
//     return ($request->name . ' ' .  $request->city);
// });