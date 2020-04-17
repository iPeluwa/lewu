<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Get All Employees
Route::get('employees', 'EmployeeController@index');
//Get Single Employee
Route::get('employee/{employee}', 'EmployeeController@show');
//Create Employee
Route::post('employees', 'EmployeeController@store');
//Update Employee
Route::put('employee/{employee}', 'EmployeeController@update');
//Delete Employee
Route::delete('employee/{employee}', 'EmployeeController@destroy');


//Get All Trucks
Route::get('trucks', 'TruckController@index');
//Get Single Truck
Route::get('truck/{truck}', 'TruckController@show');
//Create Truck
Route::post('trucks', 'TruckController@store');
//Update Truck
Route::put('truck/{truck}', 'TruckController@update');
//Delete Truck
Route::delete('truck/{truck}', 'TruckController@destroy');


//Get All Projects
Route::get('projects', 'ProjectController@index');
//Get Single Truck
Route::get('project/{project}', 'ProjectController@show');
//Create Truck
Route::post('projects', 'ProjectController@store');
//Update Truck
Route::put('project/{project}', 'ProjectController@update');
//Delete Truck
Route::delete('project/{project}', 'ProjectController@destroy');


//Get All DieselAllocations
Route::get('diesel_allocations', 'DieselAllocationController@index');
//Get Single Truck
Route::get('diesel_allocation/{diesel_allocation}', 'DieselAllocationController@show');
//Create Truck
Route::post('diesel_allocations', 'DieselAllocationController@store');
//Update Truck
Route::put('diesel_allocation/{diesel_allocation}', 'DieselAllocationController@update');
//Delete Truck
Route::delete('diesel_allocation/{diesel_allocation}', 'DieselAllocationController@destroy');


//Get All VehicleMaintenances
Route::get('vehicle_maintenances', 'VehicleMaintenanceController@index');
//Get Single Truck
Route::get('vehicle_maintenance/{vehicle_maintenance}', 'VehicleMaintenanceController@show');
//Create Truck
Route::post('vehicle_maintenance', 'VehicleMaintenanceController@store');
//Update Truck
Route::put('vehicle_maintenance/{vehicle_maintenance}', 'VehicleMaintenanceController@update');
//Delete Truck
Route::delete('vehicle_maintenance/{vehicle_maintenance}', 'VehicleMaintenanceController@destroy');


