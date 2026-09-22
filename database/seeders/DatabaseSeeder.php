<?php

namespace Database\Seeders;

use App\Models\Challenge;
use App\Models\Score;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $judgeRole = Role::firstOrCreate(['name' => 'judge']);
        $partRole = Role::firstOrCreate(['name' => 'participant']);

        $admin = User::firstOrCreate(['email' => 'admin@robotrace.test'], ['name' => 'Admin Robo', 'password' => 'password']);
        $admin->assignRole($adminRole);
        $judge = User::firstOrCreate(['email' => 'judge@robotrace.test'], ['name' => 'Judge Sparky', 'password' => 'password']);
        $judge->assignRole($judgeRole);

        $challenges = [
            [
                'name' => 'Speed Dash',
                'slug' => 'speed-dash',
                'description' => "Zoom! A straight sprint with gentle curves. Perfect first race — keep the line, chase the clock. Finish = instant cheers!",
                'short_description' => 'Straight sprint, gentle curves — perfect first race!',
                'icon' => '⚡',
                'color' => '#FFE66D',
                'gradient_from' => '#FFE66D',
                'gradient_to' => '#FF6B6B',
                'difficulty' => 'easy',
                'max_time_seconds' => 60,
                'max_points' => 100,
                'obstacles' => ['Long straight', 'Gentle S-curve', 'Finish gate'],
                'rules' => "• Stay on black line (white floor)\n• 60 seconds max\n• Off track = −5 pts, must re-enter where left\n• Fastest clean run wins\n• Judge claps you in!",
                'sort_order' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Obstacle Maze',
                'slug' => 'obstacle-maze',
                'description' => 'Twists, sharp turns, zigzags! Your bot must think fast and turn tighter. Miss a turn? Reverse, retry, roar!',
                'short_description' => 'Sharp turns & zigzags — brain + wheels!',
                'icon' => '🌀',
                'color' => '#4ECDC4',
                'gradient_from' => '#4ECDC4',
                'gradient_to' => '#A78BFA',
                'difficulty' => 'medium',
                'max_time_seconds' => 120,
                'max_points' => 120,
                'obstacles' => ['Sharp 90° turn', 'Zigzag corridor', 'U-turn loop', 'Narrow lane'],
                'rules' => "• 120 seconds max\n• 4 tricky turns — slow down to stay on line\n• Touching wall = −5 pts\n• Complete all gates\n• Bonus +10 if no penalties!",
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Bridge Gap',
                'slug' => 'bridge-gap',
                'description' => 'The brave track! Up a ramp, across a narrow bridge (line breaks!), down again. Wobble? Balance and believe!',
                'short_description' => 'Ramp, narrow bridge, line break — brave bots only!',
                'icon' => '🌉',
                'color' => '#FF6B9D',
                'gradient_from' => '#FF6B9D',
                'gradient_to' => '#FF8E53',
                'difficulty' => 'hard',
                'max_time_seconds' => 150,
                'max_points' => 150,
                'obstacles' => ['Incline ramp', 'Narrow bridge', 'Line break (3cm gap)', 'Decline ramp', 'Tight finish'],
                'rules' => "• 150 seconds max\n• Bridge is 4cm wide — slow & steady!\n• Line gap: bot must go straight 3cm\n• Fall off bridge = retry from ramp base (−10)\n• Finishing this track = hero status!",
                'sort_order' => 2,
                'is_active' => true,
            ],
        ];
        foreach ($challenges as $c) {
            Challenge::updateOrCreate(['slug' => $c['slug']], $c);
        }

        $teamsData = [
            ['name' => 'Turbo Turtles', 'school' => 'Sunny Elementary', 'age_group' => 'junior', 'robot_name' => 'Shelly', 'emoji' => '🐢', 'color' => '#95E1D3', 'members' => ['Maya','Leo','Ava'], 'best' => 18.42],
            ['name' => 'Robo Rangers', 'school' => 'Tech Middle', 'age_group' => 'middle', 'robot_name' => 'Blitz', 'emoji' => '⚡', 'color' => '#FFE66D', 'members' => ['Sam','Riko','Nina','Ben'], 'best' => 12.43],
            ['name' => 'Sparks Squad', 'school' => 'Sunny Elementary', 'age_group' => 'junior', 'robot_name' => 'Spark', 'emoji' => '✨', 'color' => '#FF6B9D', 'members' => ['Luna','Kai'], 'best' => 22.10],
            ['name' => 'Bridge Busters', 'school' => 'River High', 'age_group' => 'senior', 'robot_name' => 'Girder', 'emoji' => '🌉', 'color' => '#A78BFA', 'members' => ['Alex','Jordan','Casey'], 'best' => 34.80],
            ['name' => 'Maze Masters', 'school' => 'Tech Middle', 'age_group' => 'middle', 'robot_name' => 'Whirl', 'emoji' => '🌀', 'color' => '#4ECDC4', 'members' => ['Zoe','Mina','Omar'], 'best' => 28.55],
            ['name' => 'Bolt Buddies', 'school' => 'Sunny Elementary', 'age_group' => 'junior', 'robot_name' => 'Bolt', 'emoji' => '🤖', 'color' => '#FF6B6B', 'members' => ['Eva','Tom'], 'best' => 19.00],
        ];

        $allChallenges = Challenge::all();
        foreach ($teamsData as $td) {
            $email = Str::slug($td['name']).'@test.test';
            $user = User::firstOrCreate(['email' => $email], ['name' => $td['members'][0].' ('.$td['name'].')', 'password' => 'password']);
            $user->assignRole($partRole);
            $team = Team::updateOrCreate(['slug' => Str::slug($td['name'])], [
                'user_id' => $user->id,
                'name' => $td['name'],
                'school' => $td['school'],
                'age_group' => $td['age_group'],
                'robot_name' => $td['robot_name'],
                'members_count' => count($td['members']),
                'members' => $td['members'],
                'contact_email' => $email,
                'contact_phone' => '+62 812-'.rand(1000,9999).'-'.rand(1000,9999),
                'emoji' => $td['emoji'],
                'color' => $td['color'],
                'best_time' => $td['best'],
            ]);

            $total = 0;
            foreach ($allChallenges as $ch) {
                $base = match($ch->difficulty){'easy'=>rand(70,100),'medium'=>rand(55,110),'hard'=>rand(40,130)};
                $pen = rand(0,1) ? 0 : 5;
                $time = round($td['best'] + rand(-300,800)/100, 2);
                if ($time < 8) $time = 8 + rand(0,500)/100;
                if ($time > $ch->max_time_seconds) $time = $ch->max_time_seconds - rand(5,20);
                $pts = max(0, $base - $pen);
                Score::updateOrCreate(['team_id'=>$team->id,'challenge_id'=>$ch->id], [
                    'points'=>$pts,
                    'time_seconds'=>$time,
                    'penalties'=>$pen,
                    'bonuses'=> $pen===0 ? 10 : 0,
                    'status'=>'completed',
                    'notes'=> null,
                    'judged_by'=> $judge->id,
                ]);
                $total += $pts;
            }
            $team->update(['total_points'=>$total]);
        }
    }
}
