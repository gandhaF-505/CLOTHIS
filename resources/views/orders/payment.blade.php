@extends('layouts.app')

@section('content')

<style>
    .halaman-pembayaran {
        padding: 40px 0;
    }

    .kartu-pembayaran {
        max-width: 700px;
        margin: auto;
        background: white;
        border: 1px solid #e5e5e5;
        border-radius: 14px;
        padding: 30px;
    }

    .judul-pembayaran {
        margin-bottom: 25px;
    }

    .judul-pembayaran h1 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .judul-pembayaran p {
        color: #777;
        margin: 0;
    }

    .detail-pesanan {
        background: #f7f7f7;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 25px;
    }

    .detail-pesanan h3 {
        font-size: 18px;
        margin-bottom: 15px;
    }

    .detail-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .detail-item:last-child {
        margin-bottom: 0;
    }

    .total-pembayaran {
        border-top: 1px solid #ddd;
        margin-top: 15px;
        padding-top: 15px;
        font-size: 18px;
        font-weight: 700;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-group select,
    .form-group input {
        width: 100%;
        padding: 11px 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        outline: none;
    }

    .info-pembayaran {
        background: #fff8e1;
        border: 1px solid #ffe082;
        border-radius: 8px;
        padding: 14px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .info-bank,
    .info-qris {
        display: none;
        background: #f7f7f7;
        border-radius: 10px;
        padding: 20px;
        margin-top: 10px;
        margin-bottom: 20px;
    }

    .info-bank strong {
        display: block;
        margin-bottom: 8px;
    }

    .nomor-rekening {
        font-size: 22px;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 5px;
    }

    .nama-rekening {
        color: #666;
    }

    .qris {
        text-align: center;
    }

    .qris img {
        width: 250px;
        max-width: 100%;
        border-radius: 10px;
        margin: 10px auto;
    }

    .btn-bayar {
        width: 100%;
        border: none;
        background: #111;
        color: white;
        padding: 12px;
        border-radius: 8px;
        font-size: 15px;
        cursor: pointer;
    }

    .btn-bayar:hover {
        background: #333;
    }

    .error {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
    }
</style>

<div class="container halaman-pembayaran">

    <div class="kartu-pembayaran">

        <div class="judul-pembayaran">
            <h1>Pembayaran</h1>
            <p>Silakan lakukan pembayaran untuk melanjutkan pesanan.</p>
        </div>

        <div class="detail-pesanan">

            <h3>Detail Pesanan</h3>

            <div class="detail-item">
                <span>Produk</span>
                <strong>{{ $order->product->name }}</strong>
            </div>

            <div class="detail-item">
                <span>Harga</span>
                <span>
                    Rp{{ number_format($order->product->price, 0, ',', '.') }}
                </span>
            </div>

            <div class="detail-item">
                <span>Jumlah</span>
                <span>{{ $order->quantity }}</span>
            </div>

            <div class="detail-item total-pembayaran">
                <span>Total Pembayaran</span>
                <span>
                    Rp{{ number_format($order->product->price * $order->quantity, 0, ',', '.') }}
                </span>
            </div>

        </div>

        <div class="info-pembayaran">
            Pembayaran akan diverifikasi oleh admin terlebih dahulu.
            Setelah pembayaran berhasil diverifikasi, pesanan akan masuk ke proses produksi.
        </div>

        <form
            action="{{ route('orders.payment.store', $order->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="form-group">

                <label for="method">
                    Metode Pembayaran
                </label>

                <select
                    name="method"
                    id="method"
                    required
                >
                    <option value="">Pilih metode pembayaran</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="QRIS">QRIS</option>
                </select>

                @error('method')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <div class="info-bank" id="infoBank">

                <strong>Transfer Bank</strong>

                <div class="nomor-rekening">
                    1234567890
                </div>

                <div class="nama-rekening">
                    CLOTHIS
                </div>

            </div>

            <div class="info-qris" id="infoQris">

                <div class="qris">

                    <strong>Scan QRIS untuk melakukan pembayaran</strong>

                    <br>

                    <img
                        src="{{ asset('images/qris.jpg') }}"
                        alt="QRIS CLOTHIS"
                    >

                    <p>
                        Scan QRIS di atas menggunakan aplikasi pembayaran kamu.
                    </p>

                </div>

            </div>

            <div class="form-group">

                <label for="proof">
                    Bukti Pembayaran
                </label>

                <input
                    type="file"
                    name="proof"
                    id="proof"
                    accept=".jpg,.jpeg,.png,.pdf"
                    required
                >

                @error('proof')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>

            <button type="submit" class="btn-bayar">
                Kirim Pembayaran
            </button>

        </form>

    </div>

</div>

<script>
    const method = document.getElementById('method');
    const infoBank = document.getElementById('infoBank');
    const infoQris = document.getElementById('infoQris');

    method.addEventListener('change', function () {

        infoBank.style.display = 'none';
        infoQris.style.display = 'none';

        if (this.value === 'Transfer Bank') {
            infoBank.style.display = 'block';
        }

        if (this.value === 'QRIS') {
            infoQris.style.display = 'block';
        }

    });
</script>

@endsection
