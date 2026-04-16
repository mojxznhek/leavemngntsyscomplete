<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;

//public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/aboutus',[PageController::class,'aboutus'])->name('aboutus');
Route::get('/developer',[PageController::class,'developer'])->name('developer');
Route::get('/contactus',[PageController::class,'contactus'])->name('contactus');


//protected routes common to all users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//protected routes for admin role only
Route::middleware('auth','role:admin')->group(function () {
    Route::get('/dashboard', function () {
            return view('dashboard');
    })->name('dashboard');
    Route::resource('users', UserController::class);
    Route::patch('/users/{user}/change-role', [UserController::class, 'changeRole'])->name('users.changeRole');
    Route::resource('leaves', LeaveController::class);
});


//protected route for employee only.
Route::middleware('auth','role:employee')->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'index'])->name('employees.dashboard');
    Route::resource('employee',EmployeeController::class);

});




require __DIR__.'/auth.php';
