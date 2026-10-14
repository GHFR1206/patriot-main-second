@extends('layouts.app')
@section('title', $challenge->name.' — RoboRace')
@section('content')
<div class="max-w-6xl mx-auto px-4 pt-6">
  <a href="{{ route('challenges.index') }}" class="inline-flex items-center gap-1 bg-white border-2 border-[#141324] rounded-full px-4 py-1.5 font-black text-sm">← Semua tantangan</a>

  <div class="mt-4 grid md:grid-cols-5 gap-6">
    <div class="md:col-span-3">
      <div class="rounded-[28px] border-[3px] border-[#141324] overflow-hidden bubble-shadow" style="background: linear-gradient(135deg, {{ $challenge->gradient_from }}, {{ $challenge->gradient_to }})">
        <div class="p-6 md:p-8 text-[#141324] relative overflow-hidden">
          <div class="absolute inset-0 opacity-[0.08]" style="background: radial-gradient(circle, #141324 2px, transparent 2px) 0 0 / 18px 18px"></div>
          <div class="relative flex gap-4 items-start">
            <div class="w-16 h-16 rounded-2xl bg-white border-[3px] border-[#141324] flex items-center justify-center text-3xl shadow-[0_4px_0_0_#141324] shrink-0">{{ $challenge->icon }}</div>
            <div>
              <div class="inline-flex gap-2">
                <span class="bg-white border-2 border-[#141324] rounded-full px-3 py-1 text-xs font-black">#{{ $challenge->sort_order+1 }} · {{ strtoupper($challenge->difficulty==='easy'?'MUDAH':($challenge->difficulty==='medium'?'SEDANG':'SULIT')) }}</span>
                <span class="bg-[#141324] text-white rounded-full px-3 py-1 text-xs font-black">{{ $challenge->max_points }} POIN · {{ $challenge->max_time_seconds }} dtk</span>
              </div>
              <h1 class="font-display font-black text-[32px] md:text-[40px] leading-none mt-2">{{ $challenge->name }}</h1>
              <p class="font-bold opacity-80 mt-2 leading-relaxed">{{ $challenge->short_description }}</p>
            </div>
          </div>
          <div class="relative mt-6 bg-white rounded-[20px] border-[3px] border-[#141324] p-4">
            <div class="text-xs font-black tracking-widest opacity-60">PETA LINTASAN — IKUTI GARIS PUTIH</div>
            <svg viewBox="0 0 340 120" class="w-full h-[110px] mt-2">
              <path d="M10 60 H80 Q100 60 100 40 V25 Q100 15 120 15 H220 Q240 15 240 35 V85 Q240 105 260 105 H330" fill="none" stroke="#141324" stroke-width="10" stroke-linecap="round"/>
              <path d="M10 60 H80 Q100 60 100 40 V25 Q100 15 120 15 H220 Q240 15 240 35 V85 Q240 105 260 105 H330" fill="none" stroke="white" stroke-width="4" stroke-dasharray="10 10"/>
              <g><rect x="114" y="28" width="22" height="14" rx="4" fill="#F4CF3B" stroke="#141324" stroke-width="2"/><text x="125" y="38" text-anchor="middle" font-size="7" font-weight="900">↗</text></g>
              <g><rect x="234" y="88" width="22" height="14" rx="4" fill="#EAE6FE" stroke="#141324" stroke-width="2"/><text x="245" y="98" text-anchor="middle" font-size="7" font-weight="900">⛰</text></g>
              <g><circle cx="328" cy="105" r="9" fill="#EAE6FE" stroke="#141324" stroke-width="2"/><text x="328" y="109" text-anchor="middle" font-size="7">🏁</text></g>
            </svg>
            <div class="flex gap-1.5 flex-wrap mt-2">
              @foreach($challenge->obstacles ?? [] as $o)<span class="bg-[#EAE6FE] border-2 border-[#141324] rounded-full px-2.5 py-1 text-xs font-black">{{ $o }}</span>@endforeach
            </div>
          </div>
        </div>
      </div>

      <div class="mt-6 bg-white rounded-[24px] border-[3px] border-[#141324] p-6 bubble-shadow-sm">
        <h3 class="font-black text-lg flex items-center gap-2"><span class="w-8 h-8 rounded-xl bg-[#5E3C9F] flex items-center justify-center border-2 border-[#141324] text-white">📜</span> Aturan — baca bersama guru!</h3>
        <p class="mt-3 text-sm font-bold leading-relaxed opacity-80 whitespace-pre-line">{{ $challenge->rules ?? $challenge->description }}</p>
        <div class="mt-4 grid grid-cols-3 gap-2 text-center">
          <div class="bg-[#EAE6FE] border-2 border-[#141324] rounded-2xl p-3"><div class="text-xl">⏱</div><div class="font-black text-xs">Selesaikan dalam<br>{{ $challenge->max_time_seconds }} detik</div></div>
          <div class="bg-[#EAE6FE] border-2 border-[#141324] rounded-2xl p-3"><div class="text-xl">✅</div><div class="font-black text-xs">Tetap di<br>garis hitam</div></div>
          <div class="bg-[#EAE6FE] border-2 border-[#141324] rounded-2xl p-3"><div class="text-xl">🎯</div><div class="font-black text-xs">Raih hingga<br>{{ $challenge->max_points }} poin</div></div>
        </div>
      </div>
    </div>

    <div class="md:col-span-2 space-y-4">
      <div class="bg-white rounded-[24px] border-[3px] border-[#141324] p-5 bubble-shadow-sm">
        <h3 class="font-black">Rintangan di lintasan ini</h3>
        <div class="mt-3 space-y-2">
          @foreach($challenge->obstacles ?? [] as $i=>$o)
          <div class="flex items-center gap-3 bg-[#EAE6FE] border-2 border-[#141324] rounded-2xl px-3 py-2.5">
            <span class="w-8 h-8 rounded-full bg-[#F4CF3B] border-2 border-[#141324] flex items-center justify-center font-black text-xs">{{ $i+1 }}</span>
            <span class="font-black text-sm flex-1">{{ $o }}</span>
            <span class="text-xs font-black bg-white border-2 border-[#141324] rounded-full px-2 py-1">{{ ['⚡','↩','⛰','🕳','🌉'][$i % 5] }}</span>
          </div>
          @endforeach
        </div>
        <div class="mt-4 bg-[#141324] text-white rounded-2xl p-4">
          <div class="font-black text-sm">Tips membangun 💡</div>
          <div class="text-xs font-bold opacity-80 leading-relaxed mt-1">Turunkan sensor dekat tanah (3-5mm), tambah sedikit beban di depan untuk belokan tajam, uji coba di kertas dulu!</div>
        </div>
      </div>
      <div class="bg-gradient-to-br from-[#EAE6FE] to-[#F4CF3B] rounded-[24px] border-[3px] border-[#141324] p-5 text-[#141324]">
        <div class="font-display font-black text-xl leading-none">Siap balapan di lintasan ini?</div>
        <p class="text-sm font-bold opacity-80 mt-1">Daftarkan tim, juri menilai langsung, papan skor update setiap 5 detik!</p>
        <div class="flex gap-2 mt-4">
          <a href="{{ route('register') }}" class="flex-1 text-center py-3 rounded-full bg-[#5E3C9F] text-white font-black border-[3px] border-[#141324] shadow-[0_4px_0_0_#141324]">Ikut Lomba 🚀</a>
          <a href="{{ route('leaderboard') }}" class="flex-1 text-center py-3 rounded-full bg-white font-black border-[3px] border-[#141324]">Papan Skor 🏆</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
