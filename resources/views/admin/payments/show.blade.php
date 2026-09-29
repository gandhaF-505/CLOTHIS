@extends('admin.layout')

@section('content')

<style>
    .halaman-detail {
        padding: 35px 40px;
    }

    .judul-detail {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 28px;
    }

    .judul-detail h1 {
        font-size: 30px;
        font-weight: 700;
        margin: 0 0 7px;
        color: #111;
    }

    .judul-detail p {
        margin: 0;
        color: #777;
        font-size: 14px;
    }

    .tombol-kembali {
        display: inline-block;
        padding: 10px 16px;
        border: 1px solid #222;
        background: #fff;
        color: #111;
        text-decoration: none;
        font-size: 12px;
    }

    .tombol-kembali:hover {
        background: #f5f5f5;
    }

    .kartu-detail {
        background: #fff;
        border: 1px solid #ddd;
        margin-bottom: 18px;
    }

    .judul-kartu {
        padding: 20px 24px;
        border-bottom: 1px solid #eee;
        font-size: 16px;
        font-weight: 700;
    }

    .isi-kartu {
        padding: 24px;
    }

    .status-besar {
        display: inline-block;
        padding: 8px 14px;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 22px;
    }

    .status-menunggu {
        background: #f5e6b3;
        color: #6f5200;
    }

    .status-berhasil {
        background: #d9f2e5;
        color: #167348;
    }

    .data-detail {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 22px 35px;
    }

    .data-item small {
        display: block;
        color: #888;
        font-size: 10px;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 7px;
    }

    .data-item strong {
        display: block;
        color: #111;
        font-size: 14px;
    }

    .total {
        font-size: 20px !important;
    }

    .bukti {
        border: 1px solid #ddd;
        padding: 18px;
        background: #fafafa;
    }

    .bukti img {
        max-width: 100%;
        max-height: 500px;
        display: block;
        margin-bottom: 15px;
    }

    .tombol-bukti {
        display: inline-block;
        padding: 10px 16px;
        background: #111;
        color: #fff;
        text-decoration: none;
        font-size: 12px;
    }

    .tombol-bukti:hover {
        background: #333;
        color: #fff;
    }

    .aksi-detail {
        display: flex;
        gap: 10px;
        margin-top: 24px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }

    .tombol-verifikasi {
        padding: 10px 16px;
        border: 1px solid #111;
        background: #111;
        color: #fff;
        font-size: 12px;
        cursor: pointer;
    }

    .tombol-verifikasi:hover {
        background: #333;
    }

    .alert-detail {
        background: #e3f4e9;
        border: 1px solid #b8dfc5;
        color: #176b39;
        padding: 13px 16px;
        margin-bottom: 20px;
        font-size: 13px;
    }

    @media(max-width: 700px) {
        .halaman-detail {
            padding: 25px 20px;
        }

        .judul-detail {
            display: block;
        }

        .tombol-kembali {
            display: inline-block;
            margin-top: 15px;
        }

        .data-detail {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="halaman-detail">

    <div class="judul-detail">

        <div>
            <h1>Detail Pembayaran</h1>
            <p>Informasi lengkap pembayaran pelanggan.</p>
        </div>

        <a
            href="{{ route('admin.payments.index') }}"
            class="tombol-kembali"
        >
            Kembali
        </a>

    </div>

    @if(session('success'))
        <div class="alert-detail">
            {{ session('success') }}
        </div>
    @endif

    <div class="kartu-detail">

        <div class="judul-kartu">
            Pembayaran #{{ $payment->id }}
        </div>

        <div class="isi-kartu">

            @if($payment->status === 'Berhasil')

                <div class="status-besar status-berhasil">
                    Pembayaran Berhasil
                </div>

            @else

                <div class="status-besar status-menunggu">
                    Menunggu Verifikasi
                </div>

            @endif

            <div class="data-detail">

                <div class="data-item">
                    <small>Nomor Pesanan</small>
                    <strong>
                        #{{ $payment->order_id }}
                    </strong>
                </div>

                <div class="data-item">
                    <small>Produk</small>
                    <strong>
                        {{ $payment->order->product->name ?? '-' }}
                    </strong>
                </div>

                <div class="data-item">
                    <small>Jumlah Pesanan</small>
                    <strong>
                        {{ $payment->order->quantity ?? '-' }} pcs
                    </strong>
                </div>

                <div class="data-item">
                    <small>Metode Pembayaran</small>
                    <strong>
                        {{ $payment->method }}
                    </strong>
                </div>

                <div class="data-item">
                    <small>Total Pembayaran</small>
                    <strong class="total">
                        Rp {{ number_format($payment->amount, 0, ',', '.') }}
                    </strong>
                </div>

                <div class="data-item">
                    <small>Status Pesanan</small>
                    <strong>
                        {{ $payment->order->status ?? '-' }}
                    </strong>
                </div>

                <div class="data-item">
                    <small>Tanggal Pembayaran</small>
                    <strong>
                        {{ $payment->created_at->format('d M Y, H:i') }}
                    </strong>
                </div>

                <div class="data-item">
                    <small>Status Pembayaran</small>
                    <strong>
                        {{ $payment->status }}
                    </strong>
                </div>

            </div>

        </div>

    </div>

    <div class="kartu-detail">

        <div class="judul-kartu">
            Bukti Pembayaran
        </div>

        <div class="isi-kartu">

            @if($payment->proof)

                <div class="bukti">

                    @php
                        $extension = strtolower(pathinfo($payment->proof, PATHINFO_EXTENSION));
                    @endphp

                    @if(in_array($extension, ['jpg', 'jpeg', 'png']))
                        <img
                            src="{{ asset('storage/' . $payment->proof) }}"
                            alt="Bukti Pembayaran"
                        >
                    @endif

                    <a
                        href="{{ asset('storage/' . $payment->proof) }}"
                        target="_blank"
                        class="tombol-bukti"
                    >
                        Buka Bukti Pembayaran
                    </a>

                </div>

            @else

                <p style="color:#777; margin:0;">
                    Bukti pembayaran belum tersedia.
                </p>

            @endif

            @if($payment->status === 'Menunggu Verifikasi')

                <div class="aksi-detail">

                    <form
                        action="{{ route('admin.payments.action') }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin memverifikasi pembayaran ini?')"
                    >
                        @csrf

                        <input
                            type="hidden"
                            name="payment_id"
                            value="{{ $payment->id }}"
                        >

                        <input
                            type="hidden"
                            name="action"
                            value="berhasil"
                        >

                        <button
                            type="submit"
                            class="tombol-verifikasi"
                        >
                            Verifikasi Pembayaran
                        </button>

                    </form>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection
