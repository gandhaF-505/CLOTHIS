@extends('layouts.app')

@section('title', 'CLOTHIS - Custom Printing')

@section('content')

<style>
    .home {
        background: #f8f8f6;
        color: #111;
    }

    .hero {
        min-height: 680px;
        display: flex;
        align-items: center;
        padding: 80px 0;
    }

    .hero h1 {
        font-size: 76px;
        line-height: 0.95;
        font-weight: 800;
        letter-spacing: -3px;
        margin: 15px 0 25px;
    }

    .hero p {
        max-width: 520px;
        color: #666;
        font-size: 17px;
        line-height: 1.7;
    }

    .label {
        font-size: 12px;
        letter-spacing: 3px;
        font-weight: 600;
        color: #777;
    }

    .hero-tombol {
        margin-top: 30px;
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .tombol-hitam {
        background: #111;
        color: white;
        padding: 14px 25px;
        border-radius: 4px;
        text-decoration: none;
        display: inline-block;
    }

    .tombol-hitam:hover {
        background: #333;
        color: white;
    }

    .tombol-putih {
        border: 1px solid #111;
        color: #111;
        padding: 14px 25px;
        border-radius: 4px;
        text-decoration: none;
        display: inline-block;
    }

    .tombol-putih:hover {
        background: #111;
        color: white;
    }

    .hero-gambar {
        position: relative;
    }

    .hero-gambar img {
        width: 100%;
        height: 520px;
        object-fit: cover;
        border-radius: 4px;
    }

    .angka {
        position: absolute;
        bottom: 20px;
        left: 20px;
        background: white;
        padding: 18px 22px;
    }

    .angka strong {
        display: block;
        font-size: 25px;
    }

    .angka span {
        font-size: 12px;
        color: #777;
    }

    .bagian {
        padding: 100px 0;
    }

    .judul {
        margin-bottom: 45px;
    }

    .judul h2 {
        font-size: 48px;
        font-weight: 700;
        margin-top: 10px;
    }

    .tentang-text {
        color: #666;
        line-height: 1.8;
        font-size: 16px;
    }

    .info {
        border-top: 1px solid #ddd;
        padding-top: 20px;
        margin-top: 30px;
    }

    .info strong {
        font-size: 28px;
    }

    .info span {
        color: #777;
        display: block;
        margin-top: 5px;
    }

    .produk-card {
        background: white;
        height: 100%;
        border-radius: 6px;
        overflow: hidden;
    }

    .produk-card img {
        width: 100%;
        height: 330px;
        object-fit: cover;
    }

    .produk-isi {
        padding: 22px;
    }

    .produk-isi small {
        color: #888;
    }

    .produk-isi h3 {
        font-size: 20px;
        margin: 8px 0;
    }

    .produk-isi p {
        color: #777;
        font-size: 14px;
        line-height: 1.6;
    }

    .harga {
        font-weight: 600;
        margin-top: 15px;
    }

    .lihat {
        display: inline-block;
        margin-top: 18px;
        color: #111;
        font-weight: 600;
        text-decoration: none;
    }

    .langkah {
        border-top: 1px solid #ddd;
        padding: 25px 0;
    }

    .langkah-nomor {
        font-size: 13px;
        color: #888;
    }

    .langkah h3 {
        margin: 5px 0;
        font-size: 22px;
    }

    .langkah p {
        margin: 0;
        color: #777;
        line-height: 1.6;
    }

    .kontak {
        background: #111;
        color: white;
        padding: 90px 0;
    }

    .kontak h2 {
        font-size: 50px;
        font-weight: 700;
        margin: 10px 0 20px;
    }

    .kontak p {
        color: #bbb;
        max-width: 550px;
        line-height: 1.7;
    }

    .kontak a {
        color: white;
        text-decoration: none;
    }

    .kontak a:hover {
        text-decoration: underline;
    }

</style>

<div class="home">

    <section class="hero">
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-lg-6">
                    <span class="label">CUSTOM PRINTING STUDIO</span>

                    <h1>
                        MAKE IT<br>
                        YOURS.
                    </h1>

                    <p>
                        CLOTHIS membantu kamu membuat pakaian custom
                        sesuai dengan desain dan gaya yang kamu inginkan.
                    </p>

                    <div class="hero-tombol">
                        <a href="{{ route('products.index') }}" class="tombol-hitam">
                            Lihat Produk →
                        </a>

                        <a href="#about" class="tombol-putih">
                            Tentang CLOTHIS
                        </a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-gambar">
                        <img
                            src="{{ asset('images/orgsablon.png') }}"
                            alt="Custom Printing CLOTHIS"
                        >

                        <div class="angka">
                            <strong>100%</strong>
                            <span>Custom sesuai keinginan</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="bagian" id="about">
        <div class="container">

            <div class="row g-5 align-items-start">

                <div class="col-lg-5">
                    <div class="judul">
                        <span class="label">ABOUT US</span>
                        <h2>Bikin pakaian yang punya cerita.</h2>
                    </div>
                </div>

                <div class="col-lg-7">
                    <p class="tentang-text">
                        CLOTHIS merupakan tempat untuk membuat produk
                        pakaian custom dengan desain yang bisa disesuaikan
                        dengan kebutuhan. Pilih produk, tentukan detailnya,
                        lalu kirim desain yang ingin digunakan.
                    </p>

                    <div class="row g-4">
                        <div class="col-6">
                            <div class="info">
                                <strong>01</strong>
                                <span>Pilih produk</span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="info">
                                <strong>02</strong>
                                <span>Custom desain</span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="info">
                                <strong>03</strong>
                                <span>Kirim pesanan</span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="info">
                                <strong>04</strong>
                                <span>Konfirmasi pesanan</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="bagian">
        <div class="container">

            <div class="judul">
                <span class="label">OUR PRODUCTS</span>
                <h2>Pilih produkmu.</h2>
            </div>

            <div class="row g-4">

                @foreach ($products as $product)
                    <div class="col-md-4">

                        <div class="produk-card">

                            <img
                                src="{{ asset('images/' . $product->image) }}"
                                alt="{{ $product->name }}"
                            >

                            <div class="produk-isi">

                                <small>CUSTOM PRODUCT</small>

                                <h3>{{ $product->name }}</h3>

                                <p>
                                    {{ $product->description }}
                                </p>

                                <div class="harga">
                                    Rp. {{ number_format($product->price, 0, ',', '.') }}
                                </div>

                                <a
                                    href="{{ route('products.show', $product) }}"
                                    class="lihat"
                                >
                                    Custom Sekarang →
                                </a>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

            <div class="text-center mt-5">
                <a href="{{ route('products.index') }}" class="tombol-hitam">
                    Lihat Semua Produk
                </a>
            </div>

        </div>
    </section>

    <section class="bagian">
        <div class="container">

            <div class="judul">
                <span class="label">HOW IT WORKS</span>
                <h2>Pesan dengan mudah.</h2>
            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="langkah">
                        <span class="langkah-nomor">01</span>
                        <h3>Pilih</h3>
                        <p>
                            Pilih produk yang ingin kamu custom.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="langkah">
                        <span class="langkah-nomor">02</span>
                        <h3>Custom</h3>
                        <p>
                            Tentukan warna, ukuran, model, dan jumlah.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="langkah">
                        <span class="langkah-nomor">03</span>
                        <h3>Kirim</h3>
                        <p>
                            Upload desain dan tambahkan catatan jika diperlukan.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="langkah">
                        <span class="langkah-nomor">04</span>
                        <h3>Konfirmasi</h3>
                        <p>
                            Pesanan akan menunggu konfirmasi sebelum diproses.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="kontak" id="contact">
        <div class="container">

            <span class="label">CONTACT</span>

            <h2>Punya desain<br>sendiri?</h2>

            <p>
                Mulai buat produk custom kamu sekarang.
                Pilih produk yang tersedia dan kirim desain
                yang ingin digunakan.
            </p>

            <div class="mt-4">
                <a href="{{ route('products.index') }}">
                    Mulai Custom →
                </a>
            </div>

        </div>
    </section>

</div>

@endsection
