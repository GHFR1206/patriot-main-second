@extends('layouts.app')
@section('title','Dashboard — RoboRace')
@section('content')
<div class="max-w-6xl mx-auto px-4 pt-6">
  @if(!$team)
    <div class="bg-[#FFE66D] border-[3px] border-[#2D3436] rounded-[24px] p-6 text-center bubble-shadow-sm">
      <div class="text-3xl">🤖</div>
      <div class="font-display font-black text-xl mt-2">No team yet!</div>
      <p class="text-sm font-bold opacity-70">You logged in but have no team. Create one at register, or ask admin to link you.</p>
      <a href="{{ route('register') }}" class="mt-3 inline-flex px-6 py-2.5 rounded-full bg-[#FF6B6B] text-white font-black border-[3px] border-[#2D3436]">Create Team</a>
    </div>
  @else
    <div class="grid md:grid-cols-3 gap-6">
      <div class="md:col-span-2">
        <div class="bg-white rounded-[28px] border-[3px] border-[#2D3436] bubble-shadow p-6 relative overflow-hidden">
          <div class="absolute top-0 right-0 w-28 h-28 rounded-full opacity-10" style="background: {{ $team->color }}"></div>
          <div class="relative flex gap-4 items-start">
            <span class="w-14 h-14 rounded-2xl border-[3px] border-[#2D3436] flex items-center justify-center text-2xl shrink-0" style="background: {{ $team->color }}">{{ $team->emoji }}</span>
            <div class="flex-1">
              <div class="flex flex-wrap items-center gap-2">
                <h1 class="font-display font-black text-2xl leading-none">{{ $team->name }}</h1>
                <span class="bg-[#FFE66D] border-2 border-[#2D3436] rounded-full px-2.5 py-1 text-xs font-black">{{ strtoupper($team->age_group) }}</span>
                <span class="bg-[#4ECDC4] text-white border-2 border-[#2D3436] rounded-full px-2.5 py-1 text-xs font-black">{{ $team->total_points }} pts</span>
              </div>
              <div class="text-sm font-bold opacity-60 mt-1">🏫 {{ $team->school }} · 🤖 {{ $team->robot_name }} · 👥 {{ $team->members_count }} members · ⏱ best {{ $team->best_time ? $team->best_time.'s':'—' }}</div>
              <div class="flex flex-wrap gap-1.5 mt-2">
                @foreach(($team->members ?? []) as $m)<span class="bg-[#FFF0C8] border-2 border-[#2D3436] rounded-full px-2.5 py-1 text-xs font-black">{{ $m }}</span>@endforeach
              </div>
            </div>
          </div>
          <div class="mt-5 grid grid-cols-3 gap-2">
            <div class="bg-[#FFF0C8] border-[3px] border-[#2D3436] rounded-2xl p-3 text-center"><div class="text-xl">🏆</div><div class="font-black text-sm">{{ $team->total_points }} pts</div><div class="text-xs font-bold opacity-60">Total</div></div>
            <div class="bg-[#E0F7F3] border-[3px] border-[#2D3436] rounded-2xl p-3 text-center"><div class="text-xl">⏱</div><div class="font-black text-sm">{{ $team->best_time ? $team->best_time.'s':'—' }}</div><div class="text-xs font-bold opacity-60">Best time</div></div>
            <div class="bg-[#FFE6F0] border-[3px] border-[#2D3436] rounded-2xl p-3 text-center"><div class="text-xl">🎯</div><div class="font-black text-sm">{{ $team->scores->where('status','completed')->count() }}/{{ $challenges->count() }}</div><div class="text-xs font-bold opacity-60">Tracks done</div></div>
          </div>
        </div>

        <div class="mt-6 bg-white rounded-[28px] border-[3px] border-[#2D3436] bubble-shadow-sm p-6">
          <h3 class="font-black flex items-center gap-2"><span class="w-8 h-8 rounded-xl bg-[#FF6B6B] flex items-center justify-center border-2 border-[#2D3436] text-white">📊</span> Your scores</h3>
          <div class="mt-4 space-y-2">
            @foreach($challenges as $c)
              @php $sc = $team->scores->firstWhere('challenge_id',$c->id); @endphp
              <div class="flex items-center gap-3 border-[3px] border-[#2D3436] rounded-2xl px-4 py-3 {{ $sc ? 'bg-[#FFF8F0]' : 'bg-white opacity-60' }}">
                <span class="w-10 h-10 rounded-xl border-2 border-[#2D3436] flex items-center justify-center text-xl shrink-0" style="background: {{ $c->gradient_from }}">{{ $c->icon }}</span>
                <div class="flex-1 min-w-0">
                  <div class="font-black text-sm leading-none">{{ $c->name }}</div>
                  <div class="text-xs font-bold opacity-60">#{{ $c->sort_order+1 }} · {{ $c->max_points }} pts max</div>
                </div>
                @if($sc)
                  <div class="text-right">
                    <div class="font-black text-sm">{{ $sc->points }} pts</div>
                    <div class="text-xs font-bold opacity-60">{{ $sc->time_seconds ? $sc->time_seconds.'s':'' }} @if($sc->penalties) -{{ $sc->penalties }}@endif</div>
                  </div>
                  <span class="bg-[#95E1D3] border-2 border-[#2D3436] rounded-full px-2 py-1 text-xs font-black">✅ {{ $sc->status }}</span>
                @else
                  <span class="bg-[#FFE66D] border-2 border-[#2D3436] rounded-full px-3 py-1 text-xs font-black">Not yet →</span>
                @endif
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="space-y-4">
        <div class="bg-[#2D3436] text-white rounded-[28px] p-6">
          <div class="font-display font-black text-xl">Next steps</div>
          <ul class="mt-3 space-y-2 text-sm font-bold">
            <li class="flex gap-2"><span class="w-6 h-6 rounded-full bg-[#FFE66D] text-[#2D3436] flex items-center justify-center text-xs shrink-0">✓</span> Check in with teacher at race table</li>
            <li class="flex gap-2"><span class="w-6 h-6 rounded-full bg-[#4ECDC4] flex items-center justify-center text-xs shrink-0">2</span> Run each track, judge scores you</li>
            <li class="flex gap-2"><span class="w-6 h-6 rounded-full bg-[#FF6B9D] flex items-center justify-center text-xs shrink-0">3</span> Watch <a href="{{ route('leaderboard') }}" class="underline">live board</a> celebrate!</li>
          </ul>
          <a href="{{ route('leaderboard') }}" class="mt-4 inline-flex w-full justify-center py-2.5 rounded-full bg-white text-[#2D3436] font-black border-2 border-white">Live Leaderboard 🏆</a>
        </div>
        <div class="bg-[#FFE66D] border-[3px] border-[#2D3436] rounded-[28px] p-5">
          <div class="font-black">Logged in as</div>
          <div class="text-sm font-bold opacity-70">{{ auth()->user()->name }} · {{ auth()->user()->email }}</div>
          <div class="mt-2 flex flex-wrap gap-1.5">
            @foreach(auth()->user()->roles as $r)<span class="bg-white border-2 border-[#2D3436] rounded-full px-2 py-1 text-xs font-black">{{ $r->name }}</span>@endforeach
            @if(auth()->user()->roles->isEmpty())<span class="bg-white border-2 border-[#2D3436] rounded-full px-2 py-1 text-xs font-black">participant</span>@endif
          </div>
          <form method="POST" action="{{ route('logout') }}" class="mt-3">@csrf<button class="w-full py-2.5 rounded-full bg-white font-black border-[3px] border-[#2D3436]">Log out</button></form>
          <a href="/admin" class="mt-2 block text-center text-xs font-black underline">Admin / Judge panel →</a>
        </div>
      </div>
    </div>
  @endif
</div>
@endsection
