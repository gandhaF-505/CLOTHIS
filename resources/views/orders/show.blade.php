@extends('layouts.app')

@section('content')

<style>
    .detail-pesanan {
        padding: 40px 0;
    }

    .kartu-detail {
        background: white;
        border: 1px solid #eee;
        border-radius: 12px;
        padding: 25px;
    }

    .produk-detail {
        display: flex;
        gap: 25px;
        margin-bottom: 30px;
    }

    .produk-detail img {
        width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 10px;
    }

    .produk-detail h1 {
        font-size: 26px;
        margin-bottom: 10px;
    }

    .produk-detail p {
        color: #666;
    }

    .info-pesanan {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-top: 25px;
    }

    .info {
        background: #f7f7f7;
        padding: 15px;
        border-radius: 8px;
    }

    .info span {
        display: block;
        color: #777;
        font-size: 13px;
        margin-bottom: 5px;
    }

    .status-pesanan {
        margin-top: 25px;
        padding: 20px;
        border-radius: 10px;
        background: #f7f7f7;
    }

    .status-pesanan strong {
        display: block;
        margin-bottom: 8px;
    }

    .status-pesanan p {
        margin-bottom: 5px;
    }

    .status {
        display: inline-block;
        padding: 7px 12px;
        border-radius: 20px;
        font-size: 13px;
        background: #eee;
    }

    .status-menunggu {
        background: #fff3cd;
        color: #856404;
    }

    .status-disetujui {
        background: #cff4fc;
        color: #055160;
    }

    .status-berhasil {
        background: #d1e7dd;
        color: #0f5132;
    }

    .status-produksi {
        background: #e2d9f3;
        color: #432874;
    }

    .status-selesai {
        background: #d1e7dd;
        color: #0f5132;
    }

    .btn-bayar {
        display: inline-block;
        margin-top: 15px;
        background: #198754;
        color: white;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 8px;
    }

    .btn-bayar:hover {
        background: #157347;
        color: white;
    }

    .btn-kembali {
        display: inline-block;
        margin-top: 20px;
        background: #111;
        color: white;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 8px;
    }

    .btn-kembali:hover {
        background: #333;
        color: white;
    }

    .pesan-sukses {
        background: #d1e7dd;
        color: #0f5132;
        padding: 12px 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .desain {
        margin-top: 25px;
        background: #f7f7f7;
        padding: 15px;
        border-radius: 8px;
    }

    .desain a {
        display: inline-block;
        margin-top: 8px;
        color: #111;
        font-weight: 600;
    }

    @media (max-width: 768px) {

        .produk-detail {
            flex-direction: column;
        }

        .produk-detail img {
            width: 100%;
            height: 250px;
        }

        .info-pesanan {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container detail-pesanan">

    @if(session('success'))
        <div class="pesan-sukses">
            {{ session('success') }}
        </div>
    @endif

    <div class="kartu-detail">

        <div class="produk-detail">

            @if($order->product->image)

                <img
                    src="{{ asset('storage/' . $order->product->image) }}"
                    alt="{{ $order->product->name }}"
                >

            @endif

            <div>

                <h1>
                    {{ $order->product->name }}
                </h1>

                <p>
                    {{ $order->product->description }}
                </p>

                <strong>
                    Rp{{ number_format($order->product->price, 0, ',', '.') }}
                </strong>

            </div>

        </div>

        <h3>Detail Pesanan</h3>

        <div class="info-pesanan">

            <div class="info">

                <span>Warna</span>

                {{ $order->color }}

            </div>

            <div class="info">

                <span>Ukuran</span>

                {{ $order->size }}

            </div>

            <div class="info">

                <span>Model</span>

                {{ $order->model }}

            </div>

            <div class="info">

                <span>Jumlah</span>

                {{ $order->quantity }}

            </div>

            <div class="info">

                <span>Status Desain</span>

                {{ $order->design_status }}

            </div>

            <div class="info">

                <span>Status Pesanan</span>

                {{ $order->status }}

            </div>

        </div>

        @if($order->design)

            <div class="desain">

                <strong>Desain</strong>

                <br>

                <a
                    href="{{ asset('storage/' . $order->design) }}"
                    target="_blank"
                >
                    Lihat Desain
                </a>

            </div>

        @endif

        @if($order->notes)

            <div class="desain">

                <strong>Catatan</strong>

                <p>
                    {{ $order->notes }}
                </p>

            </div>

        @endif

        <div class="status-pesanan">

            <strong>Status Pesanan</strong>

            @if($order->status === 'Menunggu Konfirmasi')

                <span class="status status-menunggu">
                    Menunggu Konfirmasi
                </span>

                <p>
                    Pesanan kamu sedang menunggu persetujuan admin.
                </p>

            @elseif($order->status === 'Pesanan Disetujui')

                <span class="status status-disetujui">
                    Pesanan Disetujui
                </span>

                <p>
                    Pesanan telah disetujui. Silakan lakukan pembayaran.
                </p>

                <a
                    href="{{ route('orders.payment', $order->id) }}"
                    class="btn-bayar"
                >
                    Bayar Sekarang
                </a>

            @elseif($order->status === 'Menunggu Konfirmasi Pembayaran')

                <span class="status status-menunggu">
                    Menunggu Konfirmasi Pembayaran
                </span>

                <p>
                    Bukti pembayaran sudah dikirim dan sedang diperiksa oleh admin.
                </p>

            @elseif($order->status === 'Pembayaran Berhasil')

                <span class="status status-berhasil">
                    Pembayaran Berhasil
                </span>

                <p>
                    Pembayaran kamu sudah dikonfirmasi oleh admin.
                </p>

                <p>
                    Pesanan akan dilanjutkan ke proses produksi.
                </p>

            @elseif($order->status === 'Dalam Produksi')

                <span class="status status-produksi">
                    Dalam Produksi
                </span>

                <p>
                    Pesanan kamu sedang dalam proses produksi.
                </p>

            @elseif($order->status === 'Selesai')

                <span class="status status-selesai">
                    Selesai
                </span>

                <p>
                    Pesanan kamu sudah selesai diproduksi.
                </p>

            @else

                <span class="status">
                    {{ $order->status }}
                </span>

            @endif

        </div>

        <a
            href="{{ route('orders.index') }}"
            class="btn-kembali"
        >
            Kembali ke Pesanan
        </a>

    </div>

</div>

@endsection
