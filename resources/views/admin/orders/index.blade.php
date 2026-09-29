@extends('admin.layout')

@section('title', 'Pesanan')
@section('heading', 'Manajemen Pesanan')

@section('content')

<style>
    .pesanan-header {
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
        margin-bottom:25px;
    }

    .pesanan-header h1 {
        margin:0 0 6px;
        font-size:30px;
    }

    .pesanan-header p {
        margin:0;
        color:#777;
        font-size:14px;
    }

    .tombol-baru {
        background:#111;
        color:white;
        text-decoration:none;
        padding:11px 18px;
        border-radius:8px;
        font-size:13px;
    }

    .filter-pesanan {
        display:flex;
        justify-content:space-between;
        align-items:center;
        border-bottom:1px solid #ddd;
        margin-bottom:25px;
        gap:20px;
    }

    .tab-pesanan {
        display:flex;
        gap:25px;
        overflow-x:auto;
    }

    .tab-pesanan a {
        color:#555;
        text-decoration:none;
        font-size:13px;
        padding-bottom:12px;
        white-space:nowrap;
    }

    .tab-pesanan a.aktif {
        color:#111;
        border-bottom:2px solid #111;
    }

    .cari-pesanan {
        width:250px;
        height:36px;
        border:1px solid #ddd;
        border-radius:7px;
        padding:0 12px;
        outline:none;
        margin-bottom:8px;
    }

    .daftar-pesanan {
        display:grid;
        grid-template-columns:repeat(2, minmax(0, 1fr));
        gap:18px;
    }

    .kartu-pesanan {
        background:white;
        border:1px solid #ddd;
        border-radius:10px;
        padding:18px;
    }

    .atas-kartu {
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
        margin-bottom:18px;
    }

    .jenis-pesanan {
        display:inline-block;
        background:#f0f0f0;
        padding:5px 8px;
        border-radius:5px;
        font-size:9px;
        letter-spacing:1px;
        font-weight:bold;
    }

    .tanggal-pesanan {
        text-align:right;
        color:#777;
        font-size:10px;
    }

    .tanggal-pesanan strong {
        display:block;
        color:#111;
        font-size:12px;
        margin-top:3px;
    }

    .nomor-pesanan {
        font-size:22px;
        font-weight:600;
        margin-bottom:3px;
    }

    .nama-produk {
        color:#777;
        font-size:13px;
        margin-bottom:18px;
    }

    .detail-produk {
        display:grid;
        grid-template-columns:45px 1fr;
        gap:12px;
        align-items:center;
        padding-bottom:16px;
        border-bottom:1px solid #eee;
    }

    .gambar-produk {
        width:45px;
        height:45px;
        border-radius:6px;
        background:#eee;
        display:flex;
        align-items:center;
        justify-content:center;
        overflow:hidden;
    }

    .gambar-produk img {
        width:100%;
        height:100%;
        object-fit:cover;
    }

    .info-produk strong {
        display:block;
        font-size:13px;
        margin-bottom:4px;
    }

    .info-produk span {
        display:block;
        color:#777;
        font-size:10px;
    }

    .detail-pesanan {
        display:grid;
        grid-template-columns:repeat(3, 1fr);
        gap:10px;
        margin-top:16px;
    }

    .detail-item small {
        display:block;
        color:#999;
        font-size:9px;
        margin-bottom:4px;
        text-transform:uppercase;
    }

    .detail-item strong {
        font-size:12px;
    }

    .status-pesanan {
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-top:18px;
        padding-top:15px;
        border-top:1px solid #eee;
    }

    .status-desain {
        font-size:11px;
        padding:6px 9px;
        border-radius:6px;
    }

    .status-setuju {
        background:#e8f7ee;
        color:#176b3a;
    }

    .status-tolak {
        background:#fdecec;
        color:#9b1c1c;
    }

    .status-tunggu {
        background:#f1f1f1;
        color:#666;
    }

    .status-order {
        font-size:11px;
        color:#555;
    }

    .lihat-pesanan {
        display:inline-block;
        margin-top:15px;
        color:#111;
        text-decoration:none;
        font-size:12px;
        font-weight:600;
    }

    .kosong-pesanan {
        grid-column:1 / -1;
        background:white;
        border:1px solid #ddd;
        border-radius:10px;
        padding:50px 20px;
        text-align:center;
        color:#777;
    }

    .kosong-pesanan strong {
        display:block;
        color:#111;
        margin-bottom:5px;
    }

    @media(max-width:900px) {
        .daftar-pesanan {
            grid-template-columns:1fr;
        }

        .filter-pesanan {
            display:block;
        }

        .cari-pesanan {
            width:100%;
            margin-top:15px;
        }
    }

    @media(max-width:600px) {
        .pesanan-header {
            display:block;
        }

        .tombol-baru {
            display:inline-block;
            margin-top:15px;
        }

        .detail-pesanan {
            grid-template-columns:1fr 1fr;
        }
    }
</style>

<div class="pesanan-header">

    <div>
        <h1>Manajemen Pesanan</h1>

        <p>
            Pantau dan kelola pesanan sablon aktif.
        </p>
    </div>

    <a href="{{ route('orders.create') }}" class="tombol-baru">
        + Pesanan Baru
    </a>

</div>

@if(session('success'))
    <div style="margin-bottom:20px; padding:12px 16px; background:#e8f7ee; color:#176b3a; border-radius:8px;">
        {{ session('success') }}
    </div>
@endif

<div class="filter-pesanan">

    <div class="tab-pesanan">

    <a href="{{ route('admin.orders.index', ['status' => 'persetujuan']) }}"
       class="{{ request('status') === 'persetujuan' ? 'aktif' : '' }}">
        Menunggu Persetujuan
    </a>

    <a href="{{ route('admin.orders.index', ['status' => 'disetujui']) }}"
       class="{{ request('status') === 'disetujui' ? 'aktif' : '' }}">
        Pesanan Disetujui
    </a>

    <a href="{{ route('admin.orders.index', ['status' => 'produksi']) }}"
       class="{{ request('status') === 'produksi' ? 'aktif' : '' }}">
        Dalam Produksi
    </a>

    <a href="{{ route('admin.orders.index', ['status' => 'selesai']) }}"
       class="{{ request('status') === 'selesai' ? 'aktif' : '' }}">
        Selesai
    </a>

    <a href="{{ route('admin.orders.index', ['status' => 'riwayat']) }}"
       class="{{ request('status') === 'riwayat' ? 'aktif' : '' }}">
        Riwayat Pesanan
    </a>

</div>

    <input
        type="text"
        class="cari-pesanan"
        placeholder="Cari ID Pesanan atau Produk..."
    >

</div>

<div class="daftar-pesanan">

    @forelse($orders as $order)

        <div class="kartu-pesanan">

            <div class="atas-kartu">

                <span class="jenis-pesanan">
                    PRINTING
                </span>

                <div class="tanggal-pesanan">
                    TANGGAL PESANAN

                    <strong>
                        {{ $order->created_at->format('d M Y') }}
                    </strong>
                </div>

            </div>

            <div class="nomor-pesanan">
                #ORD-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}
            </div>

            <div class="nama-produk">
                {{ $order->product->name ?? 'Produk tidak ditemukan' }}
            </div>

            <div class="detail-produk">

                <div class="gambar-produk">

                    @if($order->product && $order->product->image)

                        <img
                            src="{{ asset('storage/' . $order->product->image) }}"
                            alt="{{ $order->product->name }}"
                        >

                    @else

                        <span>□</span>

                    @endif

                </div>

                <div class="info-produk">

                    <strong>
                        {{ $order->quantity }}x
                        {{ $order->product->name ?? 'Produk' }}
                    </strong>

                    <span>
                        {{ $order->model }} · {{ $order->color }}
                    </span>

                </div>

            </div>

            <div class="detail-pesanan">

                <div class="detail-item">

                    <small>
                        Ukuran
                    </small>

                    <strong>
                        {{ $order->size }}
                    </strong>

                </div>

                <div class="detail-item">

                    <small>
                        Jumlah
                    </small>

                    <strong>
                        {{ $order->quantity }}
                    </strong>

                </div>

                <div class="detail-item">

                    <small>
                        Model
                    </small>

                    <strong>
                        {{ $order->model }}
                    </strong>

                </div>

            </div>

            <div class="status-pesanan">

                <div>

                    @if($order->design_status === 'Disetujui')

                        <span class="status-desain status-setuju">
                            Desain Disetujui
                        </span>

                    @elseif($order->design_status === 'Ditolak')

                        <span class="status-desain status-tolak">
                            Desain Ditolak
                        </span>

                    @else

                        <span class="status-desain status-tunggu">
                            Menunggu Approval
                        </span>

                    @endif

                </div>

                <div class="status-order">
                    {{ $order->status }}
                </div>

            </div>

            <a
                href="{{ route('admin.orders.show', $order->id) }}"
                class="lihat-pesanan"
            >
                Lihat Detail →
            </a>

        </div>

    @empty

        <div class="kosong-pesanan">

            <strong>
                Belum ada pesanan
            </strong>

            Data pesanan akan muncul di halaman ini.

        </div>

    @endforelse

</div>

@endsection
