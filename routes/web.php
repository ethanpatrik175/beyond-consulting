<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenueController;
use Illuminate\Support\Facades\Auth;
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

Route::name('front.')->group(function(){
    Route::get('/', [FrontendController::class, 'welcome'])->name('welcome');
    Route::get('/home', [FrontendController::class, 'welcome'])->name('home');
    Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about.us');
    Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');
    Route::get('/blog/{slug}', [FrontendController::class, 'blogDetail'])->name('blog.detail');
    Route::get('/events', [FrontendController::class, 'viewEvents'])->name('view.events');
    Route::get('/event/{slug}', [FrontendController::class, 'eventDetail'])->name('event.detail');
    Route::get('/charity-donation', [FrontendController::class, 'charityDonation'])->name('charity.donation');

    Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
    Route::get('/product-promotion', [FrontendController::class, 'productPromotion'])->name('product.promotion');
    Route::get('/products/{slug}', [FrontendController::class, 'productDetail'])->name('product.detail');

    Route::get('/travel-packages', [FrontendController::class, 'travelPackages'])->name('travel.packages');
    Route::get('/travel-package/{slug}', [FrontendController::class, 'travelPackageDetail'])->name('travel.package.detail');
});

Auth::routes();
Route::get('/admin', function(){ return redirect()->route('admin.login'); });
Route::get('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::post('/login-process', [LoginController::class,'loginProcess'])->name('login.process');

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('user.dashboard');//->middleware('verified');
});

Route::middleware(['auth', 'verified'])->name('general.')->group(function(){
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/update-profile-process', [UserController::class, 'updateProfileProcess'])->name('update.profile.process');
    Route::post('/change-password-process', [UserController::class, 'changePasswordProcess'])->name('change.password.process');
    Route::post('/change-picture-process', [UserController::class, 'changePictureProcess'])->name('change.picture.process');
});

/** Admin Routes */
Route::middleware(['auth', 'admin.middleware'])->prefix('/admin')->group(function(){
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

    //blogs
    Route::resource('blogs', PostController::class);
    Route::post('/blog/updates-status-process', [PostController::class, 'updateStatus'])->name('blog.update.status');
    Route::get('blog/trash', [PostController::class, 'trash'])->name('blog.trash');
    Route::post('/blog/restore', [PostController::class, 'restorePost'])->name('blog.restore');
    //tags
    Route::resource('tags', TagController::class);
    Route::post('/tag/updates-status-process', [TagController::class, 'updateStatus'])->name('tag.update.status');
    Route::get('tag/trash', [TagController::class, 'trash'])->name('tag.trash');
    Route::post('/tag/restore', [TagController::class, 'restoretags'])->name('tag.restore');
    //category
    Route::resource('categories', CategoryController::class);
    Route::post('/category/updates-status-process', [CategoryController::class, 'updateStatus'])->name('category.update.status');
    Route::get('category/trash', [CategoryController::class, 'trash'])->name('category.trash');
    Route::post('/category/restore', [CategoryController::class, 'restoreCategory'])->name('category.restore');
    //Comments
    Route::resource('comments', CommentController::class);
    // Route::post('/comment/updates-status-process', [CommentController::class, 'updateStatus'])->name('comment.update.status');
    // Route::get('comment/trash', [CommentController::class, 'trash'])->name('comment.trash');
    // Route::post('/comment/restore', [CommentController::class, 'restorecomments'])->name('comment.restore');
});
/**End Admin Routes */

Route::middleware(['auth'])->prefix()->group(function(){
    Route::get('/book-ticket', [CustomerController::class, 'bookTicket'])->name('book.ticket');
});

Route::post('/create-slug', [GlobalController::class, 'createSlug'])->name('create.slug');
Route::get('/file-path',  [GlobalController::class, 'getPath'])->name('get.assets.path');
Route::get('/clear', [GlobalController::class, 'clear'])->name('clear');