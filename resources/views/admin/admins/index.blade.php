@extends('admin.layout')

@section('content')

<style>
    .halaman-admin {
        padding: 30px;
    }

    .judul-halaman {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .judul-halaman h1 {
        margin: 0;
        font-size: 28px;
        font-weight: 700;
    }

    .btn-tambah {
        background: #111;
        color: white;
        text-decoration: none;
        padding: 10px 18px;
        border-radius: 8px;
        font-size: 14px;
    }

    .btn-tambah:hover {
        background: #333;
        color: white;
    }

    .pesan-sukses {
        background: #d1e7dd;
        color: #0f5132;
        padding: 12px 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .tabel-admin {
        width: 100%;
        background: white;
        border-radius: 12px;
        overflow: hidden;
        border-collapse: collapse;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .tabel-admin th {
        background: #f5f5f5;
        padding: 15px;
        text-align: left;
        font-size: 14px;
    }

    .tabel-admin td {
        padding: 15px;
        border-top: 1px solid #eee;
        font-size: 14px;
    }

    .aksi {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .btn-edit {
        background: #ffc107;
        color: #111;
        text-decoration: none;
        padding: 8px 16px;
        border-radius: 7px;
        font-size: 13px;
    }

    .btn-edit:hover {
        background: #e0a800;
        color: #111;
    }

    .btn-hapus {
        border: none;
        background: #dc3545;
        color: white;
        padding: 8px 16px;
        border-radius: 7px;
        cursor: pointer;
        font-size: 13px;
    }

    .btn-hapus:hover {
        background: #bb2d3b;
    }

    .kosong {
        text-align: center;
        padding: 30px !important;
        color: #777;
    }

    @media (max-width: 768px) {
        .halaman-admin {
            padding: 20px;
        }

        .judul-halaman {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .tabel-admin {
            display: block;
            overflow-x: auto;
        }
    }
</style>

<div class="halaman-admin">

    <div class="judul-halaman">
        <h1>Kelola Admin</h1>

        <a href="{{ route('admin.admins.create') }}" class="btn-tambah">
            + Tambah Admin
        </a>
    </div>

    @if(session('success'))
        <div class="pesan-sukses">
            {{ session('success') }}
        </div>
    @endif

    <table class="tabel-admin">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($admins as $admin)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->role }}</td>
                    <td>
                        <div class="aksi">

                            <a
                                href="{{ route('admin.admins.edit', $admin->id) }}"
                                class="btn-edit"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('admin.admins.action') }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus admin ini?')"
                            >
                                @csrf

                                <input
                                    type="hidden"
                                    name="id"
                                    value="{{ $admin->id }}"
                                >

                                <input
                                    type="hidden"
                                    name="action"
                                    value="hapus"
                                >

                                <button type="submit" class="btn-hapus">
                                    Hapus
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="kosong">
                        Belum ada data admin.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection
