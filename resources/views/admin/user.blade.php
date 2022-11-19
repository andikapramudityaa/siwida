@extends('layouts.admin')

@section('body')
    <x-success-alert />

    <h5 class="mb-3">Kelola Akun</h5>

    <div class="card bg-white shadow-sm mb-3">
        <div class="col">
            <div class="table-responsive-sm">
                <table class="table table-borderless text-center">
                    <thead>
                        <tr>
                            <th scope="col">Nama Pengguna</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if ($user->role === 'admin')
                                <tr>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phoneNumber }}</td>
                                    <td class="text-nowrap">
                                        <a href="/admin/users/{{ $user->username }}/edit"
                                            class="badge bg-warning border-0 text-decoration-none me-2">
                                            <span class="fa-solid fa-edit text-white"></span>
                                        </a>
                                        <form action="/admin/users/{{ $user->username }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="badge bg-danger border-0"
                                                onclick="return confirm('Apa Anda Yakin?')">
                                                <span class="fa-solid fa-trash"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card bg-white shadow-sm">
        <div class="col">
            <div class="table-responsive-sm">
                <table class="table table-borderless text-center">
                    <thead>
                        <tr>
                            <th scope="col">Nama Pengguna</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if ($user->role === 'user')
                                <tr>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phoneNumber }}</td>
                                    <td class="text-nowrap">
                                        <a href="#" class="badge bg-success border-0 text-decoration-none me-2">
                                            <span class="fa-solid fa-chevron-up text-white"></span>
                                        </a>
                                        <a href="/admin/users/{{ $user->username }}/edit"
                                            class="badge bg-warning border-0 text-decoration-none me-2">
                                            <span class="fa-solid fa-edit text-white"></span>
                                        </a>
                                        <form action="/admin/users/{{ $user->username }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="badge bg-danger border-0"
                                                onclick="return confirm('Apa Anda Yakin?')">
                                                <span class="fa-solid fa-trash"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
