@extends('admin.layout')
@section('title', 'Tambah Produk')
@section('heading', 'Tambah Produk')
@section('content')
<div class="panel" style="max-width:850px;">
    <h2>Informasi Produk</h2>
    <p class="deskripsi" style="margin-bottom:22px;">Isi data produk yang akan ditampilkan pada katalog.</p>
    <form action="{{ route('admin.products.action') }}" method="POST" class="form-grid">
        @csrf
        <div class="field field-full"><label>Nama Produk</label><input class="input" name="name" placeholder="Contoh: Kaos Cotton Combed 24s"></div>
        <div class="field"><label>Kategori</label><input class="input" name="category" placeholder="Kaos / Jersey / Hoodie"></div>
        <div class="field"><label>Harga</label><input class="input" type="number" name="price" placeholder="85000"></div>
        <div class="field"><label>Stok</label><input class="input" type="number" name="stock" min="0" placeholder="0"></div>
        <div class="field"><label>Status</label><select class="input" name="status"><option>Aktif</option><option>Habis</option></select></div>
        <div class="field field-full"><label>Deskripsi</label><textarea class="input" name="description" rows="5" placeholder="Deskripsi produk..."></textarea></div>
        <div class="field-full" style="display:flex;justify-content:flex-end;gap:8px;"><a href="{{ route('admin.products.index') }}" class="tombol tombol-putih">Batal</a><button class="tombol" type="submit">Simpan Produk</button></div>
    </form>
</div>
@endsection
