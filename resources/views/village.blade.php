@extends('layouts.main')

@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-lg-6 mb-4">
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

    <h5 class="mb-3">
        <a href="/" class="text-decoration-none text-success">
            <i class="fa-solid fa-circle-chevron-left me-2"></i>
        </a>
        Desa {{ $village->name }}
    </h5>

    @if ($tourisms->count())
        @foreach ($tourisms as $tourism)
            <div class="card mb-3 border-0">
                <div class="row">
                    <div class="col-lg-2 mb-2">
                        <img src="{{ asset('images/example.jpg') }}" class="img-fluid rounded-3 border-0" alt="img-post">
                    </div>
                    <div class="col">
                        <div class="card-body py-0 px-1">
                            <h5 class="card-title">
                                {{ $tourism->name }}
                            </h5>
                            <a href="/tourisms/{{ $tourism->slug }}" class="text-decoration-none text-success">
                                Detail Wisata
                                <i class="fa-solid fa-angles-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <h5>Tidak Ada Data</h5>
    @endif
@endsection
