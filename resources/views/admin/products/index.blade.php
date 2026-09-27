@extends('admin.layout')
@section('title', 'Kelola Produk')
@section('heading', 'Kelola Produk')
@section('content')
<div class="baris">
    <div><div class="deskripsi">Atur katalog produk yang tersedia untuk customer.</div></div>
    <a href="{{ route('admin.products.create') }}" class="tombol">+ Tambah Produk</a>
</div>
<div class="panel" style="margin-top:20px;">
    <div class="filter">
        <input class="input" type="text" placeholder="Cari produk...">
        <select class="input"><option>Semua Status</option><option>Aktif</option><option>Habis</option></select>
    </div>
    <div class="tabel-box">
        <table>
            <thead><tr><th>Produk</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Status</th><th class="kanan">Aksi</th></tr></thead>
            <tbody>
            @forelse($products as $p)
                <tr>
                    <td><strong>{{ $p['name'] }}</strong></td><td>{{ $p['category'] }}</td><td>{{ $p['price'] }}</td><td>{{ $p['stock'] }}</td><td><span class="badge {{ $p['status'] === 'Aktif' ? 'badge-hijau' : 'badge-merah' }}">{{ $p['status'] }}</span></td>
                    <td class="kanan"><a class="link" href="{{ route('admin.products.edit', $p['id']) }}">Edit</a></td>
                </tr>
            @empty
                <tr><td colspan="6"><div class="kosong"><strong>Belum ada produk</strong>Hubungkan halaman ini ke data produk setelah tabel produk backend tersedia.</div></td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
