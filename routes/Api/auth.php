<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth;
Route::group([
    'middleware' => 'api',
    'prefix' => 'admin'
], function () {
    Route::post('/login', [Auth\AdminAuthController::class, 'login']);
});