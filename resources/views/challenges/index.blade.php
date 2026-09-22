@extends('layouts.app')
@section('title','Challenges — RoboRace')
@section('content')
<div class="max-w-6xl mx-auto px-4 pt-8">
  <div class="text-center max-w-2xl mx-auto">
    <div class="inline-flex items-center gap-2 bg-[#A78BFA] text-white border-[3px] border-[#2D3436] rounded-full px-4 py-1.5 font-black text-xs shadow-[0_3px_0_0_#2D3436] animate-pop">🗺️ 3 TRACKS · PICK YOUR ADVENTURE</div>
    <h1 class="font-display font-black text-[36px] md:text-[44px] leading-none mt-4">Choose Your <span class="text-[#FF6B6B]">Challenge</span></h1>
    <p class="font-bold opacity-70 mt-2">Each track tests a different robot superpower. Start easy, go wild!</p>
  </div>
  <div class="grid md:grid-cols-3 gap-6 mt-8">
    @foreach($challenges as $c)
    <div class="bg-white rounded-[28px] border-[3px] border-[#2D3436] bubble-shadow-sm overflow-hidden flex flex-col group hover:translate-y-[-4px] transition-all">
      <div class="h-[140px] relative flex items-center justify-center" style="background: linear-gradient(135deg, {{ $c->gradient_from }}, {{ $c->gradient_to }})">
        <div class="absolute inset-0 opacity-20" style="background: radial-gradient(circle, white 2px, transparent 2px) 0 0 / 16px 16px"></div>
        <div class="w-20 h-20 rounded-[22px] bg-white border-[3px] border-[#2D3436] flex items-center justify-center text-4xl shadow-[0_6px_0_0_#2D3436] group-hover:animate-wiggle">{{ $c->icon }}</div>
        <span class="absolute top-3 right-3 bg-white border-2 border-[#2D3436] rounded-full px-3 py-1 text-xs font-black">{{ strtoupper($c->difficulty) }} · {{ $c->max_points }} PTS</span>
        <span class="absolute top-3 left-3 bg-[#2D3436] text-white rounded-full px-3 py-1 text-xs font-black">#{{ $c->sort_order+1 }}</span>
      </div>
      <div class="p-5 flex-1 flex flex-col">
        <h3 class="font-display font-black text-xl leading-none">{{ $c->name }}</h3>
        <p class="text-sm font-bold opacity-60 mt-1">⏱ {{ $c->max_time_seconds }}s · {{ $c->difficulty }} difficulty</p>
        <p class="text-sm font-bold opacity-70 mt-3 leading-relaxed flex-1">{{ $c->short_description ?? Str::limit($c->description,110) }}</p>
        <div class="flex flex-wrap gap-1.5 mt-3">
          @foreach(($c->obstacles ?? []) as $o)
            <span class="bg-[#FFF0C8] border-2 border-[#2D3436] rounded-full px-2.5 py-1 text-xs font-black">{{ $o }}</span>
          @endforeach
        </div>
        <a href="{{ route('challenges.show',$c) }}" class="mt-4 inline-flex justify-center items-center gap-2 w-full py-3 rounded-full font-black border-[3px] border-[#2D3436] shadow-[0_4px_0_0_#2D3436] hover:shadow-[0_3px_0_0_#2D3436] hover:translate-y-[1px] transition text-white" style="background: {{ $c->color }}">Explore Track →</a>
      </div>
    </div>
    @endforeach
  </div>
  <div class="mt-8 bg-[#FFE66D] border-[3px] border-[#2D3436] rounded-[24px] p-5 md:p-6 flex flex-col md:flex-row items-center gap-4 bubble-shadow-sm">
    <div class="w-14 h-14 rounded-2xl bg-white border-[3px] border-[#2D3436] flex items-center justify-center text-2xl shrink-0">💡</div>
    <div class="flex-1">
      <div class="font-black">Teacher tip</div>
      <div class="text-sm font-bold opacity-70 leading-relaxed">Start with Speed Dash (easy), then chase the Maze — the Bridge is for brave bots only! All teams get points, so just finishing is a win.</div>
    </div>
    <a href="{{ route('register') }}" class="shrink-0 px-6 py-3 rounded-full bg-[#FF6B6B] text-white font-black border-[3px] border-[#2D3436] shadow-[0_4px_0_0_#2D3436]">Register Team</a>
  </div>
</div>
@endsection
