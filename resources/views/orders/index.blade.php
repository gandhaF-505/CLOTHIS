@extends('layouts.app')

@section('title', 'Pesanan - CLOTHIS')

@section('content')

<style>
    .pesanan-page {
        padding: 80px 0;
        background: #f8f8f6;
        min-height: 80vh;
    }

    .judul {
        margin-bottom: 40px;
    }

    .judul small {
        letter-spacing: 2px;
        color: #777;
    }

    .judul h1 {
        font-size: 48px;
        font-weight: 700;
        margin: 8px 0;
    }

    .judul p {
        color: #777;
    }

    .pesanan-box {
        background: white;
        border-radius: 16px;
        padding: 25px;
        overflow-x: auto;
    }

    .produk {
        display: flex;
        align-items: center;
        gap: 15px;
        min-width: 240px;
    }

    .produk img {
        width: 65px;
        height: 65px;
        object-fit: cover;
        border-radius: 10px;
    }

    .produk strong {
        display: block;
        margin-bottom: 5px;
    }

    .produk small {
        color: #777;
    }

    .status {
        display: inline-block;
        padding: 7px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
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

    .aksi {
        text-decoration: none;
        color: #111;
        font-weight: 600;
        white-space: nowrap;
    }

    .aksi:hover {
        text-decoration: underline;
    }

    .kosong {
        text-align: center;
        padding: 50px 20px;
        color: #777;
    }

    .berhasil {
        background: #d1e7dd;
        color: #0f5132;
        padding: 14px 18px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .judul h1 {
            font-size: 36px;
        }
    }
</style>

<section class="pesanan-page">
    <div class="container">

        <div class="judul">
            <small>YOUR ORDERS</small>
            <h1>Pesanan.</h1>
            <p>Daftar pesanan custom yang telah dibuat.</p>
        </div>

        @if (session('success'))
            <div class="berhasil">
                {{ session('success') }}
            </div>
        @endif

        <div class="pesanan-box">

            @if ($orders->count())

                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>PRODUCT</th>
                            <th>COLOR</th>
                            <th>SIZE</th>
                            <th>MODEL</th>
                            <th>QTY</th>
                            <th>STATUS</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    <div class="produk">
                                        <img
                                            src="{{ asset('images/' . $order->product->image) }}"
                                            alt="{{ $order->product->name }}"
                                        >

                                        <div>
                                            <strong>{{ $order->product->name }}</strong>

                                            <small>
                                                Rp. {{ number_format($order->product->price, 0, ',', '.') }}
                                            </small>
                                        </div>
                                    </div>
                                </td>

                                <td>{{ $order->color }}</td>

                                <td>{{ $order->size }}</td>

                                <td>{{ $order->model }}</td>

                                <td>{{ $order->quantity }}</td>

                                <td>
                                    @if ($order->status == 'Menunggu Konfirmasi')
                                        <span class="status menunggu">
                                            Menunggu Konfirmasi
                                        </span>
                                    @elseif ($order->status == 'Disetujui')
                                        <span class="status disetujui">
                                            Disetujui
                                        </span>
                                    @elseif ($order->status == 'Ditolak')
                                        <span class="status ditolak">
                                            Ditolak
                                        </span>
                                    @else
                                        <span class="status menunggu">
                                            {{ $order->status }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('orders.show', $order) }}" class="aksi">
                                        Detail →
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @else

                <div class="kosong">
                    Belum ada pesanan.
                </div>

            @endif

        </div>
    </div>
</section>

@endsection
