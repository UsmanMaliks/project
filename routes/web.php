<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\TourController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\PackageController;
use App\Http\Controllers\Dashboard\PaymentController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\BookedTripController;

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


Route::get('/', [FrontendController::class, 'index'])->name('welcome');
Route::get('/alltrips', [FrontendController::class, 'alltrips'])->name('all.trips');
Route::get('/aboutus', [FrontendController::class, 'about'])->name('about.us');
Route::get('/contactus', [FrontendController::class, 'contactus'])->name('contact.us');
Route::get('/searchtour', [FrontendController::class, 'searchtour'])->name('search.tour');
Route::post('/agencytrip', [FrontendController::class, 'agencytrip'])->name('agency.trip');
Route::post('/searchresult', [FrontendController::class, 'searchresult'])->name('search.result');
Route::get('/tourdetail/{id}', [FrontendController::class, 'tripdetail'])->name('trip.detail');
Route::get('/blog', [FrontendController::class, 'videopage'])->name('blog.page');
Route::get('get-video/', [FrontendController::class, 'getVideo'])->name('getVideo');
Route::get('/paymentpage', [PaymentController::class, 'paymentpage'])->name('payment.page');
Route::post('/paycheck',[PaymentController::class, 'paycheck'])->name('subscribe.post');
Route::get('/feedback', [FrontendController::class, 'feedback'])->name('feed.back');
Route::post('/feedbackcreate', [FeedbackController::class, 'createfeedback'])->name('feed.store');



Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Profile Routes
Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
Route::get('/check', [DashboardController::class, 'check'])->name('check');
Route::post('/updateprofile', [DashboardController::class, 'profileupdate'])->name('profile.update');



Route::group(['middleware' => ['permission:User Management']], function () {

    Route::get('/userdata', [AdminController::class, 'usertable'])->name('usertable');
    Route::get('/createrole', [AdminController::class, 'createrole'])->name('createrole');
    Route::post('/storerole', [AdminController::class, 'rolestore'])->name('addrole');
    Route::post('/createuser', [AdminController::class, 'createuser'])->name('admin.adduser');
    Route::get('user/{id}/edit', [AdminController::class, 'edit']);
    Route::post('/useractive', [AdminController::class, 'updateative'])->name('user.active');
    Route::post('/updateuser', [AdminController::class, 'updateuser'])->name('user.update');
    Route::get('user/destroy/{id}', [AdminController::class, 'destroy']);
    Route::get('/roletable', [AdminController::class, 'roletable'])->name('roletable');
    Route::post('/roleupdate', [AdminController::class, 'roleupdate'])->name('role.update');
    Route::get('role/{id}/edit', [AdminController::class, 'editrole']);
    Route::get('role/editpage/{id}', [AdminController::class, 'editafter']);
    Route::get('role/destroy/{id}', [AdminController::class, 'destroy']);
});

Route::group(['middleware' => ['permission:City Table']], function () {
    Route::get('/citytable', [CityController::class, 'index'])->name('city.table');
});




Route::group(['middleware' => ['permission:Tour Management']], function () {
    Route::get('/tourtable', [TourController::class, 'index'])->name('tour.table');
    Route::get('/agencytable', [TourController::class, 'agency'])->name('agency.table');
    Route::get('/createtour', [TourController::class, 'show'])->name('tour.create');
    Route::post('/storetour', [TourController::class, 'store'])->name('tour.store');
    Route::post('/updatetour', [TourController::class, 'update'])->name('tour.update');
    Route::post('/touractive', [TourController::class, 'updateative'])->name('tour.active');
    Route::get('/tour/delete/{id}', [TourController::class, 'destroy'])->name('tour.destroy');
    Route::get('/tour/{id}/edit', [TourController::class, 'edit'])->name('tour.edit');
    Route::get('/tour/editpage/{id}', [TourController::class, 'editafter'])->name('tour.editafter');
});

Route::group(['middleware' => ['permission:Package Management']], function () {
    Route::get('/packagetable', [PackageController::class, 'index'])->name('package.table');
});


Route::group(['middleware' => ['permission:Booked Trips']], function () {
    Route::get('/yourtrips', [BookedTripController::class, 'index'])->name('your.trips');
    Route::get('/bookedtripdata', [BookedTripController::class, 'bookedtripdata']);
});

Route::group(['middleware' => ['permission:Feedback Table']], function () {
    Route::get('/feedbacktable', [FeedbackController::class, 'index'])->name('feedback.table');
    Route::get('feedbackdestroy/{id}', [FeedbackController::class, 'destroy']);
});


