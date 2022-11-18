@extends('layouts.admin')

@section('body')
    <x-success-alert />

    <h5 class="mb-3">Permintaan Wisata</h5>

    <div class="card bg-white shadow-sm">
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
                            <th scope="col">Jenis</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requestTourisms as $requestTourism)
                            <tr>
                                <td>{{ $requestTourism->village->name }}</td>
                                <td>{{ $requestTourism->name }}</td>
                                <td>{{ $requestTourism->daysOpen }}</td>
                                <td>{{ $requestTourism->hoursOpen }}</td>
                                <td>{{ $requestTourism->fee }}</td>
                                <td>{{ $requestTourism->type }}</td>
                                <td class="text-nowrap">
                                    <a href="/tourisms/{{ $requestTourism->slug }}"
                                        class="badge bg-success border-0 text-decoration-none me-2">
                                        <span class="fa-solid fa-eye text-white"></span>
                                    </a>
                                    <a href="/admin/tourisms/{{ $requestTourism->slug }}/edit"
                                        class="badge bg-warning border-0 text-decoration-none me-2">
                                        <span class="fa-solid fa-edit text-white"></span>
                                    </a>
                                    <form action="/admin/tourisms/{{ $requestTourism->slug }}" method="POST"
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
@endsection
