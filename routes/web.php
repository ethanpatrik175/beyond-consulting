<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenueController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Global_;

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

Route::name('front.')->group(function(){
    Route::get('/', [FrontendController::class, 'welcome'])->name('welcome');
    Route::get('/home', [FrontendController::class, 'welcome'])->name('home');
    Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about.us');
    Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');

    Route::get('/events', [FrontendController::class, 'viewEvents'])->name('view.events');
});

Auth::routes();
Route::get('/admin', function(){ return redirect()->route('admin.login'); });
Route::get('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::post('/login-process', [LoginController::class,'loginProcess'])->name('login.process');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('user.dashboard');//->middleware('verified');

Route::middleware(['auth', 'verified'])->name('general.')->group(function(){
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/update-profile-process', [UserController::class, 'updateProfileProcess'])->name('update.profile.process');
    Route::post('/change-password-process', [UserController::class, 'changePasswordProcess'])->name('change.password.process');
    Route::post('/change-picture-process', [UserController::class, 'changePictureProcess'])->name('change.picture.process');
});

Route::middleware(['auth'])->prefix('/admin')->group(function(){
    Route::resource('speakers', SpeakerController::class);
    Route::get('/speaker/trash', [SpeakerController::class, 'trash'])->name('speakers.trash');
    Route::post('/speaker/update-status', [SpeakerController::class, 'updateStatus'])->name('speakers.update.status');
    Route::post('/speaker/restore', [SpeakerController::class, 'restore'])->name('speakers.restore');

    Route::resource('venues', VenueController::class);
    Route::get('/venue/trash', [VenueController::class, 'trash'])->name('venues.trash');
    Route::post('/venue/update-status', [VenueController::class, 'updateStatus'])->name('venues.update.status');
    Route::post('/venue/restore', [VenueController::class, 'restore'])->name('venues.restore');

    Route::resource('sponsors', SponsorController::class);
    Route::get('/sponsor/trash', [SponsorController::class, 'trash'])->name('sponsors.trash');
    Route::post('/sponsor/update-status', [SponsorController::class, 'updateStatus'])->name('sponsors.update.status');
    Route::post('/sponsor/restore', [SponsorController::class, 'restore'])->name('sponsors.restore');

    Route::resource('events', EventController::class);
    Route::get('/event/trash', [EventController::class, 'trash'])->name('events.trash');
    Route::post('/event/update-status', [EventController::class, 'updateStatus'])->name('events.update.status');
    Route::post('/event/restore', [EventController::class, 'restore'])->name('events.restore');
});

Route::post('/create-slug', [GlobalController::class, 'createSlug'])->name('create.slug');
Route::get('/clear', [GlobalController::class, 'clear'])->name('clear');