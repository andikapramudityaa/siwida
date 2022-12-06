@extends('layouts.main')

@section('head')
    <style>
        .map_canvas {
            background: none !important;
            height: 256px;
        }
    </style>

    {{-- Leaflet JS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
        integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
        integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
    {{-- Leaflet Plugin --}}

    <link rel="stylesheet" href="{{ asset('leaflet-plugin/css/leaflet.extra-markers.min.css') }}">
    <script src="{{ asset('leaflet-plugin/js/leaflet.extra-markers.min.js') }}"></script>
@endsection

@section('body')
    <h5 class="mb-3">
        <small>
            <a href="{{ url()->previous() }}" class="text-decoration-none link-success">
                <i class="fa-solid fa-circle-chevron-left"></i>
            </a>
        </small>
        &nbsp; {{ $tourism->name }}
    </h5>

    <div class="card mb-3 border-0">
        <div class="row">
            <div class="col-lg-4 mb-2">
                <img src="{{ asset('storage/' . $tourism->image) }}" class="img-fluid rounded-3 border-0 overflow-hidden"
                    alt="img-post">
            </div>
            <div class="col">
                <div class="card-body py-0 px-1">
                    <small>
                        <h5>Informasi</h5>
                    </small>
                    <small class="card-text">
                        <i class="fa-solid fa-location-dot fa-fw text-success"></i>
                        &nbsp; Desa {{ $tourism->village->name }}
                        <br>
                        <i class="fa-regular fa-calendar-days fa-fw text-success"></i>
                        &nbsp; {{ $tourism->daysOpen }}
                        <br>
                        <i class="fa-solid fa-clock fa-fw text-success"></i>
                        &nbsp; {{ $tourism->hoursOpen }}
                        <br>
                        <i class="fa-solid fa-ticket fa-fw text-success"></i>
                        &nbsp; Rp.{{ $tourism->fee }}
                        <br>
                        <i class="fa-solid fa-landmark fa-fw text-success"></i>
                        &nbsp; Fasilitas : {{ $tourism->facility }}
                    </small>
                </div>
            </div>
        </div>
    </div>

    <h5>Peta Wisata</h5>

    <div class="map_canvas overflow-hidden mb-3">
        <div id="map" class="rounded h-100"></div>
    </div>

    <script>
        // Initialize Map
        var map = L.map('map', {
            center: [{{ $tourism->lat }}, {{ $tourism->lng }}],
            zoomControl: false,
            zoom: 13,
            minZoom: 12,
        });

        // Add Layer to Map
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        L.control.zoom({
            position: 'bottomright'
        }).addTo(map);

        // Add Marker to Map
        var mapsMarker = L.ExtraMarkers.icon({
            icon: 'fa-seedling',
            markerColor: 'green',
            shape: 'circle',
            prefix: 'fa'
        });

        var gmapsQuery = "{{ str_replace(' ', '%20', $tourism->name) }}"

        var marker = L.marker([{{ $tourism->lat }}, {{ $tourism->lng }}], {
            icon: mapsMarker
        }).addTo(map);

        // Add Popup for Marker
        var popupContent =
            '<b>{{ $tourism->name }}</b> <br> <a href="https://maps.google.com/maps?q=' + gmapsQuery +
            '%20leuwiliang" class="text-decoration-none link-success">Buka di Google Maps</a>'

        marker.bindPopup(popupContent).openPopup();
    </script>
@endsection
