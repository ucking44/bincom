<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LGAController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\AgentNameController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PollingUnitController;
use App\Http\Controllers\AnnouncedLgaResultController;
use App\Http\Controllers\AnnouncedPullResultController;
use App\Http\Controllers\AnnouncedWardResultController;
use App\Http\Controllers\AnnouncedStateResultController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::get('/states', [StateController::class, 'index']);
Route::post('/states-store', [StateController::class, 'store']);
Route::put('/state-update/{id}', [StateController::class, 'update']);
Route::delete('/states-delete/{id}', [StateController::class, 'destroy']);

Route::get('/lga', [LGAController::class, 'index']);
Route::post('/lga-store', [LGAController::class, 'store']);
Route::put('/lga-update/{id}', [LGAController::class, 'update']);
Route::delete('/lga-delete/{id}', [LGAController::class, 'destroy']);

Route::get('/wards', [WardController::class, 'index']);
Route::post('/ward-store', [WardController::class, 'store']);
Route::put('/ward-update/{id}', [WardController::class, 'update']);
Route::delete('/ward-delete/{id}', [WardController::class, 'destroy']);

Route::get('/pollingUnits', [PollingUnitController::class, 'index']);
Route::post('/pollingUnit-store', [PollingUnitController::class, 'store']);
Route::put('/pollingUnit-update/{id}', [PollingUnitController::class, 'update']);
Route::delete('/pollingUnit-delete/{id}', [PollingUnitController::class, 'destroy']);

Route::get('/agents', [AgentNameController::class, 'index']);
Route::post('/agent-store', [AgentNameController::class, 'store']);
Route::put('/agent-update/{id}', [AgentNameController::class, 'update']);
Route::delete('/agent-delete/{id}', [AgentNameController::class, 'destroy']);

Route::get('/party', [PartyController::class, 'index']);
Route::post('/party-store', [PartyController::class, 'store']);
Route::put('/party-update/{id}', [PartyController::class, 'update']);
Route::delete('/party-delete/{id}', [PartyController::class, 'destroy']);

Route::get('/AnnouncedLgaResult', [AnnouncedLgaResultController::class, 'index']);
Route::post('/AnnouncedLgaResult-store', [AnnouncedLgaResultController::class, 'store']);
Route::put('/AnnouncedLgaResult-update/{id}', [AnnouncedLgaResultController::class, 'update']);
Route::delete('/AnnouncedLgaResult-delete/{id}', [AnnouncedLgaResultController::class, 'destroy']);

Route::get('/AnnouncedPullResult', [AnnouncedPullResultController::class, 'index']);
Route::post('/AnnouncedPullResult-store', [AnnouncedPullResultController::class, 'store']);
Route::put('/AnnouncedPullResult-update/{id}', [AnnouncedPullResultController::class, 'update']);
Route::delete('/AnnouncedPullResult-delete/{id}', [AnnouncedPullResultController::class, 'destroy']);

Route::get('/AnnouncedStateResult', [AnnouncedStateResultController::class, 'index']);
Route::post('/AnnouncedStateResult-store', [AnnouncedStateResultController::class, 'store']);
Route::put('/AnnouncedStateResult-update/{id}', [AnnouncedStateResultController::class, 'update']);
Route::delete('/AnnouncedStateResult-delete/{id}', [AnnouncedStateResultController::class, 'destroy']);

Route::get('/AnnouncedWardResult', [AnnouncedWardResultController::class, 'index']);
Route::post('/AnnouncedWardResult-store', [AnnouncedWardResultController::class, 'store']);
Route::put('/AnnouncedWardResult-update/{id}', [AnnouncedWardResultController::class, 'update']);
Route::delete('/AnnouncedWardResult-delete/{id}', [AnnouncedWardResultController::class, 'destroy']);

