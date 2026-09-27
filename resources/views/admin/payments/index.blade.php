@extends('admin.layout')
@section('title', 'Pembayaran')
@section('heading', 'Pembayaran')
@section('content')
<div class="deskripsi">Verifikasi pembayaran dan pantau status transaksi.</div>
<div class="panel" style="margin-top:20px;"><div class="tabel-box"><table><thead><tr><th>Kode</th><th>Pesanan</th><th>Customer</th><th>Metode</th><th>Jumlah</th><th>Status</th><th>Aksi</th></tr></thead><tbody>
@forelse($payments as $p)
<tr><td><strong>{{ $p['code'] }}</strong></td><td>{{ $p['order'] }}</td><td>{{ $p['customer'] }}</td><td>{{ $p['method'] }}</td><td>{{ $p['amount'] }}</td><td><span class="badge badge-abu">{{ $p['status'] }}</span></td><td><form action="{{ route('admin.payments.action') }}" method="POST">@csrf<button class="link">Verifikasi</button></form></td></tr>
@empty
<tr><td colspan="7"><div class="kosong"><strong>Belum ada pembayaran</strong>Data pembayaran akan tampil setelah backend transaksi terhubung.</div></td></tr>
@endforelse
</tbody></table></div></div>
@endsection
