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
        <a href="{{ url()->previous() }}" class="text-decoration-none text-success">
            <i class="fa-solid fa-circle-chevron-left me-2"></i>
        </a>
        {{ $tourism->name }} <br>
        {{ $village->name }} <br>
        {{ $tourism->daysOpen }} <br>
        {{ $tourism->hoursOpen }} <br>
        {{ $tourism->fee }} <br>

        <div class="mt-3 mb-3">
            <img src="{{ asset('storage/' . $tourism->image) }}" class="img-fluid rounded card-img-top"
                alt="Gambar Artikel">
        </div>
    </h5>
@endsection
