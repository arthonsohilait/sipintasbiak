<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeSettingController;

Route::get('/', function () {
    $latestNews = \App\Models\News::where('is_published', true)->latest()->take(3)->get();
    $settings = \App\Models\Setting::where('group', 'home')->get()->pluck('value', 'key');
    return view('welcome', compact('latestNews', 'settings'));
});

Route::get('/berita/{slug}', function ($slug) {
    $news = \App\Models\News::where('slug', $slug)->where('is_published', true)->firstOrFail();
    $relatedNews = \App\Models\News::where('is_published', true)
                    ->where('id', '!=', $news->id)
                    ->latest()
                    ->take(5)
                    ->get();
    return view('news.show', compact('news', 'relatedNews'));
});

Route::get('/pemetaan', function () {
    $projects = \App\Models\MapProject::all();
    return view('pemetaan', compact('projects'));
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/sektor', function () {
    $sectors = \App\Models\Sector::all();
    return view('sektor', compact('sectors'));
});

Route::get('/kawasan', function () {
    return view('kawasan');
});

Route::middleware('guest')->group(function () {
    Route::get('/masuk', function () {
        return view('masuk');
    })->name('login');
    
    Route::post('/masuk', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Hompage Settings Management
    Route::get('/admin/home', [HomeSettingController::class, 'index'])->name('admin.home.index');
    Route::put('/admin/home', [HomeSettingController::class, 'update'])->name('admin.home.update');

    // News Management
    Route::resource('news', \App\Http\Controllers\NewsController::class);

    // Map Projects Management
    Route::resource('map-projects', \App\Http\Controllers\MapProjectController::class);

    // Sectors Management
    Route::resource('sectors', \App\Http\Controllers\SectorController::class);
});
