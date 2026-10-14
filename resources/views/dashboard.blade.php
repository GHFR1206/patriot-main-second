@extends('layouts.app')
@section('title','Dasbor — RoboRace')
@section('content')
<div class="max-w-6xl mx-auto px-4 pt-6">
  @if(!$team)
    <div class="bg-[#F4CF3B] border-[3px] border-[#141324] rounded-[24px] p-6 text-center bubble-shadow-sm">
      <div class="text-3xl">🤖</div>
      <div class="font-display font-black text-xl mt-2">Belum punya tim!</div>
      <p class="text-sm font-bold opacity-70">Kamu sudah masuk tapi belum punya tim. Buat tim di halaman pendaftaran, atau minta admin untuk menghubungkanmu.</p>
      <a href="{{ route('register') }}" class="mt-3 inline-flex px-6 py-2.5 rounded-full bg-[#5E3C9F] text-white font-black border-[3px] border-[#141324]">Buat Tim</a>
    </div>
  @else
    <div class="grid md:grid-cols-3 gap-6">
      <div class="md:col-span-2">
        <div class="bg-white rounded-[28px] border-[3px] border-[#141324] bubble-shadow p-6 relative overflow-hidden">
          <div class="absolute top-0 right-0 w-28 h-28 rounded-full opacity-10" style="background: {{ $team->color }}"></div>
          <div class="relative flex gap-4 items-start">
            <span class="w-14 h-14 rounded-2xl border-[3px] border-[#141324] flex items-center justify-center text-2xl shrink-0" style="background: {{ $team->color }}">{{ $team->emoji }}</span>
            <div class="flex-1">
              <div class="flex flex-wrap items-center gap-2">
                <h1 class="font-display font-black text-2xl leading-none">{{ $team->name }}</h1>
                <span class="bg-[#F4CF3B] border-2 border-[#141324] rounded-full px-2.5 py-1 text-xs font-black">{{ strtoupper($team->age_group) }}</span>
                <span class="bg-[#EAE6FE] text-[#141324] border-2 border-[#141324] rounded-full px-2.5 py-1 text-xs font-black">{{ $team->total_points }} poin</span>
              </div>
              <div class="text-sm font-bold opacity-60 mt-1">🏫 {{ $team->school }} · 🤖 {{ $team->robot_name }} · 👥 {{ $team->members_count }} anggota · ⏱ terbaik {{ $team->best_time ? $team->best_time.' dtk':'—' }}</div>
              <div class="flex flex-wrap gap-1.5 mt-2">
                @foreach(($team->members ?? []) as $m)<span class="bg-[#EAE6FE] border-2 border-[#141324] rounded-full px-2.5 py-1 text-xs font-black">{{ $m }}</span>@endforeach
              </div>
            </div>
          </div>
          <div class="mt-5 grid grid-cols-3 gap-2">
            <div class="bg-[#EAE6FE] border-[3px] border-[#141324] rounded-2xl p-3 text-center"><div class="text-xl">🏆</div><div class="font-black text-sm">{{ $team->total_points }} poin</div><div class="text-xs font-bold opacity-60">Total</div></div>
            <div class="bg-[#EAE6FE] border-[3px] border-[#141324] rounded-2xl p-3 text-center"><div class="text-xl">⏱</div><div class="font-black text-sm">{{ $team->best_time ? $team->best_time.' dtk':'—' }}</div><div class="text-xs font-bold opacity-60">Waktu terbaik</div></div>
            <div class="bg-[#EAE6FE] border-[3px] border-[#141324] rounded-2xl p-3 text-center"><div class="text-xl">🎯</div><div class="font-black text-sm">{{ $team->scores->where('status','completed')->count() }}/{{ $challenges->count() }}</div><div class="text-xs font-bold opacity-60">Lintasan selesai</div></div>
          </div>
        </div>

        <div class="mt-6 bg-white rounded-[28px] border-[3px] border-[#141324] bubble-shadow-sm p-6">
          <h3 class="font-black flex items-center gap-2"><span class="w-8 h-8 rounded-xl bg-[#5E3C9F] flex items-center justify-center border-2 border-[#141324] text-white">📊</span> Skormu</h3>
          <div class="mt-4 space-y-2">
            @foreach($challenges as $c)
              @php $sc = $team->scores->firstWhere('challenge_id',$c->id); @endphp
              <div class="flex items-center gap-3 border-[3px] border-[#141324] rounded-2xl px-4 py-3 {{ $sc ? 'bg-[#EAE6FE]' : 'bg-white opacity-60' }}">
                <span class="w-10 h-10 rounded-xl border-2 border-[#141324] flex items-center justify-center text-xl shrink-0" style="background: {{ $c->gradient_from }}">{{ $c->icon }}</span>
                <div class="flex-1 min-w-0">
                  <div class="font-black text-sm leading-none">{{ $c->name }}</div>
                  <div class="text-xs font-bold opacity-60">#{{ $c->sort_order+1 }} · maks {{ $c->max_points }} poin</div>
                </div>
                @if($sc)
                  <div class="text-right">
                    <div class="font-black text-sm">{{ $sc->points }} poin</div>
                    <div class="text-xs font-bold opacity-60">{{ $sc->time_seconds ? $sc->time_seconds.' dtk':'' }} @if($sc->penalties) -{{ $sc->penalties }}@endif</div>
                  </div>
                  <span class="bg-[#EAE6FE] border-2 border-[#141324] rounded-full px-2 py-1 text-xs font-black">✅ {{ $sc->status==='completed' ? 'selesai' : $sc->status }}</span>
                @else
                  <span class="bg-[#F4CF3B] border-2 border-[#141324] rounded-full px-3 py-1 text-xs font-black">Belum →</span>
                @endif
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="space-y-4">
        <div class="bg-[#141324] text-white rounded-[28px] p-6">
          <div class="font-display font-black text-xl">Langkah selanjutnya</div>
          <ul class="mt-3 space-y-2 text-sm font-bold">
            <li class="flex gap-2"><span class="w-6 h-6 rounded-full bg-[#F4CF3B] text-[#141324] flex items-center justify-center text-xs shrink-0">✓</span> Lapor ke guru di meja lomba</li>
            <li class="flex gap-2"><span class="w-6 h-6 rounded-full bg-[#EAE6FE] flex items-center justify-center text-xs shrink-0">2</span> Jalani tiap lintasan, juri akan menilaimu</li>
            <li class="flex gap-2"><span class="w-6 h-6 rounded-full bg-[#EAE6FE] flex items-center justify-center text-xs shrink-0">3</span> Pantau <a href="{{ route('leaderboard') }}" class="underline">papan skor langsung</a>!</li>
          </ul>
          <a href="{{ route('leaderboard') }}" class="mt-4 inline-flex w-full justify-center py-2.5 rounded-full bg-white text-[#141324] font-black border-2 border-white">Papan Skor Langsung 🏆</a>
        </div>
        <div class="bg-[#F4CF3B] border-[3px] border-[#141324] rounded-[28px] p-5">
          <div class="font-black">Masuk sebagai</div>
          <div class="text-sm font-bold opacity-70">{{ auth()->user()->name }} · {{ auth()->user()->email }}</div>
          <div class="mt-2 flex flex-wrap gap-1.5">
            @foreach(auth()->user()->roles as $r)<span class="bg-white border-2 border-[#141324] rounded-full px-2 py-1 text-xs font-black">{{ $r->name }}</span>@endforeach
            @if(auth()->user()->roles->isEmpty())<span class="bg-white border-2 border-[#141324] rounded-full px-2 py-1 text-xs font-black">peserta</span>@endif
          </div>
          <form method="POST" action="{{ route('logout') }}" class="mt-3">@csrf<button class="w-full py-2.5 rounded-full bg-white font-black border-[3px] border-[#141324]">Keluar</button></form>
          <a href="/admin" class="mt-2 block text-center text-xs font-black underline">Panel Admin / Juri →</a>
        </div>
      </div>
    </div>
  @endif
</div>
@endsection
