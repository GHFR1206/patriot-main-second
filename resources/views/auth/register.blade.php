@extends('layouts.app')
@section('title','Register Team — RoboRace')
@section('content')
<div class="max-w-3xl mx-auto px-4 pt-6">
  <div class="text-center">
    <div class="inline-flex w-14 h-14 rounded-2xl bg-[#FFE66D] border-[3px] border-[#2D3436] items-center justify-center text-2xl shadow-[0_4px_0_0_#2D3436]">🤖</div>
    <h1 class="font-display font-black text-3xl mt-3">Create your <span class="text-[#FF6B6B]">team</span>!</h1>
    <p class="font-bold opacity-60 text-sm mt-1">Teams of 2-4 · Ages 7-15 · Takes 2 minutes</p>
  </div>
  <form method="POST" action="{{ route('register') }}" class="mt-6 bg-white rounded-[28px] border-[3px] border-[#2D3436] bubble-shadow p-6 md:p-7">
    @csrf
    @if($errors->any())<div class="bg-[#FF6B6B] text-white border-2 border-[#2D3436] rounded-2xl px-4 py-3 font-bold text-sm mb-4">@foreach($errors->all() as $e)<div>⚠️ {{ $e }}</div>@endforeach</div>@endif

    <div class="bg-[#FFF0C8] border-[3px] border-[#2D3436] rounded-2xl p-4">
      <div class="font-black flex items-center gap-2">👤 Your info <span class="text-xs bg-white border-2 border-[#2D3436] rounded-full px-2 py-0.5">team captain</span></div>
      <div class="grid md:grid-cols-2 gap-3 mt-3">
        <div><label class="font-black text-sm">Full name</label><input name="name" value="{{ old('name') }}" required placeholder="Alex Rivera" class="mt-1 w-full rounded-2xl border-[3px] border-[#2D3436] px-4 py-2.5 font-bold bg-white outline-none"></div>
        <div><label class="font-black text-sm">Email</label><input type="email" name="email" value="{{ old('email') }}" required placeholder="alex@school.test" class="mt-1 w-full rounded-2xl border-[3px] border-[#2D3436] px-4 py-2.5 font-bold bg-white outline-none"></div>
        <div><label class="font-black text-sm">Password</label><input type="password" name="password" required placeholder="••••••••" class="mt-1 w-full rounded-2xl border-[3px] border-[#2D3436] px-4 py-2.5 font-bold bg-white outline-none"></div>
        <div><label class="font-black text-sm">Confirm password</label><input type="password" name="password_confirmation" required class="mt-1 w-full rounded-2xl border-[3px] border-[#2D3436] px-4 py-2.5 font-bold bg-white outline-none"></div>
      </div>
    </div>

    <div class="bg-[#E0F7F3] border-[3px] border-[#2D3436] rounded-2xl p-4 mt-4">
      <div class="font-black flex items-center gap-2">🏁 Team & robot</div>
      <div class="grid md:grid-cols-2 gap-3 mt-3">
        <div><label class="font-black text-sm">Team name *</label><input name="team_name" value="{{ old('team_name') }}" required placeholder="Turbo Turtles" class="mt-1 w-full rounded-2xl border-[3px] border-[#2D3436] px-4 py-2.5 font-bold bg-white outline-none"></div>
        <div><label class="font-black text-sm">School *</label><input name="school" value="{{ old('school') }}" required placeholder="Sunny Elementary" class="mt-1 w-full rounded-2xl border-[3px] border-[#2D3436] px-4 py-2.5 font-bold bg-white outline-none"></div>
        <div><label class="font-black text-sm">Age group *</label><select name="age_group" class="mt-1 w-full rounded-2xl border-[3px] border-[#2D3436] px-4 py-2.5 font-bold bg-white outline-none"><option value="junior" @selected(old('age_group')==='junior')>Junior 7-9 🧒</option><option value="middle" @selected(old('age_group','middle')==='middle')>Middle 10-12 👧</option><option value="senior" @selected(old('age_group')==='senior')>Senior 13-15 🧑</option></select></div>
        <div><label class="font-black text-sm">Robot name</label><input name="robot_name" value="{{ old('robot_name') }}" placeholder="Bolt" class="mt-1 w-full rounded-2xl border-[3px] border-[#2D3436] px-4 py-2.5 font-bold bg-white outline-none"></div>
        <div class="md:col-span-2"><label class="font-black text-sm">Team members (comma separated)</label><input name="members_input" value="{{ old('members_input') }}" placeholder="Alex, Sam, Maya" class="mt-1 w-full rounded-2xl border-[3px] border-[#2D3436] px-4 py-2.5 font-bold bg-white outline-none"><div class="text-xs font-bold opacity-50 mt-1">Captain included automatically if blank</div></div>
        <div><label class="font-black text-sm">Phone (optional)</label><input name="contact_phone" value="{{ old('contact_phone') }}" placeholder="+62 ..." class="mt-1 w-full rounded-2xl border-[3px] border-[#2D3436] px-4 py-2.5 font-bold bg-white outline-none"></div>
        <div class="flex items-end"><label class="flex items-center gap-2 font-bold text-xs bg-white border-2 border-[#2D3436] rounded-full px-3 py-2"><input type="checkbox" required> I agree — we will have fun & play fair!</label></div>
      </div>
    </div>

    <button class="mt-6 w-full py-3.5 rounded-full bg-[#FF6B6B] text-white font-black border-[3px] border-[#2D3436] shadow-[0_6px_0_0_#2D3436] hover:shadow-[0_4px_0_0_#2D3436] hover:translate-y-[2px] transition text-lg">Create Team & Join Race 🎉</button>
    <div class="text-center text-sm font-bold mt-3">Already have a team? <a href="{{ route('login') }}" class="text-[#FF6B6B] underline">Log in</a></div>
  </form>
</div>
@endsection
