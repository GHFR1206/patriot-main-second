@extends('layouts.app')
@section('title','Masuk — RoboRace')
@section('content')
<div class="max-w-6xl mx-auto px-4 pt-8 flex justify-center">
  <div class="w-full max-w-[440px]">
    <div class="text-center">
      <div class="inline-flex w-14 h-14 rounded-2xl bg-[#4ECDC4] border-[3px] border-[#2D3436] items-center justify-center text-2xl shadow-[0_4px_0_0_#2D3436]">🔑</div>
      <h1 class="font-display font-black text-3xl mt-3">Selamat datang, pembalap!</h1>
      <p class="font-bold opacity-60 text-sm mt-1">Masuk untuk melihat tim & skormu</p>
    </div>
    <form method="POST" action="{{ route('login') }}" class="mt-6 bg-white rounded-[28px] border-[3px] border-[#2D3436] bubble-shadow p-6 space-y-4">
      @csrf
      @if($errors->any())<div class="bg-[#FF6B6B] text-white border-2 border-[#2D3436] rounded-2xl px-4 py-3 font-bold text-sm">@foreach($errors->all() as $e)<div>⚠️ {{ $e }}</div>@endforeach</div>@endif
      <div>
        <label class="font-black text-sm flex items-center gap-1">📧 Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 w-full rounded-2xl border-[3px] border-[#2D3436] px-4 py-3 font-bold bg-[#FFF8F0] focus:bg-white outline-none">
      </div>
      <div>
        <label class="font-black text-sm flex items-center gap-1">🔒 Kata Sandi</label>
        <input type="password" name="password" required class="mt-1 w-full rounded-2xl border-[3px] border-[#2D3436] px-4 py-3 font-bold bg-[#FFF8F0] focus:bg-white outline-none">
      </div>
      <label class="flex items-center gap-2 font-bold text-sm"><input type="checkbox" name="remember" value="1" class="w-4 h-4"> Ingat saya</label>
      <button class="w-full py-3.5 rounded-full bg-[#FF6B6B] text-white font-black border-[3px] border-[#2D3436] shadow-[0_4px_0_0_#2D3436] hover:shadow-[0_3px_0_0_#2D3436] hover:translate-y-[1px] transition">Ayo balapan! 🚀</button>
      <div class="text-center text-sm font-bold">Belum punya tim? <a href="{{ route('register') }}" class="text-[#FF6B6B] underline">Daftar di sini</a> · <a href="/admin" class="underline">Juri/Admin →</a></div>
    </form>
  </div>
</div>
@endsection
