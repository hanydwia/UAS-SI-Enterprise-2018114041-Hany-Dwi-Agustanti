<?php


use App\Http\Controllers\Api\StudentsController;
use App\Http\Controllers\Api\AbsensController;
use App\Http\Controllers\Api\JadwalsController;
use App\Http\Controllers\Api\MatakuliahsController;
use App\Http\Controllers\Api\SemestersController;
use App\Http\Controllers\Api\KontraksController;
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

Route::get('', [StudentsController::class, 'index']);
Route::resources([
    'student' => StudentsController::class,
    'absen' => AbsensController::class,
    'matakuliah' => MatakuliahsController::class,
    'jadwal' => JadwalsController::class,
    'semester' => SemestersController::class,
    'kontrak' => KontraksController::class,
]);