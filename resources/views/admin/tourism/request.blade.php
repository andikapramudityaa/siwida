@extends('layouts.admin')

@section('body')
    <x-success-alert />

    <div class="d-flex justify-content-center">
        <div class="col-sm-6 mb-3">
            <form action="/admin/requestTourisms">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Permintaan..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <h5 class="mb-3">
        <small>
            <a href="{{ url()->previous() }}" class="text-decoration-none link-success">
                <i class="fa-solid fa-circle-chevron-left me-2"></i>
            </a>
        </small>
        Permintaan Wisata
    </h5>

    @if ($requestTourisms->count())
        <div class="card bg-white shadow-sm mb-3">
            <div class="col">
                <div class="table-responsive-sm">
                    <table class="table table-borderless text-center">
                        <thead>
                            <tr>
                                <th scope="col">Pengirim</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">Desa</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requestTourisms as $requestTourism)
                                <tr>
                                    <td>{{ $requestTourism->user->name }}</td>
                                    <td>{{ $requestTourism->user->phoneNumber }}</td>
                                    <td>{{ $requestTourism->village->name }}</td>
                                    <td>{{ $requestTourism->name }}</td>
                                    <td>{{ $requestTourism->type }}</td>
                                    <td class="text-nowrap">
                                        <a href="/admin/requestTourisms/{{ $requestTourism->slug }}"
                                            class="badge bg-success border-0 text-decoration-none me-2">
                                            <span class="fa-solid fa-eye text-white"></span>
                                        </a>
                                        <form action="/admin/requestTourisms/{{ $requestTourism->slug }}" method="POST"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="badge bg-danger border-0"
                                                onclick="return confirm('Apa Anda Yakin?')">
                                                <span class="fa-solid fa-trash"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            {{ $requestTourisms->links() }}
        </div>
    @else
        <div class="d-flex justify-content-center">
            <img src="{{ asset('images/notfound.png') }}" class="img-fluid">
        </div>

        <h5 class="text-center mb-5">Permintaan Tidak Ditemukan</h5>
    @endif
@endsection
