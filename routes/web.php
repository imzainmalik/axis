<?php

use App\Http\Controllers\CalenderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TenentsController;
use App\Http\Controllers\Cronjob;
use App\Http\Controllers\OwnersController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TaskMaintenance;


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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Properties
Route::get('/add-new-property', [PropertyController::class, 'add_new_property'])->name('add_new_property');
Route::post('/create_property', [PropertyController::class, 'create_property'])->name('create_property');
Route::get('/properties', [PropertyController::class, 'properties'])->name('properties');
Route::get('/property-details/{id}', [PropertyController::class, 'property_details'])->name('property_details');

// Units
Route::get('/units', [PropertyController::class, 'units'])->name('units');
Route::post('/create_units', [PropertyController::class, 'create_units'])->name('create_units');
Route::get('/delete_unit/{id}', [PropertyController::class, 'delete_unit'])->name('delete_unit');
Route::get('/list_unit/{id}', [PropertyController::class, 'list_unit'])->name('list_unit');
Route::get('/edit_unit/{id}', [PropertyController::class, 'edit_units'])->name('edit_unit');
Route::post('/update_units/{id}', [PropertyController::class, 'update_units'])->name('update_units');
Route::get('/unit-details/{id}', [PropertyController::class, 'units_details'])->name('units_details');

// Tenants
Route::get('/tenants', [TenentsController::class, 'tenants'])->name('tenants');
Route::get('/add-tenants', [TenentsController::class, 'add_tenants'])->name('add_tenants');
Route::get('/get_units_by_property/{id}', [TenentsController::class, 'get_units'])->name('get_units');
Route::post('/create_tenants', [TenentsController::class, 'create_tenants'])->name('create_tenants');
Route::get('/edit_tenants/{id}', [TenentsController::class, 'edit_tenants'])->name('edit_tenants');
Route::post('/update_tenants/{id}', [TenentsController::class, 'update_tenants'])->name('update_tenants');
Route::get('/edit_tenants/{id}', [TenentsController::class, 'edit_tenants'])->name('edit_tenants');
Route::get('/delete_tenant/{id}', [TenentsController::class, 'delete_tenant'])->name('delete_tenant');
Route::get('/monthly-rent', [TenentsController::class, 'create_rent'])->name('create_rent');
Route::post('/store_payment', [TenentsController::class, 'store_payment'])->name('store_payment');
Route::get('/monthly-rent-history/{id}', [TenentsController::class, 'payment_history'])->name('payment_history');

// Owners
Route::get('/owners', [OwnersController::class, 'index'])->name('owners');
Route::get('/add_owners', [OwnersController::class, 'addowners'])->name('add_owners');
Route::post('/create_owner', [OwnersController::class, 'create_owner'])->name('create_owner');
Route::get('/delete_owners/{id}', [OwnersController::class, 'delete_owners'])->name('delete_owners');
Route::get('/edit-owner/{id}', [OwnersController::class, 'edit_owner'])->name('edit_owner');
Route::post('/update_owner/{id}', [OwnersController::class, 'update_owner'])->name('update_owner');

// Leases
Route::get('/leases', [LeaseController::class, 'leases'])->name('leases'); 
Route::get('/lease_inactive/{id}', [LeaseController::class, 'lease_inactive'])->name('lease_inactive'); 
Route::get('/lease-edit/{id}', [LeaseController::class, 'edit'])->name('lease_edit'); 
Route::post('/lease-update/{id}', [LeaseController::class, 'update'])->name('lease_update'); 
Route::get('/lease_add', [LeaseController::class, 'lease_add'])->name('lease_add'); 
Route::post('/create_lease', [LeaseController::class, 'create_lease'])->name('create_lease'); 
Route::get('/lease_active/{id}', [LeaseController::class, 'lease_activate'])->name('lease_active'); 

// Task & Maintenance
Route::get('/task-maintenance', [TaskMaintenance::class, 'task_maintenance'])->name('task_maintenance');
Route::get('/create-task-maintenance', [TaskMaintenance::class, 'create'])->name('create_task_maintenance');
Route::get('/task-maintenance-details/{id}', [TaskMaintenance::class, 'show'])->name('task_details');
Route::get('/edit-task-maintenance/{id}', [TaskMaintenance::class, 'edit'])->name('edit_task_maintenance');

Route::post('/store_task_maintenance', [TaskMaintenance::class, 'store'])->name('tasks_store');
Route::get('/delete_task_maintenance/{id}', [TaskMaintenance::class, 'delete_task_maintenance'])->name('delete_task_maintenance');
Route::post('/update_task_maintenance/{id}', [TaskMaintenance::class, 'update_task_maintenance'])->name('update_task_maintenance');


// Notes
Route::get('/notes', [NoteController::class, 'index'])->name('notes');
Route::get('/create-notes', [NoteController::class, 'create_notes'])->name('create_notes');
Route::post('/store_notes', [NoteController::class, 'store_notes'])->name('store_notes');
Route::get('/delete_notes/{id}', [NoteController::class, 'delete_notes'])->name('delete_notes');

// map
Route::get('/map', [MapController::class, 'index'])->name('map');
Route::get('/map/property/{id}', [MapController::class, 'property'])->name('map.property');
Route::get('/get_map_data', [MapController::class, 'get_map_data'])->name('get_map_data');

Route::get('/calender', [CalenderController::class, 'index'])->name('calender');
// CronJobs
Route::get('/makeLogForUnpaidRent', [Cronjob::class, 'makeLogForUnpaidRent'])->name('makeLogForUnpaidRent');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
