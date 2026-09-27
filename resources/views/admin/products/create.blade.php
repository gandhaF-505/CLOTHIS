@extends('admin.layout')

@section('title', 'Tambah Produk')
@section('heading', 'Tambah Produk')

@section('content')

<div class="deskripsi">
    Tambahkan produk baru ke CLOTHIS.
</div>

@if($errors->any())
    <div style="margin-top:20px; padding:12px 16px; background:#fdecec; color:#9b1c1c; border-radius:10px;">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<div class="panel" style="margin-top:20px; padding:25px;">

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="margin-bottom:18px;">
            <label>Nama Produk</label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                style="width:100%; padding:12px; margin-top:6px;"
            >
        </div>

        <div style="margin-bottom:18px;">
            <label>Harga</label>

            <input
                type="number"
                name="price"
                value="{{ old('price') }}"
                min="0"
                required
                style="width:100%; padding:12px; margin-top:6px;"
            >
        </div>

        <div style="margin-bottom:18px;">
            <label>Stok</label>

            <input
                type="number"
                name="stock"
                value="{{ old('stock', 0) }}"
                min="0"
                required
                style="width:100%; padding:12px; margin-top:6px;"
            >
        </div>

        <div style="margin-bottom:18px;">
            <label>Deskripsi</label>

            <textarea
                name="description"
                rows="5"
                required
                style="width:100%; padding:12px; margin-top:6px;"
            >{{ old('description') }}</textarea>
        </div>

        <div style="margin-bottom:18px;">
            <label>Gambar Produk</label>

            <input
                type="file"
                name="image"
                accept=".jpg,.jpeg,.png"
                style="width:100%; margin-top:6px;"
            >
        </div>

        <button type="submit" class="tombol">
            Simpan Produk
        </button>

        <a href="{{ route('admin.products.index') }}" class="link" style="margin-left:15px;">
            Batal
        </a>

    </form>

</div>

@endsection
