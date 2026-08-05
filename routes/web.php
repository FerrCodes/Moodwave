<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalNotes = auth()->user()->notes()->count();
    $favoriteMood = auth()->user()->notes()
        ->select('mood', \DB::raw('count(*) as total'))
        ->groupBy('mood')
        ->orderBy('total', 'desc')
        ->first();

    $favoriteSong = auth()->user()->notes()
        ->orderBy('created_at', 'desc')
        ->first();

    return view('dashboard', [
        'totalNotes' => $totalNotes,
        'favoriteMood' => $favoriteMood ? $favoriteMood->mood : '-',
        'favoriteSong' => $favoriteSong ? $favoriteSong->song_title : '-',
    ]);
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('notes', NoteController::class);
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile.edit');
});

require __DIR__.'/auth.php';