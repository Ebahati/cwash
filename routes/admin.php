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
Route::middleware('auth:admin')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('bookings', [BookingsController::class, 'index'])->name('admin.bookings');
    Route::get('new-bookings', [NewBookingsController::class, 'index'])->name('admin.new.bookings');
    // routes/web.php

    Route::get('manage-car-washpoints', [CarWashPointsController::class, 'index'])->name('admin.manage.car.washpoints');
    Route::get('delete-car-washpoint/{id}', [CarWashPointsController::class, 'destroy'])->name('admin.delete.car.washpoint');
    Route::get('edit-car-washpoint/{id}', [CarWashPointsController::class, 'edit'])->name('admin.edit.car.washpoint');
    Route::post('update-car-washpoint/{id}', [CarWashPointsController::class, 'update'])->name('admin.update.car.washpoint');
  
    Route::get('about', [AdminPageController::class, 'editAbout'])->name('admin.about');
    Route::post('about', [AdminPageController::class, 'updateAbout'])->name('admin.updateAbout');
    Route::get('add-booking', [AdminPageController::class, 'createBooking'])->name('admin.addBooking');
    Route::post('add-booking', [AdminPageController::class, 'storeBooking'])->name('admin.storeBooking');
    Route::get('create-booking', [BookingsController::class, 'create'])->name('admin.create_booking');
    Route::get('create-washing-point', [WashingPointController::class, 'create'])->name('admin.create_washing_point');
    Route::post('store-washing-point', [WashingPointController::class, 'store'])->name('admin.store_washing_point');
    Route::get('change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('change-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
    Route::get('enquiries', [EnquiryController::class, 'index'])->name('enquiries.index');
    Route::get('enquiries/read/{id}', [EnquiryController::class, 'markAsRead'])->name('enquiries.read');
    Route::get('all-bookings', [BookingsController::class, 'allBookings'])->name('admin.all.bookings');
    Route::get('booking-details/{bid}/{bookingid}', [BookingsController::class, 'bookingDetails'])->name('admin.booking.details');
    Route::get('update-page/{type}', [AdminPageController::class, 'showUpdatePageForm'])->name('admin.update-page');
    Route::post('update-page/{type}', [AdminPageController::class, 'updatePage'])->name('admin.update-page.post');
    Route::get('completed-bookings', [BookingsController::class, 'completedBookings'])->name('admin.completedBookings');
    Route::get('booking/{id}/confirm-payment', [BookingsController::class, 'showConfirmPaymentForm'])->name('admin.booking.confirmPayment');
    Route::post('booking/{id}/confirm-payment', [BookingsController::class, 'confirmPayment'])->name('admin.booking.confirmPayment');
    Route::post('store-booking', [BookingsController::class, 'store'])->name('admin.store_booking');
    Route::get('delete-booking/{bid}', [BookingsController::class, 'destroy'])->name('admin.delete.booking');
    
});