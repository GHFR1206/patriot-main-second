@extends('layouts.app')
@section('title', $challenge->name.' — RoboRace')
@section('content')
<div class="max-w-6xl mx-auto px-4 pt-6">
  <a href="{{ route('challenges.index') }}" class="inline-flex items-center gap-1 bg-white border-2 border-[#2D3436] rounded-full px-4 py-1.5 font-black text-sm">← All challenges</a>

  <div class="mt-4 grid md:grid-cols-5 gap-6">
    <div class="md:col-span-3">
      <div class="rounded-[28px] border-[3px] border-[#2D3436] overflow-hidden bubble-shadow" style="background: linear-gradient(135deg, {{ $challenge->gradient_from }}, {{ $challenge->gradient_to }})">
        <div class="p-6 md:p-8 text-[#2D3436] relative overflow-hidden">
          <div class="absolute inset-0 opacity-[0.08]" style="background: radial-gradient(circle, #2D3436 2px, transparent 2px) 0 0 / 18px 18px"></div>
          <div class="relative flex gap-4 items-start">
            <div class="w-16 h-16 rounded-2xl bg-white border-[3px] border-[#2D3436] flex items-center justify-center text-3xl shadow-[0_4px_0_0_#2D3436] shrink-0">{{ $challenge->icon }}</div>
            <div>
              <div class="inline-flex gap-2">
                <span class="bg-white border-2 border-[#2D3436] rounded-full px-3 py-1 text-xs font-black">#{{ $challenge->sort_order+1 }} · {{ strtoupper($challenge->difficulty) }}</span>
                <span class="bg-[#2D3436] text-white rounded-full px-3 py-1 text-xs font-black">{{ $challenge->max_points }} PTS · {{ $challenge->max_time_seconds }}s</span>
              </div>
              <h1 class="font-display font-black text-[32px] md:text-[40px] leading-none mt-2">{{ $challenge->name }}</h1>
              <p class="font-bold opacity-80 mt-2 leading-relaxed">{{ $challenge->short_description }}</p>
            </div>
          </div>
          <div class="relative mt-6 bg-white rounded-[20px] border-[3px] border-[#2D3436] p-4">
            <div class="text-xs font-black tracking-widest opacity-60">TRACK MAP — FOLLOW THE WHITE LINE</div>
            <svg viewBox="0 0 340 120" class="w-full h-[110px] mt-2">
              <path d="M10 60 H80 Q100 60 100 40 V25 Q100 15 120 15 H220 Q240 15 240 35 V85 Q240 105 260 105 H330" fill="none" stroke="#2D3436" stroke-width="10" stroke-linecap="round"/>
              <path d="M10 60 H80 Q100 60 100 40 V25 Q100 15 120 15 H220 Q240 15 240 35 V85 Q240 105 260 105 H330" fill="none" stroke="white" stroke-width="4" stroke-dasharray="10 10"/>
              <g><rect x="114" y="28" width="22" height="14" rx="4" fill="#FFE66D" stroke="#2D3436" stroke-width="2"/><text x="125" y="38" text-anchor="middle" font-size="7" font-weight="900">↗</text></g>
              <g><rect x="234" y="88" width="22" height="14" rx="4" fill="#FF6B9D" stroke="#2D3436" stroke-width="2"/><text x="245" y="98" text-anchor="middle" font-size="7" font-weight="900">⛰</text></g>
              <g><circle cx="328" cy="105" r="9" fill="#4ECDC4" stroke="#2D3436" stroke-width="2"/><text x="328" y="109" text-anchor="middle" font-size="7">🏁</text></g>
            </svg>
            <div class="flex gap-1.5 flex-wrap mt-2">
              @foreach($challenge->obstacles ?? [] as $o)<span class="bg-[#FFF0C8] border-2 border-[#2D3436] rounded-full px-2.5 py-1 text-xs font-black">{{ $o }}</span>@endforeach
            </div>
          </div>
        </div>
      </div>

      <div class="mt-6 bg-white rounded-[24px] border-[3px] border-[#2D3436] p-6 bubble-shadow-sm">
        <h3 class="font-black text-lg flex items-center gap-2"><span class="w-8 h-8 rounded-xl bg-[#FF6B6B] flex items-center justify-center border-2 border-[#2D3436] text-white">📜</span> Rules — read with teacher!</h3>
        <p class="mt-3 text-sm font-bold leading-relaxed opacity-80 whitespace-pre-line">{{ $challenge->rules ?? $challenge->description }}</p>
        <div class="mt-4 grid grid-cols-3 gap-2 text-center">
          <div class="bg-[#FFF0C8] border-2 border-[#2D3436] rounded-2xl p-3"><div class="text-xl">⏱</div><div class="font-black text-xs">Finish in<br>{{ $challenge->max_time_seconds }} sec</div></div>
          <div class="bg-[#E0F7F3] border-2 border-[#2D3436] rounded-2xl p-3"><div class="text-xl">✅</div><div class="font-black text-xs">Stay on<br>black line</div></div>
          <div class="bg-[#FFE6F0] border-2 border-[#2D3436] rounded-2xl p-3"><div class="text-xl">🎯</div><div class="font-black text-xs">Score up to<br>{{ $challenge->max_points }} pts</div></div>
        </div>
      </div>
    </div>

    <div class="md:col-span-2 space-y-4">
      <div class="bg-white rounded-[24px] border-[3px] border-[#2D3436] p-5 bubble-shadow-sm">
        <h3 class="font-black">Obstacles on this track</h3>
        <div class="mt-3 space-y-2">
          @foreach($challenge->obstacles ?? [] as $i=>$o)
          <div class="flex items-center gap-3 bg-[#FFF8F0] border-2 border-[#2D3436] rounded-2xl px-3 py-2.5">
            <span class="w-8 h-8 rounded-full bg-[#FFE66D] border-2 border-[#2D3436] flex items-center justify-center font-black text-xs">{{ $i+1 }}</span>
            <span class="font-black text-sm flex-1">{{ $o }}</span>
            <span class="text-xs font-black bg-white border-2 border-[#2D3436] rounded-full px-2 py-1">{{ ['⚡','↩','⛰','🕳','🌉'][$i % 5] }}</span>
          </div>
          @endforeach
        </div>
        <div class="mt-4 bg-[#2D3436] text-white rounded-2xl p-4">
          <div class="font-black text-sm">Tip for builders 💡</div>
          <div class="text-xs font-bold opacity-80 leading-relaxed mt-1">Lower your sensors close to ground (3-5mm), add small weight in front for sharp turns, test on paper first!</div>
        </div>
      </div>
      <div class="bg-gradient-to-br from-[#4ECDC4] to-[#95E1D3] rounded-[24px] border-[3px] border-[#2D3436] p-5 text-[#2D3436]">
        <div class="font-display font-black text-xl leading-none">Ready to race this track?</div>
        <p class="text-sm font-bold opacity-80 mt-1">Register team, judges score you live, leaderboard updates every 5s!</p>
        <div class="flex gap-2 mt-4">
          <a href="{{ route('register') }}" class="flex-1 text-center py-3 rounded-full bg-[#FF6B6B] text-white font-black border-[3px] border-[#2D3436] shadow-[0_4px_0_0_#2D3436]">Join Race 🚀</a>
          <a href="{{ route('leaderboard') }}" class="flex-1 text-center py-3 rounded-full bg-white font-black border-[3px] border-[#2D3436]">Live Board 🏆</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
