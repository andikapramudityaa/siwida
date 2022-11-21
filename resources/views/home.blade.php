@extends('layouts.main')

@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-sm-6 mb-3">
            <form action="/">
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

    <div class="d-flex justify-content-end">
        <div class="btn-group">
            <button type="button" class="btn link-success border-0 dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                Desa
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                @foreach ($villages as $village)
                    <li>
                        <a href="/villages/{{ $village->slug }}" class="dropdown-item" type="button">
                            <i class="fa-solid fa-location-dot fa-fw me-2"></i>
                            {{ $village->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="mb-3">
        <a href="/requestTourisms/create" class="text-decoration-none link-success">
            <small>
                <i class="fa-solid fa-circle-plus me-2"></i>
            </small>
            Permintaan Wisata
        </a>
    </div>

    @if ($tourisms->count())
        @foreach ($tourisms as $tourism)
            <div class="card mb-3 border-0">
                <div class="row">
                    <div class="col-lg-2 mb-2">
                        <img src="{{ asset('storage/' . $tourism->image) }}"
                            class="img-fluid rounded-3 border-0 overflow-hidden" alt="img-post">
                    </div>
                    <div class="col">
                        <div class="card-body py-0 px-1">
                            <h5 class="card-title">
                                {{ $tourism->name }}
                            </h5>
                            <p class="card-text">
                                <small>
                                    <i class="fa-solid fa-location-dot fa-fw text-success me-2"></i>
                                    Desa {{ $tourism->village->name }}
                                    &nbsp;
                                    <i class="fa-regular fa-calendar-days fa-fw text-success me-2"></i>
                                    {{ $tourism->daysOpen }}
                                    &nbsp;
                                    <i class="fa-solid fa-clock fa-fw text-success me-2"></i>
                                    {{ $tourism->hoursOpen }}
                                    <br>
                                    <a href="/tourisms/{{ $tourism->slug }}" class="text-decoration-none link-success">
                                        Detail Wisata
                                        <small>
                                            <i class="fa-solid fa-angles-right"></i>
                                        </small>
                                    </a>
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-center">
            {{ $tourisms->links() }}
        </div>
    @else
        <div class="d-flex justify-content-center">
            <img src="{{ asset('images/notfound.png') }}" class="img-fluid">
        </div>

        <h5 class="text-center mb-3">Wisata Tidak Ditemukan</h5>
    @endif

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
