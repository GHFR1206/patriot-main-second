@extends('layouts.app')
@section('title','RoboRace — Rakit. Kode. Balapan!')

@section('content')
<section class="max-w-6xl mx-auto px-4 pt-6 md:pt-8">
  <div class="grid md:grid-cols-2 gap-6 items-center">
    <div class="order-2 md:order-1">
      <div class="inline-flex items-center gap-2 bg-white border-[3px] border-[#141324] rounded-full px-3 py-1.5 font-black text-xs shadow-[0_3px_0_0_#141324] animate-pop">
        <span class="w-2 h-2 rounded-full bg-[#EAE6FE] animate-pulse"></span> PENDAFTARAN DIBUKA — 120+ ANAK BERGABUNG
        <span class="hidden sm:inline-flex bg-[#F4CF3B] border-2 border-[#141324] rounded-full px-2 py-0.5">GRATIS!</span>
      </div>
      <h1 class="font-display font-black text-[40px] md:text-[56px] leading-[0.9] tracking-tight mt-4">
        <span class="inline-block animate-slideUp">Rakit.</span><br>
        <span class="inline-block animate-slideUp" style="animation-delay:.08s">Kode.</span><br>
        <span class="inline-block text-[#5E3C9F] relative animate-slideUp" style="animation-delay:.16s">Balapan! <span class="absolute -right-8 -top-2 text-2xl animate-wiggle">🚀</span></span>
      </h1>
      <p class="mt-4 text-[17px] leading-relaxed font-bold opacity-80 max-w-[480px]">Robot line follower, lintasan seru, teman-teman yang bersorak! Pilih tantanganmu, bangun robotmu, dan kejar garis finis.</p>
      <div class="flex flex-wrap gap-3 mt-6">
        <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-[#5E3C9F] text-white font-black text-[15px] border-[3px] border-[#141324] shadow-[0_6px_0_0_#141324] hover:shadow-[0_4px_0_0_#141324] hover:translate-y-[2px] transition">Daftarkan Tim 🤖</a>
        <a href="{{ route('challenges.index') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-white font-black text-[15px] border-[3px] border-[#141324] shadow-[0_6px_0_0_#141324] hover:shadow-[0_4px_0_0_#141324] hover:translate-y-[2px] transition">Lihat Tantangan 👀</a>
      </div>
      <div class="flex items-center gap-3 mt-6">
        <div class="flex -space-x-2">
          <span class="w-9 h-9 rounded-full bg-[#F4CF3B] border-2 border-[#141324] flex items-center justify-center">🧒</span>
          <span class="w-9 h-9 rounded-full bg-[#EAE6FE] border-2 border-[#141324] flex items-center justify-center">👧</span>
          <span class="w-9 h-9 rounded-full bg-[#EAE6FE] border-2 border-[#141324] flex items-center justify-center">🧑</span>
        </div>
        <div class="text-sm font-extrabold leading-tight">Dipercaya <b>40+ sekolah</b><br><span class="opacity-60">Usia 7-15 · Tim 2-4 orang</span></div>
      </div>
    </div>
    <div class="order-1 md:order-2 relative">
      <div class="bg-white rounded-[32px] border-[3px] border-[#141324] bubble-shadow p-4 md:p-6 relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none opacity-[0.07]" style="background: radial-gradient(circle at 20% 20%, #5E3C9F 2px, transparent 2px) 0 0 / 22px 22px, radial-gradient(circle at 80% 80%, #EAE6FE 2px, transparent 2px) 0 0 / 28px 28px;"></div>
        <div class="flex items-center justify-between">
          <span class="bg-[#141324] text-white text-xs font-black rounded-full px-3 py-1">PRATINJAU LINTASAN LANGSUNG</span>
          <span class="w-2.5 h-2.5 rounded-full bg-[#5E3C9F] animate-pulse border-2 border-[#141324]"></span>
        </div>
        <div class="mt-4 relative bg-[#EAE6FE] rounded-[20px] border-[3px] border-[#141324] p-4 overflow-hidden">
          <svg viewBox="0 0 320 140" class="w-full h-[140px]">
            <path d="M20 70 H90 Q110 70 110 50 V30 Q110 20 130 20 H190 Q210 20 210 40 V100 Q210 120 230 120 H300" fill="none" stroke="#141324" stroke-width="10" stroke-linecap="round"/>
            <path d="M20 70 H90 Q110 70 110 50 V30 Q110 20 130 20 H190 Q210 20 210 40 V100 Q210 120 230 120 H300" fill="none" stroke="white" stroke-width="4" stroke-dasharray="10 10" style="animation:trackDash 1s linear infinite"/>
            <g class="animate-robotRun">
              <rect x="100" y="46" width="28" height="20" rx="8" fill="#5E3C9F" stroke="#141324" stroke-width="2"/>
              <circle cx="108" cy="56" r="3" fill="white"/><circle cx="120" cy="56" r="3" fill="white"/>
              <rect x="96" y="54" width="6" height="4" rx="2" fill="#141324"/><rect x="126" y="54" width="6" height="4" rx="2" fill="#141324"/>
            </g>
            <g><rect x="224" y="108" width="18" height="12" rx="3" fill="#F4CF3B" stroke="#141324" stroke-width="2"/><text x="233" y="117" text-anchor="middle" font-size="7" font-weight="900">⛰</text></g>
            <g><circle cx="290" cy="120" r="10" fill="#EAE6FE" stroke="#141324" stroke-width="2"/><text x="290" y="124" text-anchor="middle" font-size="9">🏁</text></g>
          </svg>
          <div class="flex gap-2 mt-3 flex-wrap">
            <span class="bg-white border-2 border-[#141324] rounded-full px-3 py-1 text-xs font-black">⚡ lintasan lurus 1,2 m</span>
            <span class="bg-[#EAE6FE] border-2 border-[#141324] rounded-full px-3 py-1 text-xs font-black text-[#141324]">↩ belokan tajam</span>
            <span class="bg-[#F4CF3B] border-2 border-[#141324] rounded-full px-3 py-1 text-xs font-black">⛰ tanjakan</span>
          </div>
        </div>
        <div class="grid grid-cols-3 gap-2 mt-4">
          <div class="bg-[#F4CF3B] border-2 border-[#141324] rounded-2xl p-3 text-center"><div class="text-xl">⏱</div><div class="font-black text-sm">Tercepat</div><div class="font-black text-lg leading-none">12,43 dtk</div><div class="text-xs font-bold opacity-60">Tim Sparks</div></div>
          <div class="bg-[#EAE6FE] border-2 border-[#141324] rounded-2xl p-3 text-center text-[#141324]"><div class="text-xl">🏆</div><div class="font-black text-sm">Skor Tertinggi</div><div class="font-black text-lg leading-none">298 poin</div><div class="text-xs font-bold opacity-80">RoboRangers</div></div>
          <div class="bg-[#EAE6FE] border-2 border-[#141324] rounded-2xl p-3 text-center text-[#141324]"><div class="text-xl">🤖</div><div class="font-black text-sm">Jumlah Tim</div><div class="font-black text-lg leading-none">48</div><div class="text-xs font-bold opacity-80">dan terus bertambah!</div></div>
        </div>
      </div>
      <div class="absolute -bottom-3 -left-2 bg-[#5E3C9F] text-white border-[3px] border-[#141324] rounded-2xl px-4 py-2 font-black text-sm shadow-[0_4px_0_0_#141324] rotate-[-2deg] hidden md:flex items-center gap-2">3 tantangan · hadiah untuk semua! 🎉</div>
    </div>
  </div>
</section>

<section class="max-w-6xl mx-auto px-4 mt-10">
  <div class="flex items-end justify-between gap-4">
    <div>
      <div class="inline-flex items-center gap-2 bg-[#F4CF3B] border-2 border-[#141324] rounded-full px-3 py-1 font-black text-xs">PILIH PETUALANGANMU</div>
      <h2 class="font-display font-black text-[30px] md:text-[36px] leading-none mt-2">3 Tantangan Seru</h2>
      <p class="font-bold opacity-70 mt-1">Setiap lintasan menguji kekuatan super berbeda — kecepatan, kecerdasan, keseimbangan!</p>
    </div>
    <a href="{{ route('challenges.index') }}" class="hidden md:inline-flex px-5 py-2.5 rounded-full bg-white border-[3px] border-[#141324] font-black text-sm shadow-[0_4px_0_0_#141324]">Lihat semua →</a>
  </div>

  <div class="grid md:grid-cols-3 gap-5 mt-6">
    @foreach($challenges as $c)
    <a href="{{ route('challenges.show',$c) }}" class="group relative bg-white rounded-[28px] border-[3px] border-[#141324] bubble-shadow-sm overflow-hidden hover:translate-y-[-4px] hover:shadow-[0_12px_0_0_rgba(0,0,0,0.08),0_20px_40px_rgba(0,0,0,0.12)] transition-all">
      <div class="h-[110px] relative overflow-hidden" style="background: linear-gradient(135deg, {{ $c->gradient_from }}, {{ $c->gradient_to }})">
        <div class="absolute inset-0 opacity-20" style="background: radial-gradient(circle, white 2px, transparent 2px) 0 0 / 18px 18px"></div>
        <div class="absolute left-4 top-4 w-14 h-14 rounded-2xl bg-white border-[3px] border-[#141324] flex items-center justify-center text-3xl shadow-[0_4px_0_0_#141324] group-hover:animate-wiggle">{{ $c->icon }}</div>
        <span class="absolute right-4 top-4 bg-white border-2 border-[#141324] rounded-full px-3 py-1 text-xs font-black capitalize
          @if($c->difficulty==='easy') bg-[#EAE6FE] @elseif($c->difficulty==='medium') bg-[#F4CF3B] @else bg-[#5E3C9F] text-white @endif">
          {{ $c->difficulty==='easy' ? 'mudah' : ($c->difficulty==='medium' ? 'sedang' : 'sulit') }} · {{ $c->max_points }} poin
        </span>
        <div class="absolute bottom-0 left-0 right-0 h-6 bg-white rounded-t-[20px] border-t-[3px] border-[#141324]/10"></div>
      </div>
      <div class="p-5">
        <h3 class="font-display font-black text-xl leading-none">{{ $c->name }}</h3>
        <p class="text-sm font-bold opacity-70 mt-1.5 leading-relaxed line-clamp-2">{{ $c->short_description ?? $c->description }}</p>
        <div class="flex flex-wrap gap-1.5 mt-3">
          @foreach(array_slice($c->obstacles ?? [],0,3) as $o)
            <span class="bg-[#EAE6FE] border-2 border-[#141324] rounded-full px-2.5 py-1 text-xs font-black">{{ $o }}</span>
          @endforeach
        </div>
        <div class="flex items-center justify-between mt-4">
          <span class="text-xs font-black opacity-60">⏱ maks {{ $c->max_time_seconds }} dtk</span>
          <span class="inline-flex items-center gap-1 bg-[#141324] text-white rounded-full px-3 py-1.5 text-xs font-black">Coba <span class="group-hover:translate-x-1 transition">→</span></span>
        </div>
      </div>
    </a>
    @endforeach
  </div>
</section>

<section class="max-w-6xl mx-auto px-4 mt-10">
  <div class="bg-[#141324] rounded-[28px] p-6 md:p-8 text-white relative overflow-hidden">
    <div class="absolute -top-10 -right-10 w-40 h-40 rounded-full bg-[#5E3C9F] opacity-20"></div>
    <div class="absolute -bottom-8 -left-8 w-32 h-32 rounded-full bg-[#EAE6FE] opacity-20"></div>
    <div class="relative grid md:grid-cols-4 gap-6">
      <div class="md:col-span-1">
        <div class="inline-flex bg-[#F4CF3B] text-[#141324] border-2 border-white rounded-full px-3 py-1 font-black text-xs">CARA KERJA</div>
        <h3 class="font-display font-black text-2xl leading-none mt-3">3 langkah<br>menuju hari lomba!</h3>
      </div>
      @php $steps=[['n'=>'01','t'=>'Bentuk tim','d'=>'2-4 teman, pilih nama robot & sekolah','c'=>'#5E3C9F','e'=>'👥'],['n'=>'02','t'=>'Rakit & kode','d'=>'Sensor garis + motor, jaga tetap di garis!','c'=>'#EAE6FE','e'=>'🔧'],['n'=>'03','t'=>'Balapan & sorak','d'=>'Waktu berhenti, poin naik, penonton bersorak!','c'=>'#F4CF3B','e'=>'🏁']]; @endphp
      @foreach($steps as $s)
      <div class="bg-white text-[#141324] rounded-[20px] border-[3px] border-white p-4 relative">
        <div class="w-8 h-8 rounded-full flex items-center justify-center font-black text-sm border-2 border-[#141324]" style="background: {{ $s['c'] }}">{{ $s['n'] }}</div>
        <div class="text-2xl mt-2">{{ $s['e'] }}</div>
        <div class="font-black mt-1">{{ $s['t'] }}</div>
        <div class="text-xs font-bold opacity-60 leading-relaxed">{{ $s['d'] }}</div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="max-w-6xl mx-auto px-4 mt-10 grid md:grid-cols-5 gap-6">
  <div class="md:col-span-3 bg-white rounded-[28px] border-[3px] border-[#141324] bubble-shadow-sm p-6">
    <div class="flex items-center justify-between">
      <h3 class="font-display font-black text-xl flex items-center gap-2"><span class="w-8 h-8 rounded-xl bg-[#EAE6FE] flex items-center justify-center border-2 border-[#141324] text-[#141324]">🏆</span> Papan Skor Mini Langsung</h3>
      <a href="{{ route('leaderboard') }}" class="text-xs font-black bg-[#F4CF3B] border-2 border-[#141324] rounded-full px-3 py-1.5">Lihat lengkap →</a>
    </div>
    <div class="mt-4 space-y-2">
      @forelse($topTeams ?? [] as $i=>$t)
      <div class="flex items-center gap-3 bg-[#EAE6FE] border-2 border-[#141324] rounded-2xl px-3 py-2.5 {{ $i===0?'bg-[#F4CF3B]':'' }}">
        <span class="w-7 h-7 rounded-full flex items-center justify-center font-black text-xs border-2 border-[#141324] {{ $i===0?'bg-[#5E3C9F] text-white':($i===1?'bg-[#EAE6FE] text-[#141324]':'bg-white') }}">{{ $i+1 }}</span>
        <span class="w-8 h-8 rounded-full bg-white border-2 border-[#141324] flex items-center justify-center">{{ $t->emoji ?? '🤖' }}</span>
        <div class="flex-1 min-w-0">
          <div class="font-black text-sm leading-none truncate">{{ $t->name }}</div>
          <div class="text-xs font-bold opacity-60 truncate">{{ $t->school }}</div>
        </div>
        <div class="text-right">
          <div class="font-black text-sm">{{ $t->total_points }} poin</div>
          <div class="text-xs font-bold opacity-60">{{ $t->best_time ? $t->best_time.' dtk': '—' }}</div>
        </div>
      </div>
      @empty
      <div class="text-center py-8 font-bold opacity-60">Belum ada skor — jadi yang pertama! 🚀<br><a href="{{ route('register') }}" class="underline">Daftarkan tim</a></div>
      @endforelse
    </div>
  </div>
  <div class="md:col-span-2 bg-gradient-to-br from-[#EAE6FE] to-[#F4CF3B] rounded-[28px] border-[3px] border-[#141324] p-6 text-[#141324] relative overflow-hidden">
    <div class="absolute -right-6 -bottom-6 text-[120px] opacity-10 rotate-12">🤖</div>
    <h3 class="font-display font-black text-2xl leading-none">Siap berangkat?</h3>
    <p class="font-bold opacity-80 mt-2 text-sm leading-relaxed">Kumpulkan timmu, pilih tantangan, buat robot pengikut garis tercepat.</p>
    <ul class="mt-4 space-y-2 text-sm font-black">
      <li class="flex items-center gap-2"><span class="w-6 h-6 rounded-full bg-white border-2 border-[#141324] flex items-center justify-center text-xs">✓</span> Semua bahan disediakan</li>
      <li class="flex items-center gap-2"><span class="w-6 h-6 rounded-full bg-white border-2 border-[#141324] flex items-center justify-center text-xs">✓</span> Juri siap membantu belajar</li>
      <li class="flex items-center gap-2"><span class="w-6 h-6 rounded-full bg-white border-2 border-[#141324] flex items-center justify-center text-xs">✓</span> Hadiah untuk setiap tim!</li>
    </ul>
    <a href="{{ route('register') }}" class="mt-6 inline-flex w-full justify-center px-6 py-3.5 rounded-full bg-[#141324] text-white font-black border-[3px] border-[#141324] shadow-[0_4px_0_0_rgba(0,0,0,0.2)]">Ikut Lomba — Gratis! 🎉</a>
    <div class="text-center text-xs font-black opacity-60 mt-2">Cuma 2 menit · Tanpa kartu kredit</div>
  </div>
</section>
@endsection
