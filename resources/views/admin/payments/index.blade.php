@extends('admin.layout')

@section('title', 'Pembayaran')
@section('heading', 'Pembayaran')

@section('content')
<div class="deskripsi">
    Verifikasi pembayaran dan pantau status transaksi.
</div>

@if(session('success'))
    <div style="margin-top:20px; padding:12px 16px; background:#e8f7ee; color:#176b3a; border-radius:10px;">
        {{ session('success') }}
    </div>
@endif

<div class="panel" style="margin-top:20px;">
    <div class="tabel-box">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pesanan</th>
                    <th>Produk</th>
                    <th>Metode</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($payments as $payment)
                    <tr>
                        <td>
                            <strong>#{{ $payment->id }}</strong>
                        </td>

                        <td>
                            #{{ $payment->order_id }}
                        </td>

                        <td>
                            {{ $payment->order?->product?->name ?? '-' }}
                        </td>

                        <td>
                            {{ $payment->method }}
                        </td>

                        <td>
                            Rp {{ number_format($payment->amount, 0, ',', '.') }}
                        </td>

                        <td>
                            <span class="badge badge-abu">
                                {{ $payment->status }}
                            </span>
                        </td>

                        <td>
                            @if($payment->status !== 'Berhasil')
                                <form action="{{ route('admin.payments.action') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="payment_id" value="{{ $payment->id }}">

                                    <button type="submit" class="link">
                                        Verifikasi
                                    </button>
                                </form>
                            @else
                                <span style="color:#198754;">
                                    Sudah Diverifikasi
                                </span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <div class="kosong">
                                <strong>Belum ada pembayaran</strong>
                                Data pembayaran belum tersedia di database.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
