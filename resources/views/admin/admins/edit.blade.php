@extends('admin.layout')
@section('title', 'Edit Admin')
@section('heading', 'Edit Admin')
@section('content')
<div class="panel" style="max-width:700px;"><h2>Edit Akun Admin</h2><p class="deskripsi" style="margin-bottom:22px;">Admin #{{ $adminId }}</p><form action="{{ route('admin.admins.action') }}" method="POST" class="form-grid">@csrf
<div class="field field-full"><label>Nama</label><input class="input" name="name"></div>
<div class="field field-full"><label>Email</label><input class="input" type="email" name="email"></div>
<div class="field"><label>Password Baru</label><input class="input" type="password" name="password" placeholder="Kosongkan jika tidak diubah"></div>
<div class="field"><label>Role</label><select class="input" name="role"><option value="admin">Admin</option></select></div>
<div class="field-full" style="display:flex;justify-content:flex-end;gap:8px;"><a href="{{ route('admin.admins.index') }}" class="tombol tombol-putih">Batal</a><button class="tombol">Simpan Perubahan</button></div>
</form></div>
@endsection
