@extends('layouts.admin')

@section('body')
    <x-success-alert />

    <div class="d-flex justify-content-center">
        <div class="col-sm-6 mb-3">
            <form action="/admin/tourisms">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Wisata..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <h5 class="mb-3">Kelola Wisata</h5>

    <a href="/admin/tourisms/create" class="btn btn-success">
        <i class="fa-solid fa-plus me-2"></i>
        Tambah
    </a>

    <div class="d-flex justify-content-end mb-3">
        <a href="/admin/requestTourisms" class="btn btn-success position-relative">
            <i class="fa-solid fa-envelope me-2"></i>
            Permintaan Wisata
            @if ($requestTourisms->count())
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $requestTourisms->count() }}
                </span>
            @endif
        </a>
    </div>

    @if ($tourisms->count())
        <div class="card bg-white shadow-sm mb-3">
            <div class="col">
                <div class="table-responsive-sm">
                    <table class="table table-borderless text-center">
                        <thead>
                            <tr>
                                <th scope="col">Desa</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Hari Operasional</th>
                                <th scope="col">Jam Operasional</th>
                                <th scope="col">Harga Masuk</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tourisms as $tourism)
                                <tr>
                                    <td>{{ $tourism->village->name }}</td>
                                    <td>{{ $tourism->name }}</td>
                                    <td>{{ $tourism->daysOpen }}</td>
                                    <td>{{ $tourism->hoursOpen }}</td>
                                    <td>{{ $tourism->fee }}</td>
                                    <td class="text-nowrap">
                                        <a href="/tourisms/{{ $tourism->slug }}"
                                            class="badge bg-success border-0 text-decoration-none me-2">
                                            <span class="fa-solid fa-eye text-white"></span>
                                        </a>
                                        <a href="/admin/tourisms/{{ $tourism->slug }}/edit"
                                            class="badge bg-warning border-0 text-decoration-none me-2">
                                            <span class="fa-solid fa-edit text-white"></span>
                                        </a>
                                        <form action="/admin/tourisms/{{ $tourism->slug }}" method="POST" class="d-inline">
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
            {{ $tourisms->links() }}
        </div>
    @else
        <div class="d-flex justify-content-center">
            <img src="{{ asset('images/notfound.png') }}" class="img-fluid">
        </div>

        <h5 class="text-center mb-5">Wisata Tidak Ditemukan</h5>
    @endif
@endsection
