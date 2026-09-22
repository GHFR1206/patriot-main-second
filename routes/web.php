<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaderboardController;
use App\Models\Challenge;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $challenges = Challenge::where('is_active', true)->orderBy('sort_order')->get();
    $topTeams = Team::orderByDesc('total_points')->orderBy('best_time')->limit(5)->get();
    return view('home', compact('challenges', 'topTeams'));
})->name('home');

Route::get('/challenges', [ChallengeController::class, 'index'])->name('challenges.index');
Route::get('/challenges/{challenge}', [ChallengeController::class, 'show'])->name('challenges.show');

Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');
Route::get('/leaderboard/data', [LeaderboardController::class, 'data'])->name('leaderboard.data');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
