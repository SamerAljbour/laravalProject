<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PropertyController;

// use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RenterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "web" middleware group. Make something great!
|
*/

// الصفحات الثابتة
Route::get('/about', function () {
    return view('frontend.about');
})->name('about');


Route::get('/agents', function () {
    return view('frontend.agents');
})->name('agents');

Route::get('/blog', function () {
    return view('frontend.blog');
})->name('blog');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::get('/viewProfile', function () {
    return view('frontend.profile');
})->name('viewProfile');

Route::get('/property-comparison', function () {
    return view('frontend.property-comparison');
})->name('property-comparison');


Route::get('/property-submit', function () {
    return view('frontend.property-submit');
})->name('property-submit');





Route::get('/dashboard', function () {
    return view('frontend.admin.dashboard');
})->name('dashboard');




Route::get('/login_register', function () {
    return view('login_register');
})->name('login_register');

// تسجيل مستخدم جديد
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

// تسجيل الدخول
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

// لوحة تحكم الـ Admin
// Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// لوحة تحكم الـ Lessor
// Route::get('/lessor/dashboard', [LessorController::class, 'index'])->name('lessor.dashboard');

// لوحة تحكم الـ Renter
// Route::get('/renter/dashboard', [RenterController::class, 'index'])->name('renter.dashboard');

// تسجيل الخروج
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::post('/check-email', [RegisteredUserController::class, 'checkEmail'])->name('check.email');






Route::post('/check-email', [RegisteredUserController::class, 'checkEmail'])->name('check.email');





Route::resource('users', UserController::class);

// ------------------------------------ for home----------------------------------
Route::get('/home', [PropertyController::class, 'home'])->name('home');
Route::get('/property-details/{id}', [PropertyController::class, 'property' ])->name('viewProperty');
Route::get('/property', [PropertyController::class, 'AllProperty'])->name('property');
Route::post('/property', [PropertyController::class, 'AllProperty'])->name('searchProperty');
// Route::post('/property', [PropertyController::class, 'search'])->name('searchProperty');
//---------------------------------add comment------------------------------
Route::post('/property-details/{id}/review', [PropertyController::class, 'addComment'])->name('submitReview');

//Route::get('/dashboardB', function () {
//    return view('frontend.admin.dashboardB');
//})->name('dashboardB');
Route::get('/dashboardB', [PropertyController::class, 'indexbooking'])->name('dashboardB');
Route::put('/dashboardB/{id}/update-status', [PropertyController::class, 'updateBookingStatus'])->name('updateBookingStatus');

// ------------------------------------ for sillar----------------------------------

// ------------------------------------ for sillar----------------------------------

// Route for viewing a list of properties
// Property routes
Route::get('/sreview', [PropertyController::class, 'showReviews'])->name('sreview');


Route::put('/sprofile/update', [PropertyController::class, 'supdate'])->name('sprofile.update');

Route::get('/sprofile', [PropertyController::class, 'showprof'])->name('sprofile.page')->middleware('auth');


Route::get('/create_property', [PropertyController::class, 'indexx'])->name('property.create');
Route::get('/property_index', [PropertyController::class, 'index'])->name('property.index');

Route::get('/property_admin/{property?}', [PropertyController::class, 'manage'])->name('properties.manage');
Route::post('/property_admin', [PropertyController::class, 'store'])->name('properties.store');
Route::put('/property_index/{property}', [PropertyController::class, 'update'])->name('properties.update');
Route::delete('/property_admin/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');
// Route::get('/view_property', function () {
//     return view('frontend.admin.property_create');
// })->name('property_admin');

// Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/dashboard', function () {
        return view('frontend.admin.dashboard');
    })->name('dashboard');
    Route::resource('users', UserController::class);
    Route::get('/profileAdmin', [UserController::class, 'profile'])->name('profile.profileAdmin');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile.show');

});
Route::post('/Logout', [UserController::class, 'destroy'])->name('destroy');
Route::get('/view_property', function () {
 return view('frontend.admin.property_create');
})->name('property_admin');
use App\Http\Controllers\BookingController;

// Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::post('/bookings/store/{id}', [BookingController::class, 'store'])->name('bookings.store');

Route::resource('bookings', BookingController::class);




// ProfileController
use App\Http\Controllers\ProfileController;
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

use App\Http\Controllers\Auth\UserDashboardController;
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard')->middleware('auth');

Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');

use App\Http\Controllers\ReviewController;
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');

