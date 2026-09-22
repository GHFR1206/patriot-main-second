<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title','RoboRace — Balapan Line Follower Seru untuk Anak!')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700;800&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
@vite(['resources/css/app.css','resources/js/app.js'])
<style>[x-cloak]{display:none!important}</style>
</head>
<body class="bg-[#FFF8F0] text-[#2D3436] antialiased overflow-x-hidden">
<div class="fixed inset-0 pointer-events-none -z-10 overflow-hidden" aria-hidden="true">
  <div class="absolute -top-32 -left-32 w-[420px] h-[420px] rounded-[45%] bg-[#FFE66D] opacity-30 blur-[1px] rotate-12"></div>
  <div class="absolute top-20 -right-24 w-[360px] h-[360px] rounded-[40%] bg-[#FF6B9D] opacity-20 rotate-12"></div>
  <div class="absolute bottom-0 left-1/3 w-[520px] h-[320px] rounded-[50%] bg-[#4ECDC4] opacity-15 -rotate-6"></div>
</div>

<nav class="sticky top-3 z-50 mx-auto max-w-6xl px-4">
  <div class="flex items-center justify-between gap-3 bg-white rounded-[24px] bubble-shadow-sm px-3 py-2 md:px-6 md:py-3 border-[3px] border-[#2D3436]">
    <a href="{{ route('home') }}" class="flex items-center gap-2 md:gap-3 shrink-0">
      <span class="w-10 h-10 md:w-11 md:h-11 rounded-2xl bg-[#FF6B6B] border-[3px] border-[#2D3436] flex items-center justify-center text-xl md:text-2xl shadow-[0_4px_0_0_#2D3436]">🤖</span>
      <span class="font-display font-black text-xl md:text-[22px] leading-none tracking-tight">Robo<span class="text-[#FF6B6B]">Race</span><span class="hidden md:inline text-xs font-extrabold bg-[#FFE66D] border-2 border-[#2D3436] rounded-full px-2 py-0.5 ml-1 align-middle">ANAK</span></span>
    </a>
    <div class="hidden md:flex items-center gap-1.5 font-extrabold text-sm">
      <a href="{{ route('challenges.index') }}" class="px-4 py-2 rounded-full hover:bg-[#FFF0C8] border-2 border-transparent hover:border-[#2D3436] transition {{ request()->routeIs('challenges.*')?'bg-[#FFE66D] border-[#2D3436]':'' }}">Tantangan</a>
      <a href="{{ route('leaderboard') }}" class="px-4 py-2 rounded-full hover:bg-[#E0F7F3] border-2 border-transparent hover:border-[#2D3436] transition flex items-center gap-1 {{ request()->routeIs('leaderboard')?'bg-[#4ECDC4] text-white border-[#2D3436]':'' }}"><span class="text-base">🏆</span> Papan Skor</a>
      @auth
        <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-full bg-[#A78BFA] text-white border-2 border-[#2D3436] shadow-[0_3px_0_0_#2D3436]">Dasbor</a>
      @endauth
    </div>
    <div class="flex items-center gap-1.5 md:gap-2">
      <button id="mobileMenuBtn" class="md:hidden w-10 h-10 rounded-full bg-[#FFF0C8] border-2 border-[#2D3436] flex items-center justify-center text-lg">☰</button>
      @guest
        <a href="{{ route('login') }}" class="hidden sm:inline-flex px-4 md:px-5 py-2.5 rounded-full font-black text-sm border-[3px] border-[#2D3436] bg-white hover:bg-[#FFF8F0] transition">Masuk</a>
        <a href="{{ route('register') }}" class="inline-flex px-4 md:px-5 py-2.5 rounded-full font-black text-sm bg-[#FF6B6B] text-white border-[3px] border-[#2D3436] shadow-[0_4px_0_0_#2D3436] hover:shadow-[0_3px_0_0_#2D3436] hover:translate-y-[1px] transition">Ikut Lomba 🚀</a>
      @else
        <form method="POST" action="{{ route('logout') }}" class="hidden sm:block">@csrf<button class="px-4 py-2.5 rounded-full font-black text-sm bg-white border-[3px] border-[#2D3436]">Keluar</button></form>
      @endguest
    </div>
  </div>
  <div id="mobileMenu" class="hidden md:hidden mt-2 bg-white rounded-[20px] border-[3px] border-[#2D3436] p-3 bubble-shadow-sm font-extrabold">
    <a href="{{ route('challenges.index') }}" class="block px-4 py-3 rounded-xl hover:bg-[#FFF0C8]">Tantangan</a>
    <a href="{{ route('leaderboard') }}" class="block px-4 py-3 rounded-xl hover:bg-[#E0F7F3]">🏆 Papan Skor</a>
    @auth<a href="{{ route('dashboard') }}" class="block px-4 py-3 rounded-xl bg-[#A78BFA] text-white mt-1">Dasbor</a>
    <form method="POST" action="{{ route('logout') }}">@csrf<button class="w-full text-left px-4 py-3">Keluar</button></form>
    @else
    <a href="{{ route('login') }}" class="block px-4 py-3">Masuk</a>
    <a href="{{ route('register') }}" class="block px-4 py-3 rounded-xl bg-[#FF6B6B] text-white text-center mt-1">Ikut Lomba 🚀</a>
    @endauth
  </div>
</nav>

@if(session('success'))<div class="max-w-6xl mx-auto px-4 mt-4"><div class="bg-[#95E1D3] border-[3px] border-[#2D3436] rounded-2xl px-5 py-3 font-bold flex items-center gap-2 animate-pop">✅ {{ session('success') }}</div></div>@endif
@if(session('error'))<div class="max-w-6xl mx-auto px-4 mt-4"><div class="bg-[#FF6B6B] text-white border-[3px] border-[#2D3436] rounded-2xl px-5 py-3 font-bold animate-pop">⚠️ {{ session('error') }}</div></div>@endif

<main>@yield('content')</main>

<footer class="mt-16 bg-[#2D3436] text-[#FFF8F0] rounded-t-[32px] overflow-hidden">
  <div class="max-w-6xl mx-auto px-6 py-10 grid md:grid-cols-3 gap-8">
    <div>
      <div class="flex items-center gap-2 font-black text-xl"><span class="w-9 h-9 rounded-xl bg-[#FF6B6B] flex items-center justify-center">🤖</span> RoboRace</div>
      <p class="mt-3 text-sm opacity-80 leading-relaxed">Kompetisi line follower untuk kreator muda. Rakit, kode, balapan! Tiga lintasan seru, satu tim juara.</p>
      <div class="flex gap-2 mt-4 text-xl"><span class="w-9 h-9 rounded-full bg-[#FFE66D] flex items-center justify-center border-2 border-white">🏁</span><span class="w-9 h-9 rounded-full bg-[#4ECDC4] flex items-center justify-center border-2 border-white">⚡</span><span class="w-9 h-9 rounded-full bg-[#FF6B9D] flex items-center justify-center border-2 border-white">🎮</span></div>
    </div>
    <div>
      <div class="font-black">Jelajahi</div>
      <div class="mt-3 flex flex-col gap-2 text-sm opacity-90">
        <a href="{{ route('challenges.index') }}" class="hover:underline">Tantangan & Rintangan</a>
        <a href="{{ route('leaderboard') }}" class="hover:underline">Papan Skor Langsung</a>
        <a href="{{ route('register') }}" class="hover:underline">Daftarkan Tim</a>
        <a href="/admin" class="hover:underline">Panel Admin / Juri →</a>
      </div>
    </div>
    <div>
      <div class="font-black">Tetap terhubung</div>
      <p class="text-sm opacity-70 mt-2">Jadwal lomba selanjutnya — tanya guru untuk tanggalnya! Beep boop!</p>
      <div class="mt-4 inline-flex items-center gap-2 bg-white text-[#2D3436] rounded-full px-4 py-2 font-black text-sm border-[3px] border-white/20">Dibuat dengan 💛 untuk anak-anak</div>
    </div>
  </div>
  <div class="text-center text-xs opacity-50 pb-6">© {{ date('Y') }} RoboRace · Bermain aman, berani berkode!</div>
</footer>
<script>document.getElementById('mobileMenuBtn')?.addEventListener('click',()=>document.getElementById('mobileMenu').classList.toggle('hidden'))</script>
@stack('scripts')
</body>
</html>
