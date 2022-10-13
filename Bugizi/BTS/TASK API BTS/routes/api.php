<?php

use App\Http\Controllers\API\CheckListController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\ItemController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// ROUTE LOGIN & REGISTER
Route::post('/login', [LoginController::class, 'login'])->name('api.login');
Route::post('/register', [LoginController::class, 'register'])->name('api.register');

Route::get('/checklist', [CheckListController::class, 'index'])->name('api.checklist-get')->middleware('jwt.verify');
Route::post('/checklist', [CheckListController::class, 'create'])->name('api.checklist-create')->middleware('jwt.verify');
Route::delete('/checklist/{id}', [CheckListController::class, 'destroy'])->name('api.checklist-destroy')->middleware('jwt.verify');

Route::get('/checklist/{checklist_id}/item/{item_id}', [ItemController::class, 'getItem'])->name('api.get-item')->middleware('jwt.verify');
Route::put('/checklist/{checklist_id}/item/{item_id}', [ItemController::class, 'updateItem'])->name('api.update-item')->middleware('jwt.verify');
Route::put('/checklist/{checklist_id}/item/{item_id}', [ItemController::class, 'rename'])->name('api.rename-item')->middleware('jwt.verify');
Route::delete('/checklist/{checklist_id}/item/{item_id}', [ItemController::class, 'destroy'])->name('api.destroy-item')->middleware('jwt.verify');
