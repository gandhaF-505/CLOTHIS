@extends('layouts.app')

@section('title', 'Katalog Produk - CLOTHIS')

@section('content')

<style>
    .produk-page {
        background: #f8f8f6;
        padding: 70px 0 100px;
        min-height: 80vh;
    }

    .atas {
        display: flex;
        align-items: end;
        justify-content: space-between;
        margin-bottom: 45px;
    }

    .judul small {
        color: #777;
        letter-spacing: 3px;
        font-size: 11px;
    }

    .judul h1 {
        font-size: 56px;
        font-weight: 700;
        margin: 8px 0 12px;
    }

    .judul p {
        color: #777;
        margin: 0;
    }

    .jumlah {
        color: #777;
        font-size: 14px;
    }

    .kartu {
        background: white;
        height: 100%;
        border: 1px solid #e7e7e7;
        transition: 0.3s;
    }

    .kartu:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
    }

    .gambar {
        height: 400px;
        position: relative;
        background: #eee;
        overflow: hidden;
    }

    .gambar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.4s;
    }

    .kartu:hover .gambar img {
        transform: scale(1.04);
    }

    .label {
        position: absolute;
        top: 15px;
        left: 15px;
        background: white;
        padding: 8px 12px;
        font-size: 10px;
        font-weight: 600;
        letter-spacing: 2px;
    }

    .isi {
        padding: 25px;
    }

    .isi small {
        color: #999;
        font-size: 10px;
        letter-spacing: 2px;
    }

    .isi h2 {
        font-size: 22px;
        margin: 8px 0 12px;
    }

    .isi p {
        color: #777;
        font-size: 14px;
        line-height: 1.7;
        min-height: 48px;
        margin-bottom: 20px;
    }

    .bawah {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-top: 1px solid #eee;
        padding-top: 18px;
    }

    .harga {
        font-weight: 600;
    }

    .custom {
        color: #111;
        text-decoration: none;
        font-weight: 600;
    }

    .custom:hover {
        text-decoration: underline;
    }

    .kosong {
        background: white;
        padding: 60px 20px;
        text-align: center;
        color: #777;
    }

    .halaman {
        margin-top: 50px;
    }

</style>

<section class="produk-page">

    <div class="container">

        <div class="atas">

            <div class="judul">
                <small>CLOTHIS COLLECTION</small>

                <h1>Katalog Produk.</h1>

                <p>
                    Pilih produk yang ingin kamu custom sesuai kebutuhanmu.
                </p>
            </div>

            <div class="jumlah">
                {{ $products->total() }} produk tersedia
            </div>

        </div>

        @if ($products->count())

            <div class="row g-4">

                @foreach ($products as $product)

                    <div class="col-lg-4 col-md-6">

                        <div class="kartu">

                            <div class="gambar">

                                <img
                                    src="{{ asset('images/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                >

                                <span class="label">
                                    CUSTOM
                                </span>

                            </div>

                            <div class="isi">

                                <small>PRODUCT</small>

                                <h2>
                                    {{ $product->name }}
                                </h2>

                                <p>
                                    {{ $product->description }}
                                </p>

                                <div class="bawah">

                                    <span class="harga">
                                        Rp.
                                        {{ number_format($product->price, 0, ',', '.') }}
                                    </span>

                                    <a
                                        href="{{ route('products.show', $product) }}"
                                        class="custom"
                                    >
                                        Custom →
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            @if ($products->hasPages())
                <div class="halaman">
                    {{ $products->links() }}
                </div>
            @endif

        @else

            <div class="kosong">
                Belum ada produk tersedia.
            </div>

        @endif

    </div>

</section>

@endsection
