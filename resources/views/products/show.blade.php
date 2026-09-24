@extends('layouts.app')

@section('title', 'Custom Product - CLOTHIS')

@section('content')

<style>
    .pesanan {
        background: #f7f7f7;
        padding: 35px 0 60px;
    }

    .atas {
        margin-bottom: 20px;
    }

    .atas a {
        color: #333;
        text-decoration: none;
        font-size: 9px;
    }

    .foto-produk {
        height: 500px;
        background: #e9e9e9;
        position: relative;
        overflow: hidden;
    }

    .foto-produk img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .foto-produk span {
        position: absolute;
        top: 15px;
        left: 15px;
        z-index: 2;
        background: white;
        padding: 6px 9px;
        font-size: 7px;
        font-weight: bold;
    }

    .form-pesan {
        background: white;
        border: 1px solid #ddd;
        padding: 25px;
    }

    .form-pesan > small {
        font-size: 7px;
        letter-spacing: 1px;
        color: #777;
    }

    .form-pesan h1 {
        font-size: 28px;
        margin: 8px 0;
    }

    .form-pesan h3 {
        font-size: 17px;
        margin-bottom: 12px;
    }

    .form-pesan > p {
        color: #666;
        font-size: 9px;
        line-height: 1.6;
        padding-bottom: 15px;
        border-bottom: 1px solid #ddd;
    }

    .bagian {
        margin-top: 18px;
    }

    .bagian > label {
        display: block;
        font-size: 9px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .pilihan {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .pilihan label {
        font-size: 8px;
    }

    .ukuran {
        display: flex;
        gap: 7px;
    }

    .ukuran input {
        display: none;
    }

    .ukuran span {
        display: block;
        width: 45px;
        padding: 9px;
        text-align: center;
        border: 1px solid #ccc;
        font-size: 8px;
        cursor: pointer;
    }

    .ukuran input:checked + span {
        border: 2px solid #111;
    }

    .form-control {
        font-size: 9px;
        border-radius: 0;
    }

    .jumlah {
        display: flex;
    }

    .jumlah button {
        width: 35px;
        border: 1px solid #ccc;
        background: white;
    }

    .jumlah input {
        width: 55px;
        text-align: center;
        border: 1px solid #ccc;
    }

    .upload-file {
        position: relative;
        padding: 25px;
        text-align: center;
        border: 1px dashed #aaa;
        background: #fafafa;
    }

    .upload-file input {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .upload-file strong {
        display: block;
        font-size: 9px;
    }

    .upload-file small {
        font-size: 7px;
        color: #777;
    }

    .bagian textarea {
        width: 100%;
        border: 1px solid #ccc;
        padding: 10px;
        font-size: 9px;
        resize: vertical;
    }

    .tombol-pesan {
        width: 100%;
        margin-top: 20px;
        padding: 12px;
        border: 1px solid #111;
        background: #111;
        color: white;
        font-size: 9px;
    }

    .tombol-pesan:hover {
        background: white;
        color: #111;
    }

    @media (max-width: 767px) {
        .pesanan {
            padding: 25px 15px 50px;
        }

        .foto-produk {
            height: 350px;
        }

        .form-pesan {
            padding: 18px;
        }

        .form-pesan h1 {
            font-size: 23px;
        }
    }
</style>

<section class="pesanan">

    <div class="container">

        <div class="atas">
            <a href="{{ route('products.index') }}">
                ← Kembali ke Products
            </a>
        </div>

        <div class="row g-4">

            <div class="col-lg-6">

                <div class="foto-produk">

                    <span>CUSTOM</span>

                    <img
                        src="{{ asset('images/' . $product->image) }}"
                        alt="{{ $product->name }}"
                    >

                </div>

            </div>

            <div class="col-lg-6">

                <div class="form-pesan">

                    <small>CUSTOM PRODUCT</small>

                    <h1>{{ $product->name }}</h1>

                    <h3>
                        Rp. {{ number_format($product->price, 0, ',', '.') }}
                    </h3>

                    <p>
                        {{ $product->description }}
                    </p>

                    <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        
                        <div class="bagian">

                            <label>COLOR</label>

                            <div class="pilihan">

                                <label>
                                    <input type="radio" name="color" value="Putih" checked>
                                    Putih
                                </label>

                                <label>
                                    <input type="radio" name="color" value="Hitam">
                                    Hitam
                                </label>

                                <label>
                                    <input type="radio" name="color" value="Navy">
                                    Navy
                                </label>

                                <label>
                                    <input type="radio" name="color" value="Cream">
                                    Cream
                                </label>

                            </div>

                        </div>

                        <div class="bagian">

                            <label>SIZE</label>

                            <div class="ukuran">

                                <label>
                                    <input type="radio" name="size" value="S">
                                    <span>S</span>
                                </label>

                                <label>
                                    <input type="radio" name="size" value="M" checked>
                                    <span>M</span>
                                </label>

                                <label>
                                    <input type="radio" name="size" value="L">
                                    <span>L</span>
                                </label>

                                <label>
                                    <input type="radio" name="size" value="XL">
                                    <span>XL</span>
                                </label>

                                <label>
                                    <input type="radio" name="size" value="2XL">
                                    <span>2XL</span>
                                </label>

                            </div>

                        </div>

                        <div class="bagian">

                            <label>MODEL</label>

                            <select name="model" class="form-control">
                                <option value="Regular">Regular</option>
                                <option value="Oversized">Oversized</option>
                                <option value="Long Sleeve">Long Sleeve</option>
                            </select>

                        </div>

                        <div class="bagian">

                            <label>QUANTITY</label>

                            <div class="jumlah">

                                <button type="button" onclick="kurang()">−</button>

                                <input
                                    type="number"
                                    name="quantity"
                                    id="jumlah"
                                    value="1"
                                    min="1"
                                >

                                <button type="button" onclick="tambah()">+</button>

                            </div>

                        </div>

                        <div class="bagian">

                            <label>UPLOAD DESIGN</label>

                            <div class="upload-file">

                                <input
                                    type="file"
                                    name="design"
                                    accept=".jpg,.jpeg,.png,.pdf"
                                >

                                <strong>Upload your design</strong>

                                <small>
                                    JPG, JPEG, PNG or PDF
                                </small>

                            </div>

                        </div>

                        <div class="bagian">

                            <label>NOTES</label>

                            <textarea
                                name="notes"
                                rows="4"
                                placeholder="Tulis detail atau permintaan tambahan..."
                            ></textarea>

                        </div>

                        <button type="submit" class="tombol-pesan">
                            Pesan Sekarang →
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection

@section('scripts')

<script>
function tambah() {
    let jumlah = document.getElementById('jumlah');
    jumlah.value = parseInt(jumlah.value) + 1;
}

function kurang() {
    let jumlah = document.getElementById('jumlah');

    if (parseInt(jumlah.value) > 1) {
        jumlah.value = parseInt(jumlah.value) - 1;
    }
}
</script>

@endsection
