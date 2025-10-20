<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\frontend\HomePageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomePageSectionController;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});



// admin routes
Route::middleware(['auth','role'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');


    // Category Routes
    Route::resource('categories', CategoryController::class, [
        'names' => [
            'index' => 'categories.index',
            'create' => 'categories.create',
            'store' => 'categories.store',
            'show' => 'categories.show',
            'edit' => 'categories.edit',
            'update' => 'categories.update',
            'destroy' => 'categories.destroy',
        ]
    ])->except(['show']); // Remove the show from resource

    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

    // News Routes
    Route::resource('news', NewsController::class);


    // admin profile routes
    Route::get('/profile/edit/{id}', [ProfileController::class, 'adminEdit'])->name('admin.profile');
    Route::patch('/profile/update/{id}', [ProfileController::class, 'adminUpdate'])->name('admin.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('admin.destroy');

    // user management routes
    Route::resource('users', UserController::class)->names([
        'index' => 'admin.users',
        'create' => 'admin.user.create',
        'store' => 'admin.user.store',
        'show' => 'admin.user.show',
        'edit' => 'admin.user.edit',
        'update' => 'admin.user.update',
        'destroy' => 'admin.user.destroy',
    ]);


    //home page section routes

    Route::resource('homepage-section', HomePageSectionController::class)->names([
        'index' => 'admin.homepage',
        'create' => 'admin.homepage.create',
        'store' => 'admin.homepage.store',
        'show' => 'admin.homepage.show',
        'edit' => 'admin.homepage.edit',
        'update' => 'admin.homepage.update',
        'destroy' => 'admin.homepage.destroy',
    ]);


    // admin change password
    Route::post('/password/change', [ProfileController::class, 'adminPasswordChange'])->name('password.change');

    
});



// frontend routes
Route::controller(HomePageController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('/tranding-news', 'trandingNews')->name('tranding.news');
    Route::get('/saradesh-news', 'saradeshNews')->name('saradesh.news');
    Route::get('/national-news', 'nationalNews')->name('national.news');
    Route::get('/politics-news', 'politiesNews')->name('politics.news');
    Route::get('/international-news', 'internationalNews')->name('international.news');
    Route::get('/business-news', 'businessNews')->name('business.news');
    Route::get('video-news', 'videoNews')->name('video.news');
    Route::get('/job-news', 'jobNews')->name('job.news');
    Route::get('/education-news', 'educationNews')->name('education.news');
    Route::get('/pobash-news', 'pobashNews')->name('pobash.news');
    Route::get('/sports-news', 'sportsNews')->name('sports.news');
    Route::get('/entertainment-news', 'entertainmentNews')->name('entertainment.news');
    Route::get('/lifestyle-news', 'lifestyleNews')->name('lifestyle.news');
    Route::get('/ict-news', 'ictNews')->name('ict.news');
    Route::get('/religion-news', 'religionNews')->name('religion.news');
    Route::get('/bottom-jobs', 'bottomJobs')->name('bottom.jobs');

});





require __DIR__.'/auth.php';
