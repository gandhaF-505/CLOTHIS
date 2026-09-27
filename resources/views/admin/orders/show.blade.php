@extends('admin.layout')
@section('title', 'Detail Pesanan')
@section('heading', 'Detail Pesanan')
@section('content')
<div style="margin-bottom:15px;"><a class="link" href="{{ route('admin.orders.index') }}">← Kembali ke pesanan</a></div>
<div class="grid-utama" style="margin-top:0;">
    <div>
        <div class="panel">
            <div class="baris"><div><div style="color:#888;font-size:11px;text-transform:uppercase;">Kode Pesanan</div><h2 style="margin-top:5px;">{{ $code }}</h2></div><span class="badge badge-kuning">Menunggu</span></div>
            <div class="deskripsi" style="margin-top:18px;">Detail customer, produk, jumlah, pembayaran, dan desain akan ditampilkan di sini setelah data pesanan terhubung.</div>
            <div class="timeline"><div class="aktif">Pesanan</div><div>Pembayaran</div><div>Produksi</div><div>Selesai</div></div>
        </div>
    </div>
    <div class="panel">
        <h3>Update Status</h3>
        <form action="{{ route('admin.orders.action') }}" method="POST" style="margin-top:15px;">
            @csrf
            <select class="input" name="status"><option>Menunggu</option><option>Diproses</option><option>Selesai</option><option>Dibatalkan</option></select>
            <button class="tombol" style="width:100%;margin-top:10px;">Simpan Status</button>
        </form>
    </div>
</div>
@endsection
