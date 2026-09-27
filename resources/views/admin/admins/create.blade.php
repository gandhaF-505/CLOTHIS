@extends('admin.layout')
@section('title','Tambah Admin')
@section('heading','Tambah Admin')
@section('content')
<div class="max-w-2xl rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8"><h2 class="text-xl font-bold">Buat Akun Admin</h2><p class="mt-1 text-sm text-slate-500">Siapkan form akun admin untuk dihubungkan ke CRUD User.</p><form action="{{ route('admin.admins.action') }}" method="POST" class="mt-6 space-y-5">@csrf<div><label class="label">Nama</label><input class="input" placeholder="Nama admin"></div><div><label class="label">Email</label><input type="email" class="input" placeholder="admin@clothis.test"></div><div><label class="label">Password</label><input type="password" class="input" placeholder="Minimal 8 karakter"></div><div><label class="label">Role</label><select class="input"><option>Admin</option><option>Super Admin</option></select></div><div class="flex justify-end gap-3"><a href="{{ route('admin.admins.index') }}" class="rounded-xl border border-slate-200 px-5 py-3 text-sm font-semibold">Batal</a><button class="rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white">Simpan Admin</button></div></form></div>
@endsection
