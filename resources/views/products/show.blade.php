@extends('layouts.app')

@section('title', 'Custom Product')

@section('content')

<div class="custom-page">

    <div class="container">

        <div class="custom-header">
            <a href="{{ route('products.index') }}">
                 Kembali ke Products
            </a>
        </div>

        <div class="row g-4">

            <!-- GAMBAR PRODUK -->
            <div class="col-lg-6">

                <div class="custom-image">
                    <span>CUSTOM</span>

                    <img
                        src="{{ asset('images/' . $product['image']) }}"
                        alt="{{ $product['name'] }}"
                    >
                </div>

            </div>


            <!-- FORM CUSTOM -->
            <div class="col-lg-6">

                <div class="custom-form">

                    <small>CUSTOM PRODUCT</small>

                    <h1>{{ $product['name'] }}</h1>

                    <h3>
                        Rp. {{ $product['price'] }}
                    </h3>

                    <p>
                        {{ $product['description'] }}
                    </p>


                    <form action="#" method="POST" enctype="multipart/form-data">

                        @csrf

                        <!-- WARNA -->
                        <div class="form-group">

                            <label>Pilih Warna</label>

                            <div class="option-list">

                                <label>
                                    <input type="radio" name="warna" value="Putih" checked>
                                    Putih
                                </label>

                                <label>
                                    <input type="radio" name="warna" value="Hitam">
                                    Hitam
                                </label>

                                <label>
                                    <input type="radio" name="warna" value="Navy">
                                    Navy
                                </label>

                                <label>
                                    <input type="radio" name="warna" value="Cream">
                                    Cream
                                </label>

                            </div>

                        </div>
