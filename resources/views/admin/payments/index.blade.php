@extends('admin.layout')

@section('content')

<style>
    .halaman-pembayaran {
        padding: 35px 40px;
    }

    .judul-pembayaran {
        margin-bottom: 28px;
    }

    .judul-pembayaran h1 {
        font-size: 30px;
        font-weight: 700;
        margin: 0 0 7px;
        color: #111;
    }

    .judul-pembayaran p {
        margin: 0;
        color: #777;
        font-size: 14px;
    }

    .daftar-pembayaran {
        display: grid;
        gap: 18px;
    }

    .kartu-pembayaran {
        background: #fff;
        border: 1px solid #ddd;
        padding: 24px;
    }

    .atas-pembayaran {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        border-bottom: 1px solid #eee;
        padding-bottom: 18px;
        margin-bottom: 20px;
    }

    .nomor-pembayaran {
        font-size: 18px;
        font-weight: 700;
        color: #111;
        margin-bottom: 5px;
    }

    .nomor-pesanan {
        font-size: 13px;
        color: #777;
    }

    .status-pembayaran {
        padding: 7px 12px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .4px;
    }

    .status-menunggu {
        background: #f5e6b3;
        color: #6f5200;
    }

    .status-berhasil {
        background: #d9f2e5;
        color: #167348;
    }

    .detail-pembayaran {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .detail-pembayaran small {
        display: block;
        color: #888;
        font-size: 10px;
        letter-spacing: 1px;
        margin-bottom: 7px;
        text-transform: uppercase;
    }

    .detail-pembayaran strong {
        display: block;
        font-size: 14px;
        color: #111;
    }

    .total-pembayaran {
        font-size: 17px !important;
    }

    .bawah-pembayaran {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #eee;
        margin-top: 22px;
        padding-top: 18px;
    }

    .status-pesanan {
        font-size: 13px;
        color: #555;
    }

    .aksi-pembayaran {
        display: flex;
        gap: 10px;
    }

    .tombol-pembayaran {
        display: inline-block;
        padding: 10px 16px;
        border: 1px solid #222;
        background: #fff;
        color: #111;
        text-decoration: none;
        font-size: 12px;
        cursor: pointer;
    }

    .tombol-pembayaran:hover {
        background: #f5f5f5;
    }

    .tombol-verifikasi {
        background: #111;
        color: #fff;
        border: 1px solid #111;
    }

    .tombol-verifikasi:hover {
        background: #333;
    }

    .alert-pembayaran {
        background: #e3f4e9;
        border: 1px solid #b8dfc5;
        color: #176b39;
        padding: 13px 16px;
        margin-bottom: 20px;
        font-size: 13px;
    }

    .bukti-pembayaran {
        margin-top: 18px;
    }

    .bukti-pembayaran a {
        color: #111;
        font-size: 12px;
        text-decoration: underline;
    }

    .kosong-pembayaran {
        background: #fff;
        border: 1px solid #ddd;
        padding: 50px;
        text-align: center;
        color: #777;
    }

    @media(max-width: 900px) {
        .halaman-pembayaran {
            padding: 25px;
        }

        .detail-pembayaran {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media(max-width: 600px) {
        .halaman-pembayaran {
            padding: 20px 15px;
        }

        .atas-pembayaran {
            display: block;
        }

        .status-pembayaran {
            display: inline-block;
            margin-top: 12px;
        }

        .detail-pembayaran {
            grid-template-columns: 1fr;
        }

        .bawah-pembayaran {
            display: block;
        }

        .aksi-pembayaran {
            margin-top: 15px;
            flex-wrap: wrap;
        }
    }
</style>

<div class="halaman-pembayaran">

    <div class="judul-pembayaran">
        <h1>Pembayaran</h1>
        <p>Kelola dan verifikasi pembayaran pelanggan.</p>
    </div>

    @if(session('success'))
        <div class="alert-pembayaran">
            {{ session('success') }}
        </div>
    @endif

    <div class="daftar-pembayaran">

        @forelse($payments as $payment)

            <div class="kartu-pembayaran">

                <div class="atas-pembayaran">

                    <div>
                        <div class="nomor-pembayaran">
                            Pembayaran #{{ $payment->id }}
                        </div>

                        <div class="nomor-pesanan">
                            Pesanan #{{ $payment->order_id }}
                        </div>
                    </div>

                    @if($payment->status === 'Berhasil')

                        <div class="status-pembayaran status-berhasil">
                            Pembayaran Berhasil
                        </div>

                    @else

                        <div class="status-pembayaran status-menunggu">
                            Menunggu Verifikasi
                        </div>

                    @endif

                </div>

                <div class="detail-pembayaran">

                    <div>
                        <small>Produk</small>
                        <strong>
                            {{ $payment->order->product->name ?? '-' }}
                        </strong>
                    </div>

                    <div>
                        <small>Metode Pembayaran</small>
                        <strong>
                            {{ $payment->method }}
                        </strong>
                    </div>

                    <div>
                        <small>Total Pembayaran</small>
                        <strong class="total-pembayaran">
                            Rp {{ number_format($payment->amount, 0, ',', '.') }}
                        </strong>
                    </div>

                    <div>
                        <small>Jumlah</small>
                        <strong>
                            {{ $payment->order->quantity ?? '-' }} pcs
                        </strong>
                    </div>

                </div>

                @if($payment->proof)

                    <div class="bukti-pembayaran">
                        <a
                            href="{{ asset('storage/' . $payment->proof) }}"
                            target="_blank"
                        >
                            Lihat Bukti Pembayaran
                        </a>
                    </div>

                @endif

                <div class="bawah-pembayaran">

                    <div class="status-pesanan">
                        Status Pesanan:
                        <strong>
                            {{ $payment->order->status ?? '-' }}
                        </strong>
                    </div>

                    <div class="aksi-pembayaran">

                        @if($payment->status === 'Menunggu Verifikasi')

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
                                    class="tombol-pembayaran tombol-verifikasi"
                                >
                                    Verifikasi Pembayaran
                                </button>
                            </form>

                        @endif

                        <a
                            href="{{ route('admin.payments.show', $payment->id) }}"
                            class="tombol-pembayaran"
                        >
                            Detail
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="kosong-pembayaran">
                Belum ada pembayaran.
            </div>

        @endforelse

    </div>

</div>

@endsection
