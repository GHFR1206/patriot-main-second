<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $r)
    {
        $user = $r->user();
        $team = $user->team()->with(['scores.challenge'])->first();
        $challenges = \App\Models\Challenge::where('is_active',true)->orderBy('sort_order')->get();
        return view('dashboard', compact('team','challenges'));
    }
}
