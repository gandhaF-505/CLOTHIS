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
                        
                           <!-- UKURAN -->
                        <div class="form-group">

                            <label>Pilih Ukuran</label>

                            <div class="size-list">

                                <label>
                                    <input type="radio" name="ukuran" value="S" checked>
                                    <span>S</span>
                                </label>

                                <label>
                                    <input type="radio" name="ukuran" value="M">
                                    <span>M</span>
                                </label>

                                <label>
                                    <input type="radio" name="ukuran" value="L">
                                    <span>L</span>
                                </label>

                                <label>
                                    <input type="radio" name="ukuran" value="XL">
                                    <span>XL</span>
                                </label>

                                <label>
                                    <input type="radio" name="ukuran" value="2XL">
                                    <span>2XL</span>
                                </label>

                            </div>

                        </div>


                        <!-- MODEL -->
                        <div class="form-group">

                            <label>Model</label>

                            <select name="model" class="form-control">
                                <option value="Regular">Regular</option>
                                <option value="Oversized">Oversized</option>
                                <option value="Long Sleeve">Long Sleeve</option>
                            </select>

                        </div>


                        <!-- JUMLAH -->
                        <div class="form-group">

                            <label>Jumlah</label>

                            <div class="quantity">

                                <button
                                    type="button"
                                    onclick="kurang()"
                                >
                                    −
                                </button>

                                <input
                                    type="number"
                                    name="jumlah"
                                    id="jumlah"
                                    value="1"
                                    min="1"
                                >

                                <button
                                    type="button"
                                    onclick="tambah()"
                                >
                                    +
                                </button>

                            </div>

                        </div>

                         <!-- UPLOAD -->
                        <div class="form-group">

                            <label>Upload Desain</label>

                            <div class="upload">

                                <input
                                    type="file"
                                    name="desain"
                                    accept=".jpg,.jpeg,.png,.pdf"
                                >

                                <strong>
                                    Pilih file desain
                                </strong>

                                <small>
                                    JPG, PNG atau PDF
                                </small>

                            </div>

                        </div>


                        <!-- CATATAN -->
                        <div class="form-group">

                            <label>Catatan</label>

                            <textarea
                                name="catatan"
                                rows="4"
                                placeholder="Tambahkan catatan untuk pesanan..."
                            ></textarea>

                        </div>


                        <button
                            type="submit"
                            class="btn-custom"
                        >
                            Pesan Sekarang →
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

