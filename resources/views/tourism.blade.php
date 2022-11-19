@extends('layouts.main')

@section('body')
    <h5 class="mb-3">
        <small>
            <a href="{{ url()->previous() }}" class="text-decoration-none text-success">
                <i class="fa-solid fa-circle-chevron-left me-2"></i>
            </a>
        </small>
        {{ $tourism->name }} <br>
        <br>
        {{ $tourism->village->name }} <br>
        {{ $tourism->daysOpen }} <br>
        {{ $tourism->hoursOpen }} <br>
        {{ $tourism->fee }} <br>

        <div class="mt-3 mb-3">
            <img src="{{ asset('storage/' . $tourism->image) }}" class="img-fluid rounded card-img-top" alt="Gambar Artikel">
        </div>
    </h5>
@endsection
