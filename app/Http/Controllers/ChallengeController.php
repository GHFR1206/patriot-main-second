<?php

namespace App\Http\Controllers;

use App\Models\Challenge;

class ChallengeController extends Controller
{
    public function index()
    {
        $challenges = Challenge::where('is_active', true)->orderBy('sort_order')->get();
        return view('challenges.index', compact('challenges'));
    }

    public function show(Challenge $challenge)
    {
        return view('challenges.show', compact('challenge'));
    }
}
