@extends('admin.layout')

@section('title', 'Produk')
@section('heading', 'Produk')

@section('content')

<div class="deskripsi">
    Kelola produk yang tersedia di CLOTHIS.
</div>

@if(session('success'))
    <div style="margin-top:20px; padding:12px 16px; background:#e8f7ee; color:#176b3a; border-radius:10px;">
        {{ session('success') }}
    </div>
@endif

<div style="margin-top:20px;">
    <a href="{{ route('admin.products.create') }}" class="tombol">
        + Tambah Produk
    </a>
</div>

<div class="panel" style="margin-top:20px;">
    <div class="tabel-box">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>
                            #{{ $product->id }}
                        </td>

                        <td>
                            <strong>{{ $product->name }}</strong>
                        </td>

                        <td>
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </td>

                        <td>
                            {{ $product->stock }}
                        </td>

                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="link">
                                Edit
                            </a>

                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="link">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <div class="kosong">
                                <strong>Belum ada produk</strong>
                                Produk belum tersedia di database.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
