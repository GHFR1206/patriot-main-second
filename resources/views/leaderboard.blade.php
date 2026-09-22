@extends('layouts.app')
@section('title','Papan Skor Langsung — RoboRace')
@section('content')
<div class="max-w-6xl mx-auto px-4 pt-6">
  <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
    <div>
      <div class="inline-flex items-center gap-2 bg-[#4ECDC4] text-white border-[3px] border-[#2D3436] rounded-full px-4 py-1.5 font-black text-xs shadow-[0_3px_0_0_#2D3436]"><span class="w-2 h-2 rounded-full bg-white animate-pulse"></span> LANGSUNG — DIPERBARUI SETIAP 5 DETIK</div>
      <h1 class="font-display font-black text-[36px] md:text-[44px] leading-none mt-3 flex items-center gap-2">Papan Skor <span class="text-[#FF6B6B]">🏆</span></h1>
      <p class="font-bold opacity-60">Siapa robot tercepat? Pantau terus — skor muncul secara real-time!</p>
    </div>
    <div class="flex gap-2 flex-wrap">
      <a href="{{ route('leaderboard') }}" class="px-4 py-2 rounded-full font-black text-sm border-[3px] border-[#2D3436] {{ !$challengeId ? 'bg-[#FF6B6B] text-white shadow-[0_3px_0_0_#2D3436]' : 'bg-white' }}">Semua Lintasan</a>
      @foreach($challenges as $c)
        <a href="{{ route('leaderboard',['challenge'=>$c->id]) }}" class="px-4 py-2 rounded-full font-black text-sm border-[3px] border-[#2D3436] flex items-center gap-1 {{ (int)$challengeId===$c->id ? 'text-white shadow-[0_3px_0_0_#2D3436]' : 'bg-white' }}" @if((int)$challengeId===$c->id) style="background: {{ $c->color }}" @endif><span>{{ $c->icon }}</span> {{ Str::limit($c->name,14) }}</a>
      @endforeach
    </div>
  </div>

  <div class="mt-6 grid lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2">
      <div class="bg-white rounded-[24px] border-[3px] border-[#2D3436] bubble-shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-5 py-3 border-b-[3px] border-[#2D3436] bg-[#FFF0C8]">
          <span class="font-black text-sm flex items-center gap-2">🏁 PERINGKAT <span id="updatedAt" class="text-xs font-bold opacity-60 ml-2"></span></span>
          <span class="flex items-center gap-1.5 text-xs font-black"><span class="w-2 h-2 rounded-full bg-[#4ECDC4] animate-pulse"></span> Otomatis perbarui</span>
        </div>
        <div id="board" class="divide-y-[3px] divide-[#2D3436]/10">
          <div class="p-8 text-center font-bold opacity-50">Memuat pembalap… 🤖💨</div>
        </div>
      </div>
      <div class="mt-3 text-center text-xs font-black opacity-40">Mengambil <code>/leaderboard/data</code> setiap 5 dtk · <button onclick="fetchBoard()" class="underline">muat ulang sekarang</button></div>
    </div>

    <div class="space-y-4">
      <div class="bg-[#2D3436] text-white rounded-[24px] p-5">
        <div class="font-display font-black text-xl">Cara penilaian</div>
        <ul class="mt-3 space-y-2 text-sm font-bold">
          <li class="flex gap-2"><span class="w-6 h-6 rounded-full bg-[#FFE66D] text-[#2D3436] flex items-center justify-center text-xs shrink-0">1</span> Finis = poin dasar (hingga 100)</li>
          <li class="flex gap-2"><span class="w-6 h-6 rounded-full bg-[#4ECDC4] flex items-center justify-center text-xs shrink-0">2</span> Waktu lebih cepat = bonus ⚡</li>
          <li class="flex gap-2"><span class="w-6 h-6 rounded-full bg-[#FF6B9D] flex items-center justify-center text-xs shrink-0">3</span> Keluar lintasan = penalti −5</li>
          <li class="flex gap-2"><span class="w-6 h-6 rounded-full bg-[#95E1D3] flex items-center justify-center text-xs shrink-0">4</span> Juri memverifikasi ✅</li>
        </ul>
      </div>
      <div class="bg-[#FFE66D] border-[3px] border-[#2D3436] rounded-[24px] p-5 bubble-shadow-sm">
        <div class="font-black">Dukung timmu! 🎉</div>
        <div class="text-sm font-bold opacity-70 mt-1">Teriak, tepuk tangan, buat spanduk — sorakan penonton bikin robot makin ngebut (nggak beneran, tapi seru!).</div>
        <div class="mt-3 flex gap-1 text-xl"><span>🥳</span><span>📣</span><span>🎈</span><span>🏅</span></div>
      </div>
      <div class="bg-white border-[3px] border-[#2D3436] rounded-[24px] p-5">
        <div class="font-black text-sm">Pratinjau podium</div>
        <div class="flex items-end justify-center gap-2 mt-4">
          <div class="text-center"><div class="w-16 h-14 bg-[#4ECDC4] border-[3px] border-[#2D3436] rounded-t-2xl flex items-end justify-center pb-1 font-black text-white">2nd 🥈</div><div class="text-xs font-bold mt-1">Perak</div></div>
          <div class="text-center"><div class="w-20 h-20 bg-[#FFE66D] border-[3px] border-[#2D3436] rounded-t-2xl flex items-end justify-center pb-2 font-black">1st 🥇</div><div class="text-xs font-bold mt-1">Juara</div></div>
          <div class="text-center"><div class="w-16 h-10 bg-[#FF6B9D] border-[3px] border-[#2D3436] rounded-t-2xl flex items-end justify-center pb-1 font-black text-white">3rd 🥉</div><div class="text-xs font-bold mt-1">Perunggu</div></div>
        </div>
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script>
const challengeId = {{ $challengeId ? (int)$challengeId : 'null' }};
let lastData = null;
function medal(i){
  if(i===0) return '<span class="w-7 h-7 rounded-full bg-[#FFE66D] border-2 border-[#2D3436] flex items-center justify-center text-sm">🥇</span>';
  if(i===1) return '<span class="w-7 h-7 rounded-full bg-[#4ECDC4] border-2 border-[#2D3436] flex items-center justify-center text-sm">🥈</span>';
  if(i===2) return '<span class="w-7 h-7 rounded-full bg-[#FF6B9D] border-2 border-[#2D3436] flex items-center justify-center text-sm">🥉</span>';
  return `<span class="w-7 h-7 rounded-full bg-white border-2 border-[#2D3436] flex items-center justify-center font-black text-xs">${i+1}</span>`;
}
function render(teams){
  const el=document.getElementById('board');
  if(!teams.length){ el.innerHTML='<div class="p-8 text-center font-bold opacity-50">Belum ada skor — jadi yang pertama! 🚀<br><a class="underline" href="{{ route('register') }}">Daftarkan tim</a></div>'; return; }
  el.innerHTML = teams.map((t,i)=>{
    const isTop = i===0;
    return `<div class="flex items-center gap-3 px-4 py-3 ${isTop?'bg-[#FFF0C8]':''} ${isTop?'animate-pulse-soft':''}">
      ${medal(i)}
      <span class="w-10 h-10 rounded-2xl border-[3px] border-[#2D3436] flex items-center justify-center text-xl shrink-0" style="background:${t.color||'#FFE66D'}">${t.emoji||'🤖'}</span>
      <div class="flex-1 min-w-0">
        <div class="font-black text-sm leading-none truncate">${t.name} <span class="text-xs opacity-50 font-bold">· ${t.robot_name||'Bot'}</span></div>
        <div class="text-xs font-bold opacity-60 truncate">${t.school} · ${t.age_group} · 👥 ${t.members_count}</div>
      </div>
      <div class="text-right shrink-0">
        <div class="font-black ${isTop?'text-[#FF6B6B] text-base':'text-sm'}">${t.total_points} poin</div>
        <div class="text-xs font-bold opacity-60">${t.best_time ? t.best_time+' dtk ⏱' : '—'}</div>
      </div>
      <span class="hidden sm:inline-flex w-8 h-8 rounded-full bg-white border-2 border-[#2D3436] items-center justify-center text-xs">${i < 3 ? '⭐' : '•'}</span>
    </div>`;
  }).join('');
}
async function fetchBoard(){
  const url = challengeId ? `/leaderboard/data?challenge=${challengeId}` : '/leaderboard/data';
  try{
    const r = await fetch(url, {headers:{'Accept':'application/json'}});
    const j = await r.json();
    if(JSON.stringify(j.teams)!==JSON.stringify(lastData)){
      lastData=j.teams;
      render(j.teams);
      const up=document.getElementById('updatedAt');
      if(up) up.textContent = '· Diperbarui ' + new Date(j.updated_at).toLocaleTimeString('id-ID');
      if(j.teams.length) document.getElementById('board').classList.add('animate-pop');
    }
  }catch(e){ console.error(e); }
}
fetchBoard();
setInterval(fetchBoard, 5000);
</script>
@endpush
@endsection
