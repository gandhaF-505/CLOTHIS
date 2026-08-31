@extends('layouts.app')

@section('title', 'Clothis')

@section('content')

<section class="hero">
    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <span class="badge bg-light text-dark border fw-normal">
                    NEW ERA-BASED IDEAS
                </span>

                <h1 class="mt-3">
                    Digital Craftsmanship<br>
                    in Ink.
                </h1>

                <p class="hero-text">
                    Premium custom screen printing for brands, artists,
                    and teams. We bridge the gap between raw workshop
                    energy and high-end digital precision.
                </p>

                <div class="mt-4">
                    <a href="#" class="btn btn-dark btn-sm me-2">
                        Create Your Design
                    </a>

                    <a href="#products" class="btn btn-outline-dark btn-sm">
                        Explore Catalog
                    </a>
                </div>

            </div>

            <div class="col-lg-6 mt-4 mt-lg-0">

                <div class="hero-photo">
                    <img
                        src="{{ asset('images/sablon.png') }}"
                        alt="Clothis"
                    >

                    <span>
                        PRECISION REGISTRATION
                    </span>
                </div>

            </div>

        </div>

    </div>
</section>


<section class="canvases" id="products">

    <div class="container">

        <h2>Core Canvases</h2>

        <p>
            Premium blanks ready for your ink.
        </p>

        <div class="product-photo">
            <img
                src="{{ asset('images/image.png') }}"
                alt="Clothis Products"
            >
        </div>

    </div>

</section>


<section class="process">

    <div class="container">

        <h2 class="text-center">
            The Process
        </h2>

        <div class="row g-3 mt-3">

            <div class="col-md-4">

                <div class="process-box">

                    <div class="number blue">
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


            <div class="col-md-4">

                <div class="process-box">

                    <div class="number blue">
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

                    <div class="progress-line">
                        <span></span>
                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="process-box orange">

                    <div class="number">
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
