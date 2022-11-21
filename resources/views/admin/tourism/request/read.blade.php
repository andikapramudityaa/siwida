@extends('layouts.admin')

@section('body')
    <h5 class="mb-3">
        <small>
            <a href="{{ url()->previous() }}" class="text-decoration-none link-success">
                <i class="fa-solid fa-circle-chevron-left"></i>
            </a>
        </small>
        &nbsp; {{ $requestTourism->name }}
    </h5>

    <div class="card mb-3 border-0">
        <div class="row">
            <div class="col-lg-4 mb-2">
                <img src="{{ asset('storage/' . $requestTourism->image) }}"
                    class="img-fluid rounded-3 border-0 overflow-hidden" alt="img-post">
            </div>
        </div>
    </div>

    <small class="mb-3">
        <h5>
            Informasi Permintaan {{ $requestTourism->type }} Wisata
        </h5>
        <i class="fa-solid fa-user fa-fw text-success me-2"></i>
        {{ $requestTourism->user->name }}
        <br>
        <i class="fa-solid fa-phone fa-fw text-success me-2"></i>
        {{ $requestTourism->user->phoneNumber }}
        <br>
        <i class="fa-solid fa-location-dot fa-fw text-success me-2"></i>
        Desa {{ $requestTourism->village->name }}
        <br>
        <i class="fa-regular fa-calendar-days fa-fw text-success me-2"></i>
        {{ $requestTourism->daysOpen }}
        <br>
        <i class="fa-solid fa-clock fa-fw text-success me-2"></i>
        {{ $requestTourism->hoursOpen }}
        <br>
        <i class="fa-solid fa-ticket fa-fw text-success me-2"></i>
        Rp.{{ $requestTourism->fee }}
        <br>
        <i class="fa-solid fa-landmark fa-fw text-success me-2"></i>
        Fasilitas : {{ $requestTourism->facility }}
        <br>
        <i class="fa-solid fa-comment-dots fa-fw text-success me-2"></i>
        {{ $requestTourism->desc }}
    </small>
@endsection
