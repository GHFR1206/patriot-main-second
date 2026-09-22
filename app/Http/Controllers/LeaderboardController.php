<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Challenge;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index(Request $r)
    {
        $challengeId = $r->query('challenge');
        $challenges = Challenge::where('is_active',true)->orderBy('sort_order')->get();
        return view('leaderboard', compact('challenges','challengeId'));
    }

    public function data(Request $r)
    {
        $challengeId = $r->query('challenge');
        $query = Team::query()->with(['scores.challenge']);
        if ($challengeId) {
            $query->withSum(['scores as points' => fn($q)=>$q->where('challenge_id',$challengeId)->where('status','completed')], 'points');
            $query->orderByDesc('points');
        } else {
            $query->orderByDesc('total_points')->orderBy('best_time');
        }
        $teams = $query->limit(50)->get()->map(fn($t)=>[
            'id'=>$t->id,
            'name'=>$t->name,
            'school'=>$t->school,
            'emoji'=>$t->emoji,
            'color'=>$t->color,
            'robot_name'=>$t->robot_name,
            'age_group'=>$t->age_group,
            'total_points'=>$challengeId ? (int)($t->points ?? 0) : $t->total_points,
            'best_time'=>$t->best_time,
            'members_count'=>$t->members_count,
        ]);
        return response()->json(['teams'=>$teams,'updated_at'=>now()->toIso8601String()]);
    }
}
