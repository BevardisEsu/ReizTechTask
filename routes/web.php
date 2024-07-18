<?php

use App\Models\Job;
use App\Jobs\ScrapeJob;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;

Route::get('/redis-test', function () {
    try {
        Redis::connection()->ping();
        return 'Redis is connected!';
    } catch (Exception $e) {
        return 'Redis connection failed: ' . $e->getMessage();
    }
});

Route::post('/jobs', [JobController::class, 'store']);          #API Route to Store
Route::get('/jobs/{id}', [JobController::class, 'show']);       #API Route to Get
Route::delete('/jobs/{id}', [JobController::class, 'destroy']); #API Route to Delete
