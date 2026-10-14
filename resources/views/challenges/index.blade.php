@extends('layouts.app')
@section('title','Tantangan — RoboRace')
@section('content')
<div class="max-w-6xl mx-auto px-4 pt-8">
  <div class="text-center max-w-2xl mx-auto">
    <div class="inline-flex items-center gap-2 bg-[#5E3C9F] text-white border-[3px] border-[#141324] rounded-full px-4 py-1.5 font-black text-xs shadow-[0_3px_0_0_#141324] animate-pop">🗺️ 3 LINTASAN · PILIH PETUALANGANMU</div>
    <h1 class="font-display font-black text-[36px] md:text-[44px] leading-none mt-4">Pilih <span class="text-[#5E3C9F]">Tantangan</span>-mu</h1>
    <p class="font-bold opacity-70 mt-2">Setiap lintasan menguji kekuatan super robot yang berbeda. Mulai dari yang mudah, lanjut ke yang paling seru!</p>
  </div>
  <div class="grid md:grid-cols-3 gap-6 mt-8">
    @foreach($challenges as $c)
    <div class="bg-white rounded-[28px] border-[3px] border-[#141324] bubble-shadow-sm overflow-hidden flex flex-col group hover:translate-y-[-4px] transition-all">
      <div class="h-[140px] relative flex items-center justify-center" style="background: linear-gradient(135deg, {{ $c->gradient_from }}, {{ $c->gradient_to }})">
        <div class="absolute inset-0 opacity-20" style="background: radial-gradient(circle, white 2px, transparent 2px) 0 0 / 16px 16px"></div>
        <div class="w-20 h-20 rounded-[22px] bg-white border-[3px] border-[#141324] flex items-center justify-center text-4xl shadow-[0_6px_0_0_#141324] group-hover:animate-wiggle">{{ $c->icon }}</div>
        <span class="absolute top-3 right-3 bg-white border-2 border-[#141324] rounded-full px-3 py-1 text-xs font-black">{{ strtoupper($c->difficulty==='easy'?'mudah':($c->difficulty==='medium'?'sedang':'sulit')) }} · {{ $c->max_points }} POIN</span>
        <span class="absolute top-3 left-3 bg-[#141324] text-white rounded-full px-3 py-1 text-xs font-black">#{{ $c->sort_order+1 }}</span>
      </div>
      <div class="p-5 flex-1 flex flex-col">
        <h3 class="font-display font-black text-xl leading-none">{{ $c->name }}</h3>
        <p class="text-sm font-bold opacity-60 mt-1">⏱ {{ $c->max_time_seconds }} dtk · tingkat {{ $c->difficulty==='easy'?'mudah':($c->difficulty==='medium'?'sedang':'sulit') }}</p>
        <p class="text-sm font-bold opacity-70 mt-3 leading-relaxed flex-1">{{ $c->short_description ?? Str::limit($c->description,110) }}</p>
        <div class="flex flex-wrap gap-1.5 mt-3">
          @foreach(($c->obstacles ?? []) as $o)
            <span class="bg-[#EAE6FE] border-2 border-[#141324] rounded-full px-2.5 py-1 text-xs font-black">{{ $o }}</span>
          @endforeach
        </div>
        <a href="{{ route('challenges.show',$c) }}" class="mt-4 inline-flex justify-center items-center gap-2 w-full py-3 rounded-full font-black border-[3px] border-[#141324] shadow-[0_4px_0_0_#141324] hover:shadow-[0_3px_0_0_#141324] hover:translate-y-[1px] transition text-white" style="background: {{ $c->color }}">Jelajahi Lintasan →</a>
      </div>
    </div>
    @endforeach
  </div>
  <div class="mt-8 bg-[#F4CF3B] border-[3px] border-[#141324] rounded-[24px] p-5 md:p-6 flex flex-col md:flex-row items-center gap-4 bubble-shadow-sm">
    <div class="w-14 h-14 rounded-2xl bg-white border-[3px] border-[#141324] flex items-center justify-center text-2xl shrink-0">💡</div>
    <div class="flex-1">
      <div class="font-black">Tips dari guru</div>
      <div class="text-sm font-bold opacity-70 leading-relaxed">Mulai dari Speed Dash (mudah), lalu coba Maze — Jembatan hanya untuk robot pemberani! Semua tim dapat poin, jadi berhasil finis saja sudah menang.</div>
    </div>
    <a href="{{ route('register') }}" class="shrink-0 px-6 py-3 rounded-full bg-[#5E3C9F] text-white font-black border-[3px] border-[#141324] shadow-[0_4px_0_0_#141324]">Daftarkan Tim</a>
  </div>
</div>
@endsection
