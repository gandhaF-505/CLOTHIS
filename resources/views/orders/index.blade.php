@extends('layouts.app')

@section('content')

<style>
    .halaman-pesanan {
        padding: 40px 0;
    }

    .judul-pesanan {
        margin-bottom: 25px;
    }

    .judul-pesanan h1 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .judul-pesanan p {
        color: #777;
    }

    .kartu-pesanan {
        background: white;
        border: 1px solid #eee;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 15px;
    }

    .produk-pesanan {
        display: flex;
        gap: 18px;
        align-items: center;
    }

    .produk-pesanan img {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 8px;
    }

    .produk-pesanan h3 {
        font-size: 18px;
        margin-bottom: 8px;
    }

    .status {
        display: inline-block;
        padding: 7px 12px;
        border-radius: 20px;
        background: #f1f1f1;
        font-size: 13px;
    }

    .btn-detail {
        display: inline-block;
        margin-top: 15px;
        background: #111;
        color: white;
        text-decoration: none;
        padding: 9px 16px;
        border-radius: 7px;
    }

    .btn-detail:hover {
        color: white;
        background: #333;
    }

    .btn-bayar {
        display: inline-block;
        margin-top: 15px;
        margin-left: 5px;
        background: #198754;
        color: white;
        text-decoration: none;
        padding: 9px 16px;
        border-radius: 7px;
    }

    .btn-bayar:hover {
        color: white;
        background: #157347;
    }

    .pesan-sukses {
        background: #d1e7dd;
        color: #0f5132;
        padding: 12px 15px;
        border-radius: 8px;
        margin-bottom: 20px;
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
</style>

<div class="container halaman-pesanan">

    <div class="judul-pesanan">
        <h1>Pesanan Saya</h1>
        <p>Lihat status pesanan dan pembayaran kamu.</p>
    </div>

    @if(session('success'))
        <div class="pesan-sukses">
            {{ session('success') }}
        </div>
    @endif

    @forelse($orders as $order)

        <div class="kartu-pesanan">

            <div class="produk-pesanan">

                @if($order->product->image)
                    <img
                        src="{{ asset('storage/' . $order->product->image) }}"
                        alt="{{ $order->product->name }}"
                    >
                @endif

                <div>

                    <h3>
                        {{ $order->product->name }}
                    </h3>

                    <p>
                        Jumlah: {{ $order->quantity }}
                    </p>

                    @if($order->status === 'Menunggu Konfirmasi')
                        <span class="status status-menunggu">
                            Menunggu Konfirmasi
                        </span>
                    @elseif($order->status === 'Pesanan Disetujui')
                        <span class="status status-disetujui">
                            Pesanan Disetujui
                        </span>
                    @elseif($order->status === 'Menunggu Konfirmasi Pembayaran')
                        <span class="status status-menunggu">
                            Menunggu Konfirmasi Pembayaran
                        </span>
                    @elseif($order->status === 'Pembayaran Berhasil')
                        <span class="status status-berhasil">
                            Pembayaran Berhasil
                        </span>
                    @elseif($order->status === 'Dalam Produksi')
                        <span class="status status-produksi">
                            Dalam Produksi
                        </span>
                    @elseif($order->status === 'Selesai')
                        <span class="status status-selesai">
                            Selesai
                        </span>
                    @else
                        <span class="status">
                            {{ $order->status }}
                        </span>
                    @endif

                </div>

            </div>

            <a
                href="{{ route('orders.show', $order->id) }}"
                class="btn-detail"
            >
                Detail Pesanan
            </a>

            @if($order->status === 'Pesanan Disetujui')
                <a
                    href="{{ route('orders.payment', $order->id) }}"
                    class="btn-bayar"
                >
                    Bayar Sekarang
                </a>
            @endif

        </div>

    @empty

        <div class="kartu-pesanan">
            Belum ada pesanan.
        </div>

    @endforelse

</div>

@endsection
