@extends('layouts.admin')

@section('body')
    <x-success-alert />

    <div class="d-flex justify-content-center">
        <div class="col-sm-6 mb-3">
            <form action="/admin/users">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Akun..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

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
                            @if ($user->isAdmin)
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
                            @if (!$user->isAdmin)
                                <tr>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phoneNumber }}</td>
                                    <td class="text-nowrap">
                                        <form action="/admin/users/promote/{{ $user->username }}" method="POST"
                                            class="d-inline me-2">
                                            @method('put')
                                            @csrf
                                            <button type="submit" class="badge bg-success border-0"
                                                onclick="return confirm('Akun ini akan dijadikan admin, Apa anda yakin?')">
                                                <span class="fa-solid fa-chevron-up"></span>
                                            </button>
                                        </form>
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

    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>
@endsection
