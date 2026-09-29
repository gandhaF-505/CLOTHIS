@extends('admin.layout')

@section('title', 'Detail Pesanan')
@section('heading', 'Detail Pesanan')

@section('content')

<style>
    .detail-header {
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
        margin-bottom:25px;
    }

    .detail-header h1 {
        margin:0 0 6px;
        font-size:30px;
    }

    .detail-header p {
        margin:0;
        color:#777;
        font-size:14px;
    }

    .kembali {
        color:#111;
        text-decoration:none;
        font-size:13px;
        border:1px solid #ddd;
        padding:10px 15px;
        border-radius:8px;
        background:white;
    }

    .grid-detail {
        display:grid;
        grid-template-columns:2fr 1fr;
        gap:20px;
    }

    .panel-detail {
        background:white;
        border:1px solid #ddd;
        border-radius:10px;
        padding:22px;
    }

    .panel-detail h2 {
        margin:0 0 20px;
        font-size:18px;
    }

    .produk-detail {
        display:flex;
        gap:18px;
        align-items:center;
        padding-bottom:20px;
        border-bottom:1px solid #eee;
    }

    .gambar-detail {
        width:100px;
        height:100px;
        background:#eee;
        border-radius:8px;
        overflow:hidden;
        display:flex;
        align-items:center;
        justify-content:center;
        flex-shrink:0;
    }

    .gambar-detail img {
        width:100%;
        height:100%;
        object-fit:cover;
    }

    .produk-detail h3 {
        margin:0 0 8px;
        font-size:20px;
    }

    .produk-detail p {
        margin:0;
        color:#777;
        font-size:13px;
    }

    .detail-grid {
        display:grid;
        grid-template-columns:repeat(2, 1fr);
        gap:18px;
        margin-top:22px;
    }

    .item-detail small {
        display:block;
        color:#999;
        font-size:10px;
        text-transform:uppercase;
        margin-bottom:5px;
    }

    .item-detail strong {
        font-size:14px;
    }

    .desain-box {
        margin-top:20px;
        padding-top:20px;
        border-top:1px solid #eee;
    }

    .desain-box h3 {
        margin:0 0 12px;
        font-size:15px;
    }

    .desain-box a {
        display:inline-block;
        color:#111;
        text-decoration:none;
        border:1px solid #ddd;
        padding:9px 13px;
        border-radius:7px;
        font-size:12px;
    }

    .catatan {
        margin-top:20px;
        padding:15px;
        background:#f8f8f8;
        border-radius:8px;
    }

    .catatan small {
        display:block;
        color:#888;
        font-size:10px;
        margin-bottom:7px;
        text-transform:uppercase;
    }

    .catatan p {
        margin:0;
        font-size:13px;
        line-height:1.6;
    }

    .status-list {
        display:flex;
        flex-direction:column;
        gap:15px;
    }

    .status-item {
        display:flex;
        justify-content:space-between;
        align-items:center;
        padding-bottom:15px;
        border-bottom:1px solid #eee;
    }

    .status-item:last-child {
        border-bottom:0;
        padding-bottom:0;
    }

    .status-item span {
        color:#777;
        font-size:12px;
    }

    .status-item strong {
        font-size:12px;
    }

    .badge {
        display:inline-block;
        padding:7px 11px;
        border-radius:7px;
        font-size:12px;
    }

    .hijau {
        background:#e8f7ee;
        color:#176b3a;
    }

    .merah {
        background:#fdecec;
        color:#9b1c1c;
    }

    .abu {
        background:#f0f0f0;
        color:#666;
    }

    .tombol-approval {
        margin-top:20px;
        padding-top:20px;
        border-top:1px solid #eee;
        display:flex;
        gap:10px;
    }

    .tombol-approval form {
        flex:1;
    }

    .tombol-setuju,
    .tombol-tolak,
    .tombol-selesai {
        width:100%;
        padding:12px;
        border-radius:8px;
        cursor:pointer;
        font-size:13px;
    }

    .tombol-setuju {
        background:#111;
        color:white;
        border:0;
    }

    .tombol-tolak {
        background:white;
        color:#9b1c1c;
        border:1px solid #ddd;
    }

    .tombol-selesai {
        background:#111;
        color:white;
        border:0;
    }

    .tanggal {
        margin-top:20px;
        padding-top:20px;
        border-top:1px solid #eee;
    }

    .tanggal div {
        display:flex;
        justify-content:space-between;
        margin-bottom:10px;
        font-size:12px;
    }

    .tanggal span {
        color:#888;
    }

    @media(max-width:850px) {
        .grid-detail {
            grid-template-columns:1fr;
        }
    }

    @media(max-width:600px) {
        .detail-header {
            display:block;
        }

        .kembali {
            display:inline-block;
            margin-top:15px;
        }

        .produk-detail {
            align-items:flex-start;
        }

        .detail-grid {
            grid-template-columns:1fr;
        }

        .tombol-approval {
            flex-direction:column;
        }
    }
</style>

<div class="detail-header">

    <div>

        <h1>
            #ORD-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}
        </h1>

        <p>
            Detail pesanan dan status produksi.
        </p>

    </div>

    <a
        href="{{ route('admin.orders.index') }}"
        class="kembali"
    >
        ← Kembali ke Pesanan
    </a>

</div>

@if(session('success'))

    <div style="margin-bottom:20px; padding:12px 16px; background:#e8f7ee; color:#176b3a; border-radius:8px;">
        {{ session('success') }}
    </div>

@endif

<div class="grid-detail">

    <div>

        <div class="panel-detail">

            <h2>Informasi Pesanan</h2>

            <div class="produk-detail">

                <div class="gambar-detail">

                    @if($order->product && $order->product->image)

                        <img
                            src="{{ asset('storage/' . $order->product->image) }}"
                            alt="{{ $order->product->name }}"
                        >

                    @else

                        <span>□</span>

                    @endif

                </div>

                <div>

                    <h3>
                        {{ $order->product->name ?? 'Produk tidak ditemukan' }}
                    </h3>

                    <p>
                        {{ $order->quantity }} pcs ·
                        {{ $order->color }} ·
                        {{ $order->size }}
                    </p>

                </div>

            </div>

            <div class="detail-grid">

                <div class="item-detail">

                    <small>
                        Warna
                    </small>

                    <strong>
                        {{ $order->color }}
                    </strong>

                </div>

                <div class="item-detail">

                    <small>
                        Ukuran
                    </small>

                    <strong>
                        {{ $order->size }}
                    </strong>

                </div>

                <div class="item-detail">

                    <small>
                        Model
                    </small>

                    <strong>
                        {{ $order->model }}
                    </strong>

                </div>

                <div class="item-detail">

                    <small>
                        Jumlah
                    </small>

                    <strong>
                        {{ $order->quantity }} pcs
                    </strong>

                </div>

            </div>

            <div class="desain-box">

                <h3>
                    Desain
                </h3>

                @if($order->design)

                    <a
                        href="{{ asset('storage/' . $order->design) }}"
                        target="_blank"
                    >
                        Lihat Desain
                    </a>

                @else

                    <span style="color:#999; font-size:13px;">
                        Customer tidak mengunggah desain.
                    </span>

                @endif

            </div>

            @if($order->notes)

                <div class="catatan">

                    <small>
                        Catatan Customer
                    </small>

                    <p>
                        {{ $order->notes }}
                    </p>

                </div>

            @endif

        </div>

    </div>

    <div>

        <div class="panel-detail">

            <h2>
                Status Pesanan
            </h2>

            <div class="status-list">

                <div class="status-item">

                    <span>
                        Status Desain
                    </span>

                    @if($order->design_status === 'Disetujui')

                        <span class="badge hijau">
                            Disetujui
                        </span>

                    @elseif($order->design_status === 'Ditolak')

                        <span class="badge merah">
                            Ditolak
                        </span>

                    @else

                        <span class="badge abu">
                            Menunggu Approval
                        </span>

                    @endif

                </div>

                <div class="status-item">

                    <span>
                        Status Pesanan
                    </span>

                    @if($order->status === 'Dalam Produksi')

                        <span class="badge abu">
                            Dalam Produksi
                        </span>

                    @elseif($order->status === 'Selesai')

                        <span class="badge hijau">
                            Selesai
                        </span>

                    @else

                        <strong>
                            {{ $order->status }}
                        </strong>

                    @endif

                </div>

            </div>

            @if($order->design_status === 'Menunggu Approval')

                <div class="tombol-approval">

                    <form
                        action="{{ route('admin.designs.action') }}"
                        method="POST"
                    >

                        @csrf

                        <input
                            type="hidden"
                            name="order_id"
                            value="{{ $order->id }}"
                        >

                        <input
                            type="hidden"
                            name="action"
                            value="approve"
                        >

                        <button
                            type="submit"
                            class="tombol-setuju"
                        >
                            Setujui Pesanan
                        </button>

                    </form>

                    <form
                        action="{{ route('admin.designs.action') }}"
                        method="POST"
                    >

                        @csrf

                        <input
                            type="hidden"
                            name="order_id"
                            value="{{ $order->id }}"
                        >

                        <input
                            type="hidden"
                            name="action"
                            value="reject"
                        >

                        <button
                            type="submit"
                            class="tombol-tolak"
                        >
                            Tolak Pesanan
                        </button>

                    </form>

                </div>

            @endif

            @if($order->status === 'Dalam Produksi')

                <div class="tombol-approval">

                    <form
                        action="{{ route('admin.orders.action') }}"
                        method="POST"
                    >

                        @csrf

                        <input
                            type="hidden"
                            name="order_id"
                            value="{{ $order->id }}"
                        >

                        <input
                            type="hidden"
                            name="action"
                            value="selesai"
                        >

                        <button
                            type="submit"
                            class="tombol-selesai"
                        >
                            Tandai Selesai
                        </button>

                    </form>

                </div>

            @endif

            <div class="tanggal">

                <div>

                    <span>
                        Dibuat
                    </span>

                    <strong>
                        {{ $order->created_at->format('d M Y H:i') }}
                    </strong>

                </div>

                <div>

                    <span>
                        Diperbarui
                    </span>

                    <strong>
                        {{ $order->updated_at->format('d M Y H:i') }}
                    </strong>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
