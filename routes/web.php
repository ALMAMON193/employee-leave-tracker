<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LeaveHistoryController;
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

Route::get('/', function () {
    return view('home');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Leave request routes
Route::middleware(['auth'])->group(function () {
    Route::get('/leave-request', [LeaveRequestController::class, 'showLeaveRequestForm'])->name('leave.request');
    Route::post('/leave-request', [LeaveRequestController::class, 'submitLeaveRequest'])->name('leave.submit');
    Route::get('/leave-history', [LeaveHistoryController::class, 'showLeaveHistory'])->name('leave.history');
});

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('dashboard', [AdminDashboardController::class, 'showDashboard'])->name('admin.dashboard');
    Route::put('/leave-requests/{leaveRequest}/approve', [LeaveRequestController::class, 'approveLeaveRequest'])->name('leave.approve');
    Route::put('/leave-requests/{leaveRequest}/reject', [LeaveRequestController::class, 'rejectLeaveRequest'])->name('leave.reject');
});


require __DIR__ . '/auth.php';
