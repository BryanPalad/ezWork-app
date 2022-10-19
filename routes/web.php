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

// LISTINGCONTROLLER ROUTE GROUP
Route::controller(ListingController::class)->group(function(){
// All Listings
// get the ListingController class in Controllers folder and the public function index
Route::get('/', 'index');
// SHOW CREATE FORM
// before create or posting a job make sure you are logged in -> uses middleware
Route::get('/listings/create', 'create')->middleware('auth');
// Store listing data (add new listing)
Route::post('/listings','store')->middleware('auth');
// Show Edit form
Route::get('/listings/{listing}/edit', 'edit')->middleware('auth');
// Update listing data
Route::put('/listings/{listing}', 'update')->middleware('auth');
// Delete listing data
Route::delete('/listings/{listing}', 'destroy')->middleware('auth');
// Manage Listings
Route::get('/listings/manage', 'manage')->middleware('auth');
// Single listing
// get the ListingController class in Controllers folder and the public function show
Route::get('/listings/{listing}', 'show');
});


// USERCONTROLLER ROUTE GROUP
Route::controller(UserController::class)->group(function(){
// Show Register/Create Form
// if you are logged in, you can't go to the url register -> uses middleware
Route::get('/register', 'create')->middleware('guest');
// Create new user
Route::post('/users', 'store');
// Log User Out
Route::post('/logout', 'logout')->middleware('auth');
// Show login form
// redirect to login page if the user tries to manipulate the app (post a job);
Route::get('/login', 'login')->name('login')->middleware('guest');
// Login User
Route::post('/users/authenticate','authenticate');
});



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