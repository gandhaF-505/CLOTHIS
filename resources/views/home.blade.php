@extends('layouts.app')

@section('title', 'Clothis')

@section('content')


<!-- =========================
     HERO
========================= -->

<section class="hero">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <span class="hero-label">
                    NEW ERA-BASED IDEAS
                </span>


                <h1 class="hero-title">

                    Digital Craftsmanship
                    <br>

                    in Ink.

                </h1>


                <p class="hero-description">

                    Premium custom screen printing for brands,
                    artists, and teams. We bridge the gap between
                    raw workshop energy and high-end digital precision.

                </p>


                <div class="hero-buttons">

                    <a
                        href="#"
                        class="btn btn-dark"
                    >
                        Create Your Design
                    </a>


                    <a
                        href="#products"
                        class="btn btn-outline-dark"
                    >
                        Explore Catalog
                    </a>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="hero-image">

                    <img
                        src="{{ asset('images/sablon.png') }}"
                        alt="Proses Sablon Clothis"
                    >


                    <span>
                        PRECISION REGISTRATION
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =========================
     PRODUCTS
========================= -->

<section
    class="products"
    id="products"
>

    <div class="container">

        <h2>
            Core Canvases
        </h2>


        <p class="products-subtitle">
            Premium blanks ready for your ink.
        </p>


        <div class="row g-3">


            <!-- SABLON 1 -->

            <div class="col-md-4">

                <div class="product-card">

                    <div class="product-image">

                        <img
                            src="{{ asset('images/image.png') }}"
                            alt="Heavyweight Cotton Tee"
                        >

                    </div>


                    <div class="product-info">

                        <h3>
                            Heavyweight Cotton Tee
                        </h3>

                        <small>
                            100% COTTON &nbsp;&nbsp; 5.5 OZ
                        </small>

                    </div>

                </div>

            </div>



            <!-- SABLON 2 -->

            <div class="col-md-4">

                <div class="product-card">

                    <div class="product-image">

                        <img
                            src="{{ asset('images/image2.png') }}"
                            alt="Custom T-Shirt"
                        >


                        <span class="product-stock">
                            IN STOCK
                        </span>

                    </div>


                    <div class="product-info">

                        <h3>
                            Custom T-Shirt
                        </h3>

                        <small>
                            PREMIUM PRINT
                        </small>

                    </div>

                </div>

            </div>



            <!-- SABLON 3 -->

            <div class="col-md-4">

                <div class="product-card">

                    <div class="product-image">

                        <img
                            src="{{ asset('images/image3.png') }}"
                            alt="Custom T-Shirt"
                        >


                        <span class="product-stock">
                            IN STOCK
                        </span>

                    </div>


                    <div class="product-info">

                        <h3>
                            Custom T-Shirt
                        </h3>

                        <small>
                            PREMIUM PRINT
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =========================
     PROCESS
========================= -->

<section
    class="process"
    id="process"
>

    <div class="container">

        <h2 class="process-title">
            The Process
        </h2>


        <div class="row g-3">


            <!-- 01 -->

            <div class="col-md-4">

                <div class="process-card">

                    <div class="process-number blue">
                        01
                    </div>


                    <h3>
                        Upload Desain
                    </h3>


                    <p>
                        Upload desain dengan format gambar
                        dan maksimal ukuran gambar 5mb.
                    </p>


                    <small>
                        design_v2_final.ai
                    </small>

                </div>

            </div>



            <!-- 02 -->

            <div class="col-md-4">

                <div class="process-card">

                    <div class="process-number blue">
                        02
                    </div>


                    <h3>
                        Konfirmasi Desain
                    </h3>


                    <p>
                        Setelah mengirim desain admin akan
                        mengkonfirmasi jika ada perubahan
                        sebelum kami cetak.
                    </p>


                    <div class="process-line">

                        <span></span>

                    </div>

                </div>

            </div>



            <!-- 03 -->

            <div class="col-md-4">

                <div class="process-card orange">

                    <div class="process-number">
                        03
                    </div>


                    <h3>
                        Press & Print
                    </h3>


                    <p>
                        Jika sudah di konfirmasi, produk akan
                        segera di buat.
                    </p>


                    <small class="production">
                        IN PRODUCTION
                    </small>

                </div>

            </div>

        </div>

    </div>

</section>


@endsection
