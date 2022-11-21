@extends('layouts.main')

@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-sm-6 mb-4">
            <form action="/villages/{{ $village->slug }}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Wisata Desa {{ $village->name }}..."
                        name="search" value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <h5 class="mb-3">
        <small>
            <a href="/" class="text-decoration-none link-success">
                <i class="fa-solid fa-circle-chevron-left"></i>
            </a>
        </small>
        &nbsp; Desa {{ $village->name }}
    </h5>

    @if ($tourisms->count())
        @foreach ($tourisms as $tourism)
            <div class="card mb-3 border-0">
                <div class="row">
                    <div class="col-lg-2 mb-2">
                        <img src="{{ asset('storage/' . $tourism->image) }}" class="img-fluid rounded-3 border-0"
                            alt="img-post">
                    </div>
                    <div class="col">
                        <div class="card-body py-0 px-1">
                            <h5 class="card-title">
                                {{ $tourism->name }}
                            </h5>
                            <p class="card-text">
                                <small>
                                    <i class="fa-regular fa-calendar-days text-success me-2"></i>
                                    {{ $tourism->daysOpen }}
                                    &nbsp;
                                    <i class="fa-solid fa-clock text-success me-2"></i>
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
@endsection
