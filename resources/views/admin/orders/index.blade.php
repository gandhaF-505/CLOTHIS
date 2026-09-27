@extends('admin.layout')
@section('title', 'Kelola Pesanan')
@section('heading', 'Kelola Pesanan')
@section('content')
<div class="deskripsi">Pantau pesanan customer dan progres pengerjaan.</div>
<div class="panel" style="margin-top:20px;">
    <div class="filter"><input class="input" type="text" placeholder="Cari kode/customer..."><select class="input"><option>Semua Status</option><option>Menunggu</option><option>Diproses</option><option>Selesai</option><option>Dibatalkan</option></select></div>
    <div class="tabel-box"><table><thead><tr><th>Kode</th><th>Customer</th><th>Produk</th><th>Total</th><th>Status</th><th>Aksi</th></tr></thead><tbody>
    @forelse($orders as $o)
        <tr><td><strong>{{ $o['code'] }}</strong></td><td>{{ $o['customer'] }}</td><td>{{ $o['product'] }}</td><td>{{ $o['total'] }}</td><td><span class="badge badge-abu">{{ $o['status'] }}</span></td><td><a class="link" href="{{ route('admin.orders.show', $o['code']) }}">Detail</a></td></tr>
    @empty
        <tr><td colspan="6"><div class="kosong"><strong>Belum ada pesanan</strong>Data pesanan akan tampil setelah backend pesanan terhubung.</div></td></tr>
    @endforelse
    </tbody></table></div>
</div>
@endsection
