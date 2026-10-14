@extends('layouts.app')
@section('title','Daftarkan Tim — RoboRace')
@section('content')
<div class="max-w-3xl mx-auto px-4 pt-6">
  <div class="text-center">
    <div class="inline-flex w-14 h-14 rounded-2xl bg-[#F4CF3B] border-[3px] border-[#141324] items-center justify-center text-2xl shadow-[0_4px_0_0_#141324]">🤖</div>
    <h1 class="font-display font-black text-3xl mt-3">Buat <span class="text-[#5E3C9F]">tim</span>-mu!</h1>
    <p class="font-bold opacity-60 text-sm mt-1">Tim 2-4 orang · Usia 7-15 · Cuma 2 menit</p>
  </div>
  <form method="POST" action="{{ route('register') }}" class="mt-6 bg-white rounded-[28px] border-[3px] border-[#141324] bubble-shadow p-6 md:p-7">
    @csrf
    @if($errors->any())<div class="bg-[#5E3C9F] text-white border-2 border-[#141324] rounded-2xl px-4 py-3 font-bold text-sm mb-4">@foreach($errors->all() as $e)<div>⚠️ {{ $e }}</div>@endforeach</div>@endif

    <div class="bg-[#EAE6FE] border-[3px] border-[#141324] rounded-2xl p-4">
      <div class="font-black flex items-center gap-2">👤 Info kamu <span class="text-xs bg-white border-2 border-[#141324] rounded-full px-2 py-0.5">kapten tim</span></div>
      <div class="grid md:grid-cols-2 gap-3 mt-3">
        <div><label class="font-black text-sm">Nama lengkap</label><input name="name" value="{{ old('name') }}" required placeholder="Alex Rivera" class="mt-1 w-full rounded-2xl border-[3px] border-[#141324] px-4 py-2.5 font-bold bg-white outline-none"></div>
        <div><label class="font-black text-sm">Email</label><input type="email" name="email" value="{{ old('email') }}" required placeholder="alex@school.test" class="mt-1 w-full rounded-2xl border-[3px] border-[#141324] px-4 py-2.5 font-bold bg-white outline-none"></div>
        <div><label class="font-black text-sm">Kata sandi</label><input type="password" name="password" required placeholder="••••••••" class="mt-1 w-full rounded-2xl border-[3px] border-[#141324] px-4 py-2.5 font-bold bg-white outline-none"></div>
        <div><label class="font-black text-sm">Konfirmasi kata sandi</label><input type="password" name="password_confirmation" required class="mt-1 w-full rounded-2xl border-[3px] border-[#141324] px-4 py-2.5 font-bold bg-white outline-none"></div>
      </div>
    </div>

    <div class="bg-[#EAE6FE] border-[3px] border-[#141324] rounded-2xl p-4 mt-4">
      <div class="font-black flex items-center gap-2">🏁 Tim & robot</div>
      <div class="grid md:grid-cols-2 gap-3 mt-3">
        <div><label class="font-black text-sm">Nama tim *</label><input name="team_name" value="{{ old('team_name') }}" required placeholder="Turbo Turtles" class="mt-1 w-full rounded-2xl border-[3px] border-[#141324] px-4 py-2.5 font-bold bg-white outline-none"></div>
        <div><label class="font-black text-sm">Sekolah *</label><input name="school" value="{{ old('school') }}" required placeholder="SD Ceria" class="mt-1 w-full rounded-2xl border-[3px] border-[#141324] px-4 py-2.5 font-bold bg-white outline-none"></div>
        <div><label class="font-black text-sm">Kelompok usia *</label><select name="age_group" class="mt-1 w-full rounded-2xl border-[3px] border-[#141324] px-4 py-2.5 font-bold bg-white outline-none"><option value="junior" @selected(old('age_group')==='junior')>Junior 7-9 🧒</option><option value="middle" @selected(old('age_group','middle')==='middle')>Menengah 10-12 👧</option><option value="senior" @selected(old('age_group')==='senior')>Senior 13-15 🧑</option></select></div>
        <div><label class="font-black text-sm">Nama robot</label><input name="robot_name" value="{{ old('robot_name') }}" placeholder="Bolt" class="mt-1 w-full rounded-2xl border-[3px] border-[#141324] px-4 py-2.5 font-bold bg-white outline-none"></div>
        <div class="md:col-span-2"><label class="font-black text-sm">Anggota tim (pisahkan dengan koma)</label><input name="members_input" value="{{ old('members_input') }}" placeholder="Alex, Sam, Maya" class="mt-1 w-full rounded-2xl border-[3px] border-[#141324] px-4 py-2.5 font-bold bg-white outline-none"><div class="text-xs font-bold opacity-50 mt-1">Kapten otomatis termasuk jika dikosongkan</div></div>
        <div><label class="font-black text-sm">No. HP (opsional)</label><input name="contact_phone" value="{{ old('contact_phone') }}" placeholder="+62 ..." class="mt-1 w-full rounded-2xl border-[3px] border-[#141324] px-4 py-2.5 font-bold bg-white outline-none"></div>
        <div class="flex items-end"><label class="flex items-center gap-2 font-bold text-xs bg-white border-2 border-[#141324] rounded-full px-3 py-2"><input type="checkbox" required> Kami setuju — akan seru-seruan & bermain jujur!</label></div>
      </div>
    </div>

    <button class="mt-6 w-full py-3.5 rounded-full bg-[#5E3C9F] text-white font-black border-[3px] border-[#141324] shadow-[0_6px_0_0_#141324] hover:shadow-[0_4px_0_0_#141324] hover:translate-y-[2px] transition text-lg">Buat Tim & Ikut Lomba 🎉</button>
    <div class="text-center text-sm font-bold mt-3">Sudah punya tim? <a href="{{ route('login') }}" class="text-[#5E3C9F] underline">Masuk</a></div>
  </form>
</div>
@endsection
