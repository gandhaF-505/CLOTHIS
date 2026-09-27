@extends('admin.layout')

@section('title', 'Admin')
@section('heading', 'Admin')

@section('content')

<div class="deskripsi">
    Kelola akun admin yang memiliki akses ke sistem CLOTHIS.
</div>

@if(session('success'))
    <div style="margin-top:20px; padding:12px 16px; background:#e8f7ee; color:#176b3a; border-radius:10px;">
        {{ session('success') }}
    </div>
@endif

<div style="margin-top:20px;">
    <a href="{{ route('admin.admins.create') }}" class="tombol">
        + Tambah Admin
    </a>
</div>

<div class="panel" style="margin-top:20px;">
    <div class="tabel-box">

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($admins as $admin)

                    <tr>

                        <td>
                            #{{ $admin->id }}
                        </td>

                        <td>
                            <strong>
                                {{ $admin->name }}
                            </strong>
                        </td>

                        <td>
                            {{ $admin->email }}
                        </td>

                        <td>
                            <span class="badge badge-abu">
                                {{ $admin->role }}
                            </span>
                        </td>

                        <td>

                            <a
                                href="{{ route('admin.admins.edit', $admin->id) }}"
                                class="link"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('admin.admins.action') }}"
                                method="POST"
                                style="display:inline;"
                            >

                                @csrf

                                <input
                                    type="hidden"
                                    name="action"
                                    value="process"
                                >

                                <input
                                    type="hidden"
                                    name="admin_id"
                                    value="{{ $admin->id }}"
                                >

                                <button
                                    type="submit"
                                    class="link"
                                >
                                    Proses
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5">

                            <div class="kosong">

                                <strong>
                                    Belum ada admin
                                </strong>

                                Data admin belum tersedia.

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection
