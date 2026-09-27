@extends('admin.layout')
@section('title', 'Approval Desain')
@section('heading', 'Approval Desain')
@section('content')
<div class="deskripsi">Periksa desain customer sebelum pesanan masuk proses produksi.</div>
<div class="kartu-grid" style="grid-template-columns:repeat(3,minmax(0,1fr));">
@forelse($designs as $d)
    <div class="panel">
        <div class="baris"><div><strong>{{ $d['code'] }}</strong><div class="deskripsi">{{ $d['customer'] }}</div></div><span class="badge badge-kuning">{{ $d['status'] }}</span></div>
        <div style="margin-top:15px;min-height:170px;display:grid;place-items:center;background:#f1f1f1;border-radius:7px;color:#aaa;">▧</div>
        <div class="deskripsi">File: {{ $d['file'] }}</div>
        <form action="{{ route('admin.designs.action') }}" method="POST" class="aksi" style="margin-top:13px;">
            @csrf
            <button type="submit" class="tombol tombol-merah">Tolak</button><button type="submit" class="tombol">Setujui</button>
        </form>
    </div>
@empty
    <div class="panel" style="grid-column:1/-1;"><div class="kosong"><strong>Belum ada desain untuk direview</strong>Data desain customer akan tampil di sini.</div></div>
@endforelse
</div>
@endsection
