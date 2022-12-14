<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobPortalController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\EmployerProfileController;

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



// -----------------------------
// JOB LISTING ROUTES
// ----------------------------

//  route to display all jobs from the database 
Route::get('/', [JobPortalController::class, 'index']);

// Route for more information about jobs
Route::get('/jobs/{id}/{job}', [JobPortalController::class, 'show'])->name('jobs.show');


// -----------------------------
//  COMPANY ROUTES
//  ----------------------------

// showing more about the company
Route::get('/company/{id}/{company}', [CompanyController::class, 'index'])->name('company.index');

// storing company profile information
Route::get('/company/create', [CompanyController::class, 'create'])->name('company.view');

Route::post('/company/create', [CompanyController::class, 'store'])->name('company.store');

// updating company cover photo
Route::post('company/coverphoto', [CompanyController::class, 'coverPhoto'])->name('cover.photo');

// updating company logo
Route::post('company/logo', [CompanyController::class, 'companyLogo'])->name('company.logo');



// -----------------------------
//  USER PROFILE ROUTES
//  ----------------------------


// user profile 
Route::get('user/profile', [UserProfileController::class, 'index']);

//storing user profile information
Route::post('user/profile/create', [UserProfileController::class, 'store'])->name('profile.create');

//storing user cover letter
Route::post('user/coverletter', [UserProfileController::class, 'storecoverletter'])->name('cover.letter');

//storing user resume
Route::post('user/resume', [UserProfileController::class, 'storeresume'])->name('user.resume');

// uploading profile picture
Route::post('user/avatar', [UserProfileController::class, 'storeprofilepicture'])->name('avatar');



// -----------------------------
//  EMPLOYER ROUTES
//  ----------------------------


// employer view
Route::view('employer/register', 'auth.employer-register')->name('employer.register');

// employer registration
Route::post('employer/register', [EmployerProfileController::class, 'employerregistration'])->name('emp.register');







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
