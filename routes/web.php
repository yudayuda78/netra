<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\BroadcastController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Livewire\Coba;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');


});

    Route::get('broadcast', [BroadcastController::class, 'index'])->name('broadcast.index');
    Route::post('broadcast/message', [BroadcastController::class, 'sendMessage'])->name('broadcast.message')->withoutMiddleware(VerifyCsrfToken::class);


    Route::get('coba', Coba::class)->withoutMiddleware(VerifyCsrfToken::class); 
    Route::get('home', function () {
        return view('home');
    })->name('home.view');
