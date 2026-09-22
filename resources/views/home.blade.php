@extends('layouts.app')
@section('title','RoboRace — Build it. Code it. Race it!')

@section('content')
<section class="max-w-6xl mx-auto px-4 pt-6 md:pt-8">
  <div class="grid md:grid-cols-2 gap-6 items-center">
    <div class="order-2 md:order-1">
      <div class="inline-flex items-center gap-2 bg-white border-[3px] border-[#2D3436] rounded-full px-3 py-1.5 font-black text-xs shadow-[0_3px_0_0_#2D3436] animate-pop">
        <span class="w-2 h-2 rounded-full bg-[#4ECDC4] animate-pulse"></span> REGISTRATIONS OPEN — JOIN 120+ KIDS
        <span class="hidden sm:inline-flex bg-[#FFE66D] border-2 border-[#2D3436] rounded-full px-2 py-0.5">FREE TO JOIN!</span>
      </div>
      <h1 class="font-display font-black text-[40px] md:text-[56px] leading-[0.9] tracking-tight mt-4">
        <span class="inline-block animate-slideUp">Build it.</span><br>
        <span class="inline-block animate-slideUp" style="animation-delay:.08s">Code it.</span><br>
        <span class="inline-block text-[#FF6B6B] relative animate-slideUp" style="animation-delay:.16s">Race it! <span class="absolute -right-8 -top-2 text-2xl animate-wiggle">🚀</span></span>
      </h1>
      <p class="mt-4 text-[17px] leading-relaxed font-bold opacity-80 max-w-[480px]">Line follower robots, wild tracks, cheering friends! Pick a challenge, build your bot, and chase the finish line.</p>
      <div class="flex flex-wrap gap-3 mt-6">
        <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-[#FF6B6B] text-white font-black text-[15px] border-[3px] border-[#2D3436] shadow-[0_6px_0_0_#2D3436] hover:shadow-[0_4px_0_0_#2D3436] hover:translate-y-[2px] transition">Register Team 🤖</a>
        <a href="{{ route('challenges.index') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-white font-black text-[15px] border-[3px] border-[#2D3436] shadow-[0_6px_0_0_#2D3436] hover:shadow-[0_4px_0_0_#2D3436] hover:translate-y-[2px] transition">See Challenges 👀</a>
      </div>
      <div class="flex items-center gap-3 mt-6">
        <div class="flex -space-x-2">
          <span class="w-9 h-9 rounded-full bg-[#FFE66D] border-2 border-[#2D3436] flex items-center justify-center">🧒</span>
          <span class="w-9 h-9 rounded-full bg-[#4ECDC4] border-2 border-[#2D3436] flex items-center justify-center">👧</span>
          <span class="w-9 h-9 rounded-full bg-[#FF6B9D] border-2 border-[#2D3436] flex items-center justify-center">🧑</span>
        </div>
        <div class="text-sm font-extrabold leading-tight">Trusted by <b>40+ schools</b><br><span class="opacity-60">Ages 7-15 · Teams of 2-4</span></div>
      </div>
    </div>
    <div class="order-1 md:order-2 relative">
      <div class="bg-white rounded-[32px] border-[3px] border-[#2D3436] bubble-shadow p-4 md:p-6 relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none opacity-[0.07]" style="background: radial-gradient(circle at 20% 20%, #FF6B6B 2px, transparent 2px) 0 0 / 22px 22px, radial-gradient(circle at 80% 80%, #4ECDC4 2px, transparent 2px) 0 0 / 28px 28px;"></div>
        <div class="flex items-center justify-between">
          <span class="bg-[#2D3436] text-white text-xs font-black rounded-full px-3 py-1">LIVE TRACK PREVIEW</span>
          <span class="w-2.5 h-2.5 rounded-full bg-[#FF6B6B] animate-pulse border-2 border-[#2D3436]"></span>
        </div>
        <div class="mt-4 relative bg-[#FFF0C8] rounded-[20px] border-[3px] border-[#2D3436] p-4 overflow-hidden">
          <svg viewBox="0 0 320 140" class="w-full h-[140px]">
            <path d="M20 70 H90 Q110 70 110 50 V30 Q110 20 130 20 H190 Q210 20 210 40 V100 Q210 120 230 120 H300" fill="none" stroke="#2D3436" stroke-width="10" stroke-linecap="round"/>
            <path d="M20 70 H90 Q110 70 110 50 V30 Q110 20 130 20 H190 Q210 20 210 40 V100 Q210 120 230 120 H300" fill="none" stroke="white" stroke-width="4" stroke-dasharray="10 10" style="animation:trackDash 1s linear infinite"/>
            <g class="animate-robotRun">
              <rect x="100" y="46" width="28" height="20" rx="8" fill="#FF6B6B" stroke="#2D3436" stroke-width="2"/>
              <circle cx="108" cy="56" r="3" fill="white"/><circle cx="120" cy="56" r="3" fill="white"/>
              <rect x="96" y="54" width="6" height="4" rx="2" fill="#2D3436"/><rect x="126" y="54" width="6" height="4" rx="2" fill="#2D3436"/>
            </g>
            <g><rect x="224" y="108" width="18" height="12" rx="3" fill="#FFE66D" stroke="#2D3436" stroke-width="2"/><text x="233" y="117" text-anchor="middle" font-size="7" font-weight="900">⛰</text></g>
            <g><circle cx="290" cy="120" r="10" fill="#4ECDC4" stroke="#2D3436" stroke-width="2"/><text x="290" y="124" text-anchor="middle" font-size="9">🏁</text></g>
          </svg>
          <div class="flex gap-2 mt-3 flex-wrap">
            <span class="bg-white border-2 border-[#2D3436] rounded-full px-3 py-1 text-xs font-black">⚡ 1.2m straight</span>
            <span class="bg-[#4ECDC4] border-2 border-[#2D3436] rounded-full px-3 py-1 text-xs font-black text-white">↩ sharp turn</span>
            <span class="bg-[#FFE66D] border-2 border-[#2D3436] rounded-full px-3 py-1 text-xs font-black">⛰ ramp</span>
          </div>
        </div>
        <div class="grid grid-cols-3 gap-2 mt-4">
          <div class="bg-[#FFE66D] border-2 border-[#2D3436] rounded-2xl p-3 text-center"><div class="text-xl">⏱</div><div class="font-black text-sm">Fastest</div><div class="font-black text-lg leading-none">12.43s</div><div class="text-xs font-bold opacity-60">Team Sparks</div></div>
          <div class="bg-[#4ECDC4] border-2 border-[#2D3436] rounded-2xl p-3 text-center text-white"><div class="text-xl">🏆</div><div class="font-black text-sm">Top Score</div><div class="font-black text-lg leading-none">298 pts</div><div class="text-xs font-bold opacity-80">RoboRangers</div></div>
          <div class="bg-[#FF6B9D] border-2 border-[#2D3436] rounded-2xl p-3 text-center text-white"><div class="text-xl">🤖</div><div class="font-black text-sm">Teams</div><div class="font-black text-lg leading-none">48</div><div class="text-xs font-bold opacity-80">and growing!</div></div>
        </div>
      </div>
      <div class="absolute -bottom-3 -left-2 bg-[#A78BFA] text-white border-[3px] border-[#2D3436] rounded-2xl px-4 py-2 font-black text-sm shadow-[0_4px_0_0_#2D3436] rotate-[-2deg] hidden md:flex items-center gap-2">3 challenges · prizes for all! 🎉</div>
    </div>
  </div>
</section>

<section class="max-w-6xl mx-auto px-4 mt-10">
  <div class="flex items-end justify-between gap-4">
    <div>
      <div class="inline-flex items-center gap-2 bg-[#FFE66D] border-2 border-[#2D3436] rounded-full px-3 py-1 font-black text-xs">CHOOSE YOUR ADVENTURE</div>
      <h2 class="font-display font-black text-[30px] md:text-[36px] leading-none mt-2">3 Wild Challenges</h2>
      <p class="font-bold opacity-70 mt-1">Each track tests different superpowers — speed, brains, balance!</p>
    </div>
    <a href="{{ route('challenges.index') }}" class="hidden md:inline-flex px-5 py-2.5 rounded-full bg-white border-[3px] border-[#2D3436] font-black text-sm shadow-[0_4px_0_0_#2D3436]">View all →</a>
  </div>

  <div class="grid md:grid-cols-3 gap-5 mt-6">
    @foreach($challenges as $c)
    <a href="{{ route('challenges.show',$c) }}" class="group relative bg-white rounded-[28px] border-[3px] border-[#2D3436] bubble-shadow-sm overflow-hidden hover:translate-y-[-4px] hover:shadow-[0_12px_0_0_rgba(0,0,0,0.08),0_20px_40px_rgba(0,0,0,0.12)] transition-all">
      <div class="h-[110px] relative overflow-hidden" style="background: linear-gradient(135deg, {{ $c->gradient_from }}, {{ $c->gradient_to }})">
        <div class="absolute inset-0 opacity-20" style="background: radial-gradient(circle, white 2px, transparent 2px) 0 0 / 18px 18px"></div>
        <div class="absolute left-4 top-4 w-14 h-14 rounded-2xl bg-white border-[3px] border-[#2D3436] flex items-center justify-center text-3xl shadow-[0_4px_0_0_#2D3436] group-hover:animate-wiggle">{{ $c->icon }}</div>
        <span class="absolute right-4 top-4 bg-white border-2 border-[#2D3436] rounded-full px-3 py-1 text-xs font-black capitalize
          @if($c->difficulty==='easy') bg-[#95E1D3] @elseif($c->difficulty==='medium') bg-[#FFE66D] @else bg-[#FF6B6B] text-white @endif">
          {{ $c->difficulty }} · {{ $c->max_points }} pts
        </span>
        <div class="absolute bottom-0 left-0 right-0 h-6 bg-white rounded-t-[20px] border-t-[3px] border-[#2D3436]/10"></div>
      </div>
      <div class="p-5">
        <h3 class="font-display font-black text-xl leading-none">{{ $c->name }}</h3>
        <p class="text-sm font-bold opacity-70 mt-1.5 leading-relaxed line-clamp-2">{{ $c->short_description ?? $c->description }}</p>
        <div class="flex flex-wrap gap-1.5 mt-3">
          @foreach(array_slice($c->obstacles ?? [],0,3) as $o)
            <span class="bg-[#FFF0C8] border-2 border-[#2D3436] rounded-full px-2.5 py-1 text-xs font-black">{{ $o }}</span>
          @endforeach
        </div>
        <div class="flex items-center justify-between mt-4">
          <span class="text-xs font-black opacity-60">⏱ {{ $c->max_time_seconds }}s max</span>
          <span class="inline-flex items-center gap-1 bg-[#2D3436] text-white rounded-full px-3 py-1.5 text-xs font-black">Try it <span class="group-hover:translate-x-1 transition">→</span></span>
        </div>
      </div>
    </a>
    @endforeach
  </div>
</section>

<section class="max-w-6xl mx-auto px-4 mt-10">
  <div class="bg-[#2D3436] rounded-[28px] p-6 md:p-8 text-white relative overflow-hidden">
    <div class="absolute -top-10 -right-10 w-40 h-40 rounded-full bg-[#FF6B6B] opacity-20"></div>
    <div class="absolute -bottom-8 -left-8 w-32 h-32 rounded-full bg-[#4ECDC4] opacity-20"></div>
    <div class="relative grid md:grid-cols-4 gap-6">
      <div class="md:col-span-1">
        <div class="inline-flex bg-[#FFE66D] text-[#2D3436] border-2 border-white rounded-full px-3 py-1 font-black text-xs">HOW IT WORKS</div>
        <h3 class="font-display font-black text-2xl leading-none mt-3">3 steps to<br>race day!</h3>
      </div>
      @php $steps=[['n'=>'01','t'=>'Form a team','d'=>'2-4 friends, pick a robot name & school','c'=>'#FF6B6B','e'=>'👥'],['n'=>'02','t'=>'Build & code','d'=>'Line sensor + motors, keep it on the line!','c'=>'#4ECDC4','e'=>'🔧'],['n'=>'03','t'=>'Race & cheer','d'=>'Clock stops, points up, crowd goes wild!','c'=>'#FFE66D','e'=>'🏁']]; @endphp
      @foreach($steps as $s)
      <div class="bg-white text-[#2D3436] rounded-[20px] border-[3px] border-white p-4 relative">
        <div class="w-8 h-8 rounded-full flex items-center justify-center font-black text-sm border-2 border-[#2D3436]" style="background: {{ $s['c'] }}">{{ $s['n'] }}</div>
        <div class="text-2xl mt-2">{{ $s['e'] }}</div>
        <div class="font-black mt-1">{{ $s['t'] }}</div>
        <div class="text-xs font-bold opacity-60 leading-relaxed">{{ $s['d'] }}</div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="max-w-6xl mx-auto px-4 mt-10 grid md:grid-cols-5 gap-6">
  <div class="md:col-span-3 bg-white rounded-[28px] border-[3px] border-[#2D3436] bubble-shadow-sm p-6">
    <div class="flex items-center justify-between">
      <h3 class="font-display font-black text-xl flex items-center gap-2"><span class="w-8 h-8 rounded-xl bg-[#4ECDC4] flex items-center justify-center border-2 border-[#2D3436] text-white">🏆</span> Live Mini Board</h3>
      <a href="{{ route('leaderboard') }}" class="text-xs font-black bg-[#FFE66D] border-2 border-[#2D3436] rounded-full px-3 py-1.5">Full board →</a>
    </div>
    <div class="mt-4 space-y-2">
      @forelse($topTeams ?? [] as $i=>$t)
      <div class="flex items-center gap-3 bg-[#FFF8F0] border-2 border-[#2D3436] rounded-2xl px-3 py-2.5 {{ $i===0?'bg-[#FFE66D]':'' }}">
        <span class="w-7 h-7 rounded-full flex items-center justify-center font-black text-xs border-2 border-[#2D3436] {{ $i===0?'bg-[#FF6B6B] text-white':($i===1?'bg-[#4ECDC4] text-white':'bg-white') }}">{{ $i+1 }}</span>
        <span class="w-8 h-8 rounded-full bg-white border-2 border-[#2D3436] flex items-center justify-center">{{ $t->emoji ?? '🤖' }}</span>
        <div class="flex-1 min-w-0">
          <div class="font-black text-sm leading-none truncate">{{ $t->name }}</div>
          <div class="text-xs font-bold opacity-60 truncate">{{ $t->school }}</div>
        </div>
        <div class="text-right">
          <div class="font-black text-sm">{{ $t->total_points }} pts</div>
          <div class="text-xs font-bold opacity-60">{{ $t->best_time ? $t->best_time.'s': '—' }}</div>
        </div>
      </div>
      @empty
      <div class="text-center py-8 font-bold opacity-60">No scores yet — be the first! 🚀<br><a href="{{ route('register') }}" class="underline">Register team</a></div>
      @endforelse
    </div>
  </div>
  <div class="md:col-span-2 bg-gradient-to-br from-[#FF6B6B] to-[#FFE66D] rounded-[28px] border-[3px] border-[#2D3436] p-6 text-[#2D3436] relative overflow-hidden">
    <div class="absolute -right-6 -bottom-6 text-[120px] opacity-10 rotate-12">🤖</div>
    <h3 class="font-display font-black text-2xl leading-none">Ready to roll?</h3>
    <p class="font-bold opacity-80 mt-2 text-sm leading-relaxed">Grab your team, pick a challenge, build the fastest follower on the block.</p>
    <ul class="mt-4 space-y-2 text-sm font-black">
      <li class="flex items-center gap-2"><span class="w-6 h-6 rounded-full bg-white border-2 border-[#2D3436] flex items-center justify-center text-xs">✓</span> All materials provided</li>
      <li class="flex items-center gap-2"><span class="w-6 h-6 rounded-full bg-white border-2 border-[#2D3436] flex items-center justify-center text-xs">✓</span> Judges help you learn</li>
      <li class="flex items-center gap-2"><span class="w-6 h-6 rounded-full bg-white border-2 border-[#2D3436] flex items-center justify-center text-xs">✓</span> Prizes for every team!</li>
    </ul>
    <a href="{{ route('register') }}" class="mt-6 inline-flex w-full justify-center px-6 py-3.5 rounded-full bg-[#2D3436] text-white font-black border-[3px] border-[#2D3436] shadow-[0_4px_0_0_rgba(0,0,0,0.2)]">Join the Race — It’s Free! 🎉</a>
    <div class="text-center text-xs font-black opacity-60 mt-2">Takes 2 minutes · No credit card</div>
  </div>
</section>
@endsection
