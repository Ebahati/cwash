<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\WashingPointsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\BookingsController;
use App\Http\Controllers\Admin\WashingPointController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\NewBookingsController;
use App\Http\Controllers\CompletedBookingsController;
use App\Http\Controllers\CarWashPointsController;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;
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
// Routes for users


// Routes for users
 
    Route::get('/', [BookingController::class, 'showForm'])->name('booking');
    Route::get('booking', [BookingController::class, 'showForm'])->name('booking.form');
    Route::post('booking', [BookingController::class, 'book']);
    Route::get('contact-info', [PageController::class, 'getContactInfo']);
    Route::get('footer-info', [PageController::class, 'getContactInfo']);
    Route::get('contact', [EnquiryController::class, 'showContactForm'])->name('contact.show');
    Route::post('contact', [EnquiryController::class, 'handleForm'])->name('contact.submit');
    Route::get('location', [WashingPointsController::class, 'index'])->name('location');
    Route::get('washing-plans', [BookingController::class, 'showPlans'])->name('washing-plans');
    Route::post('book', [BookingController::class, 'book'])->name('book');
    Route::get('about', [PageController::class, 'aboutUs'])->name('about');
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');


