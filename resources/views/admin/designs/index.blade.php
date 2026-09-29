@extends('admin.layout')

@section('title', 'Review Desain')
@section('heading', 'Review Desain')

@section('content')

<div class="deskripsi">
    Desain customer yang menunggu persetujuan admin.
</div>

@if(session('success'))
    <div style="margin-top:20px; padding:12px 16px; background:#e8f7ee; color:#176b3a; border-radius:10px;">
        {{ session('success') }}
    </div>
@endif

<div class="panel" style="margin-top:20px;">

    <div class="panel-head">
        <h2>Desain Menunggu Approval</h2>

        <span style="font-size:12px; color:#777;">
            {{ $designs->count() }} Desain
        </span>
    </div>

    <div class="tabel-box">
        <table>
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Warna</th>
                    <th>Ukuran</th>
                    <th>Model</th>
                    <th>Jumlah</th>
                    <th>Desain</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($designs as $design)

                    <tr>

                        <td>
                            <strong>
                                {{ $design->product->name }}
                            </strong>
                        </td>

                        <td>
                            {{ $design->color }}
                        </td>

                        <td>
                            {{ $design->size }}
                        </td>

                        <td>
                            {{ $design->model }}
                        </td>

                        <td>
                            {{ $design->quantity }}
                        </td>

                        <td>

                            @if($design->design)

                                <a
                                    href="{{ asset('storage/' . $design->design) }}"
                                    target="_blank"
                                    class="link"
                                >
                                    Lihat Desain
                                </a>

                            @else

                                <span style="color:#999;">
                                    Tidak ada desain
                                </span>

                            @endif

                        </td>

                        <td>

                            <span class="badge badge-abu">
                                {{ $design->design_status }}
                            </span>

                        </td>

                        <td>

                            <div style="display:flex; gap:8px;">

                                <form
                                    action="{{ route('admin.designs.action') }}"
                                    method="POST"
                                >

                                    @csrf

                                    <input
                                        type="hidden"
                                        name="order_id"
                                        value="{{ $design->id }}"
                                    >

                                    <input
                                        type="hidden"
                                        name="action"
                                        value="approve"
                                    >

                                    <button
                                        type="submit"
                                        class="tombol"
                                    >
                                        Setujui
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
                                        value="{{ $design->id }}"
                                    >

                                    <input
                                        type="hidden"
                                        name="action"
                                        value="reject"
                                    >

                                    <button
                                        type="submit"
                                        style="padding:8px 12px; border:1px solid #ddd; background:white; border-radius:8px; cursor:pointer;"
                                    >
                                        Tolak
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8">

                            <div class="kosong">

                                <strong>Belum ada desain</strong>

                                Desain customer yang menunggu approval
                                akan tampil di sini.

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>

</div>

@endsection
