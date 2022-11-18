@extends('layouts.main')

@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-sm-6 mb-3">
            <form action="/articles">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Wisata.." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <div class="btn-group">
            <button type="button" class="btn text-success border-0 dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                Pilih Desa
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                @foreach ($villages as $village)
                    <li>
                        <a href="/villages/{{ $village->slug }}" class="dropdown-item" type="button">
                            <i class="fa-solid fa-location-dot me-2"></i>
                            {{ $village->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="mb-3">
        <a href="/requests/create" class="text-decoration-none text-success">
            <small>
                <i class="fa-solid fa-circle-plus me-2"></i>
            </small>
            Permintaan Wisata
        </a>
    </div>

    @foreach ($tourisms as $tourism)
        <div class="card mb-3 border-0">
            <div class="row">
                <div class="col-lg-2 mb-2">
                    <img src="{{ asset('images/example.jpg') }}" class="img-fluid rounded-3 border-0 overflow-hidden"
                        alt="img-post">
                </div>
                <div class="col">
                    <div class="card-body py-0 px-1">
                        <h5 class="card-title">
                            {{ $tourism->name }}
                        </h5>
                        <small>
                            <a href="/tourisms/{{ $tourism->slug }}" class="text-decoration-none text-success">
                                Detail Wisata
                                <small>
                                    <i class="fa-solid fa-angles-right"></i>
                                </small>
                            </a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="mb-3">
        <div class="fw-bold">
            Kontak Kami
        </div>
        <i class="fa-solid fa-phone me-2"></i>
        0251-642245
        <br>
        <i class="fa-solid fa-envelope me-2"></i>
        kecleuwiliang@bogorkab.go.id
    </div>
@endsection
