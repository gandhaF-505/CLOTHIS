@extends('admin.layout')
@section('title', 'Kelola Admin')
@section('heading', 'Kelola Admin')
@section('content')
<div class="baris"><div class="deskripsi">Kelola akun yang memiliki akses ke panel admin.</div><a href="{{ route('admin.admins.create') }}" class="tombol">+ Tambah Admin</a></div>
<div class="panel" style="margin-top:20px;"><div class="tabel-box"><table><thead><tr><th>Nama</th><th>Email</th><th>Role</th><th>Aksi</th></tr></thead><tbody>
@forelse($admins as $admin)
<tr><td><strong>{{ $admin->name }}</strong></td><td>{{ $admin->email }}</td><td><span class="badge badge-hitam">Admin</span></td><td><a href="{{ route('admin.admins.edit', $admin->id) }}" class="link">Edit</a></td></tr>
@empty
<tr><td colspan="4"><div class="kosong"><strong>Belum ada admin</strong>Tambahkan akun admin untuk mengakses panel.</div></td></tr>
@endforelse
</tbody></table></div></div>
@endsection
