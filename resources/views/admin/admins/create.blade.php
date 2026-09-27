@extends('admin.layout')
@section('title', 'Tambah Admin')
@section('heading', 'Tambah Admin')
@section('content')
<div class="panel" style="max-width:700px;"><h2>Data Akun Admin</h2><p class="deskripsi" style="margin-bottom:22px;">Form tampilan siap dihubungkan ke proses penyimpanan akun admin.</p><form action="{{ route('admin.admins.action') }}" method="POST" class="form-grid">@csrf
<div class="field field-full"><label>Nama</label><input class="input" name="name" placeholder="Nama admin"></div>
<div class="field field-full"><label>Email</label><input class="input" type="email" name="email" placeholder="admin@clothis.test"></div>
<div class="field"><label>Password</label><input class="input" type="password" name="password" placeholder="Password"></div>
<div class="field"><label>Role</label><select class="input" name="role"><option value="admin">Admin</option></select></div>
<div class="field-full" style="display:flex;justify-content:flex-end;gap:8px;"><a href="{{ route('admin.admins.index') }}" class="tombol tombol-putih">Batal</a><button class="tombol">Simpan Admin</button></div>
</form></div>
@endsection
