@extends('layouts.app')

@section('title', 'Detail Pesanan - CLOTHIS')

@section('content')

<style>
    .detail-page {
        padding: 80px 0;
        background: #f8f8f6;
        min-height: 80vh;
    }

    .kembali {
        display: inline-block;
        margin-bottom: 30px;
        color: #111;
        text-decoration: none;
        font-weight: 500;
    }

    .kembali:hover {
        text-decoration: underline;
    }

    .detail-box {
        background: white;
        border-radius: 18px;
        padding: 30px;
    }

    .foto img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        border-radius: 14px;
    }

    .isi {
        padding: 10px 10px 10px 20px;
    }

    .isi small {
        color: #777;
        letter-spacing: 2px;
    }

    .isi h1 {
        font-size: 40px;
        margin: 10px 0;
        font-weight: 700;
    }

    .harga {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 25px;
    }

    .status-box {
        padding: 15px 18px;
        border-radius: 10px;
        margin-bottom: 25px;
    }

    .status-box small {
        display: block;
        letter-spacing: 0;
        margin-bottom: 5px;
    }

    .status-box strong {
        font-size: 16px;
    }

    .menunggu {
        background: #fff3cd;
        color: #856404;
    }

    .disetujui {
        background: #d1e7dd;
        color: #0f5132;
    }

    .ditolak {
        background: #f8d7da;
        color: #842029;
    }

    .data {
        border-top: 1px solid #eee;
        margin-top: 20px;
        padding-top: 20px;
    }

    .baris {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        padding: 12px 0;
        border-bottom: 1px solid #eee;
    }

    .baris span:first-child {
        color: #777;
    }

    .catatan {
        margin-top: 25px;
    }

    .catatan h5 {
        margin-bottom: 10px;
    }

    .desain {
        display: inline-block;
        margin-top: 8px;
        color: #111;
        font-weight: 600;
    }

    .tidak-ada {
        color: #999;
    }

    .hapus {
        margin-top: 30px;
    }

    @media (max-width: 991px) {
        .foto img {
            height: 400px;
        }

        .isi {
            padding: 25px 0 0;
        }
    }

    @media (max-width: 576px) {
        .foto img {
            height: 300px;
        }

        .isi h1 {
            font-size: 30px;
        }
    }
</style>

<section class="detail-page">
    <div class="container">

        <a href="{{ route('orders.index') }}" class="kembali">
            ← Kembali ke Pesanan
        </a>

        <div class="detail-box">
            <div class="row g-4">

                <div class="col-lg-6">
                    <div class="foto">
                        <img
                            src="{{ asset('images/' . $order->product->image) }}"
                            alt="{{ $order->product->name }}"
                        >
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="isi">

                        <small>CUSTOM PRODUCT</small>

                        <h1>{{ $order->product->name }}</h1>

                        <div class="harga">
                            Rp. {{ number_format($order->product->price, 0, ',', '.') }}
                        </div>

                        @if ($order->status == 'Menunggu Konfirmasi')
                            <div class="status-box menunggu">
                                <small>Status Pesanan</small>
                                <strong>Menunggu Konfirmasi</strong>
                            </div>
                        @elseif ($order->status == 'Disetujui')
                            <div class="status-box disetujui">
                                <small>Status Pesanan</small>
                                <strong>Disetujui</strong>
                            </div>
                        @elseif ($order->status == 'Ditolak')
                            <div class="status-box ditolak">
                                <small>Status Pesanan</small>
                                <strong>Ditolak</strong>
                            </div>
                        @else
                            <div class="status-box menunggu">
                                <small>Status Pesanan</small>
                                <strong>{{ $order->status }}</strong>
                            </div>
                        @endif

                        <div class="data">

                            <div class="baris">
                                <span>Warna</span>
                                <strong>{{ $order->color }}</strong>
                            </div>

                            <div class="baris">
                                <span>Ukuran</span>
                                <strong>{{ $order->size }}</strong>
                            </div>

                            <div class="baris">
                                <span>Model</span>
                                <strong>{{ $order->model }}</strong>
                            </div>

                            <div class="baris">
                                <span>Jumlah</span>
                                <strong>{{ $order->quantity }}</strong>
                            </div>

                            <div class="baris">
                                <span>Tanggal Pesan</span>
                                <strong>{{ $order->created_at->format('d M Y') }}</strong>
                            </div>

                        </div>

                        <div class="catatan">
                            <h5>Desain</h5>

                            @if ($order->design)
                                <a
                                    href="{{ asset('storage/' . $order->design) }}"
                                    target="_blank"
                                    class="desain"
                                >
                                    Lihat File Desain →
                                </a>
                            @else
                                <span class="tidak-ada">
                                    Tidak ada file desain.
                                </span>
                            @endif
                        </div>

                        <div class="catatan">
                            <h5>Catatan</h5>

                            @if ($order->notes)
                                <p>{{ $order->notes }}</p>
                            @else
                                <span class="tidak-ada">
                                    Tidak ada catatan.
                                </span>
                            @endif
                        </div>

                        <form
                            action="{{ route('orders.destroy', $order) }}"
                            method="POST"
                            class="hapus"
                            onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-outline-danger">
                                Hapus Pesanan
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
