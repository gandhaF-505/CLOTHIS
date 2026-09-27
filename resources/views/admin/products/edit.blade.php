@extends('admin.layout')
@section('title', 'Edit Produk')
@section('heading', 'Edit Produk')
@section('content')
<div class="panel" style="max-width:850px;">
    <div class="baris" style="margin-bottom:22px;"><div><h2>Edit Informasi Produk</h2><p class="deskripsi">Produk #{{ $productId }}</p></div></div>
    <form action="{{ route('admin.products.action') }}" method="POST" class="form-grid">
        @csrf
        <div class="field field-full"><label>Nama Produk</label><input class="input" name="name" value=""></div>
        <div class="field"><label>Kategori</label><input class="input" name="category" value=""></div>
        <div class="field"><label>Harga</label><input class="input" type="number" name="price" value=""></div>
        <div class="field"><label>Stok</label><input class="input" type="number" name="stock" min="0" value=""></div>
        <div class="field"><label>Status</label><select class="input" name="status"><option>Aktif</option><option>Habis</option></select></div>
        <div class="field field-full"><label>Deskripsi</label><textarea class="input" name="description" rows="5"></textarea></div>
        <div class="field-full" style="display:flex;justify-content:flex-end;gap:8px;"><a href="{{ route('admin.products.index') }}" class="tombol tombol-putih">Batal</a><button class="tombol" type="submit">Simpan Perubahan</button></div>
    </form>
</div>
@endsection
