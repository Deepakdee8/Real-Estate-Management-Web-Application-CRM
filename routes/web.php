<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

if (App::environment('production')) {
    URL::forceScheme('https');
}
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Admin Routes
 */
Route::get('/admin/login', [App\Http\Controllers\Web\Admin\AuthController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Web\Admin\AuthController::class, 'loginHandle'])->name('admin.login-handle');
Route::get('/admin/logout', [App\Http\Controllers\Web\Admin\AuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', [App\Http\Controllers\Web\Admin\AuthController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth:webadmin');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');

//notification
Route::get('admin/notify', [App\Http\Controllers\Web\Admin\AuthController::class, 'notify'])->name('notify')->middleware('auth:webadmin');
Route::get('admin/markasread/{id}', [App\Http\Controllers\Web\Admin\AuthController::class, 'markasread'])->name('markasread')->middleware('auth:webadmin');
Route::get('user/notifyuser', [App\Http\Controllers\HomeController::class, 'notifyuser'])->name('notifyuser')->middleware('auth');
Route::get('user/markasreaduser/{id}', [App\Http\Controllers\HomeController::class, 'markasreaduser'])->name('markasreaduser')->middleware('auth');

//Property
Route::resource('/admin/property', App\Http\Controllers\Web\Admin\PropertyController::class, ['as' => 'admin'])->middleware('auth:webadmin');
Route::post('/admin/property/search', [App\Http\Controllers\Web\Admin\VisitorController::class, 'propertytypeSearch'])->name('admin.visitor.propertytypeSearch')->middleware('auth:webadmin');

Route::get('/admin/property/photos/{photos}', [App\Http\Controllers\Web\Admin\PropertyController::class, 'photosIndex'])->name('property.photos.index')->middleware('auth:webadmin');
Route::post('/admin/property/photos/', [App\Http\Controllers\Web\Admin\PropertyController::class, 'photosStore'])->name('property.photos.store')->middleware('auth:webadmin');
Route::delete('/admin/property/photos/{photos}', [App\Http\Controllers\Web\Admin\PropertyController::class, 'photosDelete'])->name('property.photos.delete')->middleware('auth:webadmin');
Route::get('admin/property/print/{id}', [App\Http\Controllers\Web\Admin\PropertyController::class, 'print'])->name('admin.property.print')->middleware('auth:webadmin');
Route::get('admin/propertry/pdf/{id}', [App\Http\Controllers\Web\Admin\PropertyController::class, 'pdf'])->name('admin.property.pdf')->middleware('auth:webadmin');
//propertyshare
Route::get('/property/{property}/share', [App\Http\Controllers\Web\Admin\PropertyController::class, 'share'])->name('property.share');
Route::get('/admin/property/select/{property}/Customer/', [App\Http\Controllers\Web\Admin\PropertyController::class,'select'])->name('admin.property.customer.select')->middleware('auth:webadmin');
Route::post('/admin/property/select/Customer/send', [App\Http\Controllers\Web\Admin\PropertyController::class, 'whatsappsend'])->name('admin.property.customer.send')->middleware('auth:webadmin');
Route::post('/admin/property/fetch-names', [App\Http\Controllers\Web\Admin\PropertyController::class, 'fetchNames'])->middleware('auth:webadmin')->name('fetch.names');

Route::resource('/admin/executive', App\Http\Controllers\Web\Admin\UserController::class, ['as' => 'admin'])->middleware('auth:webadmin');
Route::get('/admin/user/edit/{id}', [App\Http\Controllers\Web\Admin\UserController::class, 'editUser'])->middleware('auth:webadmin')->name('admin.user.edit');

Route::get('/admin/admin/edit/{id}', [App\Http\Controllers\Web\Admin\UserController::class, 'editAdmin'])->middleware('auth:webadmin')->name('admin.admin.edit');
Route::resource('/admin/customer', App\Http\Controllers\Web\Admin\CustomerController::class, ['as' => 'admin'])->middleware('auth:webadmin');

Route::get('/admin/customer/attachment/{attachment}', [App\Http\Controllers\Web\Admin\CustomerController::class, 'attachmentIndex'])->name('customer.attachment.index')->middleware('auth:webadmin');
Route::post('/admin/customer/attachment/', [App\Http\Controllers\Web\Admin\CustomerController::class, 'attachmentStore'])->name('customer.attachment.store')->middleware('auth:webadmin');
Route::delete('/admin/customer/attachment/{attachment}', [App\Http\Controllers\Web\Admin\CustomerController::class, 'attachmentDelete'])->name('customer.attachment.delete')->middleware('auth:webadmin');


Route::resource('/admin/visitor', App\Http\Controllers\Web\Admin\VisitorController::class, ['as' => 'admin'])->middleware('auth:webadmin');
Route::resource('/admin/schedule', App\Http\Controllers\Web\Admin\ScheduleController::class, ['as' => 'admin'])->middleware('auth:webadmin');

//Reports
Route::resource('/admin/visitorreport', App\Http\Controllers\Web\Admin\VisitorreportController::class, ['as' => 'admin'])->middleware('auth:webadmin');
Route::resource('/admin/schedulereport', App\Http\Controllers\Web\Admin\SchedulereportController::class, ['as' => 'admin'])->middleware('auth:webadmin');
Route::resource('/admin/propertyreport', App\Http\Controllers\Web\Admin\PropertyReportController::class, ['as' => 'admin'])->middleware('auth:webadmin');


Route::resource('user/property', App\Http\Controllers\Web\User\PropertyController::class, ['as' => 'user'])->middleware('auth');
Route::resource('user/visits', App\Http\Controllers\Web\User\VisitController::class, ['as' => 'user'])->middleware('auth');
Route::resource('user/schedule', App\Http\Controllers\Web\User\ScheduleController::class, ['as' => 'user'])->middleware('auth');
Route::resource('user/customer', App\Http\Controllers\Web\User\CustomerController::class, ['as' => 'user'])->middleware('auth');

Route::get('/user/customer/attachment/{attachment}', [App\Http\Controllers\Web\User\CustomerController::class, 'attachmentIndex'])->name('user.customer.attachment.index')->middleware('auth');
