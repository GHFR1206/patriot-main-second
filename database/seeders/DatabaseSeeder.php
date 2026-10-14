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

        $admin = User::firstOrCreate(['email' => 'admin@robotrace.test'], ['name' => 'Admin Robo', 'password' => 'admin']);
        $admin->assignRole($adminRole);
        $judge = User::firstOrCreate(['email' => 'judge@robotrace.test'], ['name' => 'Judge Sparky', 'password' => 'judge']);
        $judge->assignRole($judgeRole);

        $challenges = [
            [
                'name' => 'Sprint Cepat',
                'slug' => 'speed-dash',
                'description' => "Ngebut! Lintasan lurus dengan tikungan halus. Balapan pertama yang sempurna — tetap di garis, kejar waktu. Finis = sorak sorai langsung!",
                'short_description' => 'Lintasan lurus, tikungan halus — balapan pertama yang sempurna!',
                'icon' => '⚡',
                'color' => '#F4CF3B',
                'gradient_from' => '#F4CF3B',
                'gradient_to' => '#5E3C9F',
                'difficulty' => 'easy',
                'max_time_seconds' => 60,
                'max_points' => 100,
                'obstacles' => ['Lintasan lurus panjang', 'Tikungan S halus', 'Gerbang finis'],
                'rules' => "• Tetap di garis hitam (lantai putih)\n• Maksimal 60 detik\n• Keluar lintasan = −5 poin, masuk kembali di titik keluar\n• Waktu tercepat tanpa penalti menang\n• Juri akan memberi aba-aba!",
                'sort_order' => 0,
                'is_active' => true,
            ],
            [
                'name' => 'Labirin Rintangan',
                'slug' => 'obstacle-maze',
                'description' => 'Berliku, tikungan tajam, zigzag! Robotmu harus berpikir cepat dan belok presisi. Salah belok? Mundur, coba lagi!',
                'short_description' => 'Tikungan tajam & zigzag — otak + roda!',
                'icon' => '🌀',
                'color' => '#EAE6FE',
                'gradient_from' => '#EAE6FE',
                'gradient_to' => '#5E3C9F',
                'difficulty' => 'medium',
                'max_time_seconds' => 120,
                'max_points' => 120,
                'obstacles' => ['Belokan tajam 90°', 'Koridor zigzag', 'Loop putar balik', 'Jalur sempit'],
                'rules' => "• Maksimal 120 detik\n• 4 tikungan sulit — pelan-pelan agar tetap di garis\n• Menyentuh dinding = −5 poin\n• Lewati semua gerbang\n• Bonus +10 jika tanpa penalti!",
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Jembatan Tantangan',
                'slug' => 'bridge-gap',
                'description' => 'Lintasan pemberani! Naik tanjakan, lewati jembatan sempit (garis terputus!), lalu turun lagi. Goyang? Seimbangkan dan percaya diri!',
                'short_description' => 'Tanjakan, jembatan sempit, garis terputus — hanya untuk robot pemberani!',
                'icon' => '🌉',
                'color' => '#5E3C9F',
                'gradient_from' => '#5E3C9F',
                'gradient_to' => '#F4CF3B',
                'difficulty' => 'hard',
                'max_time_seconds' => 150,
                'max_points' => 150,
                'obstacles' => ['Tanjakan naik', 'Jembatan sempit', 'Garis terputus (celah 3cm)', 'Tanjakan turun', 'Finis ketat'],
                'rules' => "• Maksimal 150 detik\n• Jembatan lebar 4cm — pelan & mantap!\n• Celah garis: robot harus lurus 3cm\n• Jatuh dari jembatan = ulangi dari dasar tanjakan (−10)\n• Menyelesaikan lintasan ini = status pahlawan!",
                'sort_order' => 2,
                'is_active' => true,
            ],
        ];
        foreach ($challenges as $c) {
            Challenge::updateOrCreate(['slug' => $c['slug']], $c);
        }

        $teamsData = [
            ['name' => 'Turbo Turtles', 'school' => 'Sunny Elementary', 'age_group' => 'junior', 'robot_name' => 'Shelly', 'emoji' => '🐢', 'color' => '#5E3C9F', 'members' => ['Maya','Leo','Ava'], 'best' => 18.42],
            ['name' => 'Robo Rangers', 'school' => 'Tech Middle', 'age_group' => 'middle', 'robot_name' => 'Blitz', 'emoji' => '⚡', 'color' => '#F4CF3B', 'members' => ['Sam','Riko','Nina','Ben'], 'best' => 12.43],
            ['name' => 'Sparks Squad', 'school' => 'Sunny Elementary', 'age_group' => 'junior', 'robot_name' => 'Spark', 'emoji' => '✨', 'color' => '#EAE6FE', 'members' => ['Luna','Kai'], 'best' => 22.10],
            ['name' => 'Bridge Busters', 'school' => 'River High', 'age_group' => 'senior', 'robot_name' => 'Girder', 'emoji' => '🌉', 'color' => '#141324', 'members' => ['Alex','Jordan','Casey'], 'best' => 34.80],
            ['name' => 'Maze Masters', 'school' => 'Tech Middle', 'age_group' => 'middle', 'robot_name' => 'Whirl', 'emoji' => '🌀', 'color' => '#EAE6FE', 'members' => ['Zoe','Mina','Omar'], 'best' => 28.55],
            ['name' => 'Bolt Buddies', 'school' => 'Sunny Elementary', 'age_group' => 'junior', 'robot_name' => 'Bolt', 'emoji' => '🤖', 'color' => '#FFFFFF', 'members' => ['Eva','Tom'], 'best' => 19.00],
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
