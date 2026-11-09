<?php
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\GuestController;
use App\Http\Controllers\WeddingController;
use Illuminate\Support\Facades\Route;

Route::prefix('rika-helmy')->group(function () {
    // Door 1: https://helmykurniawan.my.id/rika-helmy/invite/adit -> Shows the First Page
    Route::get('/invite/{name}', [WeddingController::class, 'index'])->name('wedding.invite');

    // Door 2: https://helmykurniawan.my.id/rika-helmy/invited/adit -> Shows the Second Page
    Route::get('/invited/{name}', [WeddingController::class, 'show'])->name('wedding.opened');

    // The logic to save wishes
    Route::post('/remarks', [WeddingController::class, 'storeRemark'])->name('remarks.store');

    // Admin login
    Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

        Route::get('/guests', [GuestController::class, 'index'])->name('guests.index');
        Route::post('/guests', [GuestController::class, 'store'])->name('guests.store');
        Route::delete('/guests/{guest}', [GuestController::class, 'destroy'])->name('guests.destroy');

        Route::get('/content', [ContentController::class, 'edit'])->name('content.edit');
        Route::post('/content', [ContentController::class, 'update'])->name('content.update');
        Route::post('/content/timeline', [ContentController::class, 'storeTimelineEntry'])->name('content.timeline.store');
        Route::put('/content/timeline/{entry}', [ContentController::class, 'updateTimelineEntry'])->name('content.timeline.update');
        Route::delete('/content/timeline/{entry}', [ContentController::class, 'destroyTimelineEntry'])->name('content.timeline.destroy');
        Route::post('/content/gallery', [ContentController::class, 'storeGalleryPhoto'])->name('content.gallery.store');
        Route::delete('/content/gallery/{photo}', [ContentController::class, 'destroyGalleryPhoto'])->name('content.gallery.destroy');
        Route::post('/content/hero-carousel', [ContentController::class, 'storeHeroCarouselPhoto'])->name('content.herocarousel.store');
        Route::delete('/content/hero-carousel/{photo}', [ContentController::class, 'destroyHeroCarouselPhoto'])->name('content.herocarousel.destroy');
    });
});