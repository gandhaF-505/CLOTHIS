@extends('admin.layout')
@section('title', 'Dashboard')
@section('heading', 'Dashboard')
@section('content')
<div class="baris">
    <div>
        <div class="deskripsi">Ringkasan aktivitas dan pengelolaan CLOTHIS.</div>
    </div>
</div>

<div class="kartu-grid">
    @foreach($stats as $stat)
        <div class="kartu">
            <span class="kartu-icon">{{ ['box' => '□', 'shopping' => '▣', 'image' => '▧', 'card' => '▤'][$stat['icon']] }}</span>
            <div class="kartu-label">{{ $stat['label'] }}</div>
            <div class="kartu-angka">{{ $stat['value'] }}</div>
        </div>
    @endforeach
</div>

<div class="grid-utama">
    <div class="panel">
        <div class="panel-head">
            <h2>Pesanan Terbaru</h2>
            <a class="link" href="{{ route('admin.orders.index') }}">Lihat semua</a>
        </div>
        <div class="tabel-box">
            <table>
                <thead><tr><th>Kode</th><th>Customer</th><th>Total</th><th>Status</th></tr></thead>
                <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order['code'] }}</td><td>{{ $order['customer'] }}</td><td>{{ $order['total'] }}</td><td>{{ $order['status'] }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4"><div class="kosong"><strong>Belum ada pesanan</strong>Data pesanan akan tampil di sini setelah backend pesanan terhubung.</div></td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="panel">
        <h3>Aksi Cepat</h3>
        <div class="aksi-cepat">
            <a href="{{ route('admin.products.create') }}">+ Tambah Produk</a>
            <a href="{{ route('admin.orders.index') }}">Kelola Pesanan</a>
            <a href="{{ route('admin.designs.index') }}">Review Desain</a>
        </div>
    </div>
</div>
@endsection
