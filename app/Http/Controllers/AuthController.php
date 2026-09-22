<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLogin() { return view('auth.login'); }
    public function showRegister() { return view('auth.register'); }

    public function login(Request $r)
    {
        $d = $r->validate(['email'=>'required|email','password'=>'required']);
        if (Auth::attempt($d, $r->boolean('remember'))) {
            $r->session()->regenerate();
            return redirect()->intended(route('dashboard'))->with('success','Selamat datang kembali, pembalap! 🏁');
        }
        return back()->withErrors(['email'=>'Email atau kata sandi salah'])->onlyInput('email');
    }

    public function register(Request $r)
    {
        $d = $r->validate([
            'name'=>'required|string|max:80',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
            'team_name'=>'required|string|max:80',
            'school'=>'required|string|max:120',
            'age_group'=>'required|in:junior,middle,senior',
            'robot_name'=>'nullable|string|max:80',
            'members_input'=>'nullable|string|max:500',
            'contact_phone'=>'nullable|string|max:30',
        ]);
        $user = User::create(['name'=>$d['name'],'email'=>$d['email'],'password'=>$d['password']]);
        $user->assignRole('participant');
        $members = array_filter(array_map('trim', explode(',', $d['members_input'] ?? '')));
        if (empty($members)) $members = [$d['name']];
        Team::create([
            'user_id'=>$user->id,
            'name'=>$d['team_name'],
            'slug'=>Str::slug($d['team_name']).'-'.Str::random(4),
            'school'=>$d['school'],
            'age_group'=>$d['age_group'],
            'robot_name'=>$d['robot_name'] ?? 'Bolt',
            'members_count'=>count($members),
            'members'=>$members,
            'contact_email'=>$d['email'],
            'contact_phone'=>$d['contact_phone'] ?? null,
            'emoji'=>['🤖','🚀','⚡','🔥','🌟'][array_rand(['🤖','🚀','⚡','🔥','🌟'])],
            'color'=>['#FF6B6B','#4ECDC4','#A78BFA','#FFE66D','#FF6B9D'][array_rand(['#FF6B6B','#4ECDC4','#A78BFA','#FFE66D','#FF6B9D'])],
        ]);
        Auth::login($user);
        return redirect(route('dashboard'))->with('success','Tim berhasil didaftarkan! Ayo bangun robotmu 🤖');
    }

    public function logout(Request $r)
    {
        Auth::logout();
        $r->session()->invalidate();
        $r->session()->regenerateToken();
        return redirect(route('home'))->with('success','Sampai jumpa di balapan selanjutnya! 👋');
    }
}
