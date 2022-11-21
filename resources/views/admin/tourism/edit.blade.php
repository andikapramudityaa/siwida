@extends('layouts.admin')

@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-lg-6">
            <h5 class="mb-3">
                <small>
                    <a href="/admin/tourisms" class="text-decoration-none">
                        <i class="fa-solid fa-circle-chevron-left text-success"></i>
                    </a>
                </small>
                &nbsp; Ubah Wisata
            </h5>
            <div class="container mb-3 card bg-white shadow-sm">
                <form action="/admin/tourisms/{{ $tourism->slug }}" method="POST" class="mt-3 mb-3"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col-sm-6">
                        <select class="form-select mb-3" name="village_id" id="village_id" aria-label="Select Village"
                            autofocus required>
                            @foreach ($villages as $village)
                                <option value="{{ $village->id }}"
                                    {{ $tourism->village->id === $village->id ? 'selected' : '' }}>
                                    Desa {{ $village->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" maxlength="255" placeholder="Nama Wisata"
                            value="{{ old('name', $tourism->name) }}" required>
                        <x-form-error-message id="name" />
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">
                            Upload Gambar &nbsp;
                            <small class="text-danger d-inline">*Maksimal 1MB</small>
                        </label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                            name="image" onchange="previewImage()">
                        <input type="hidden" name="oldImage" value="{{ $tourism->image }}">
                        @if ($tourism->image)
                            <img src="{{ asset('storage/' . $tourism->image) }}"
                                class="img-preview img-fluid mt-3 col-sm-5 d-block">
                        @else
                            <img class="img-preview img-fluid mt-3 col-sm-5">
                        @endif
                        <x-form-error-message id="image" />
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control @error('daysOpen') is-invalid @enderror" name="daysOpen"
                            id="daysOpen" maxlength="255" placeholder="Hari Operasional"
                            value="{{ old('daysOpen', $tourism->daysOpen) }}" required>
                        <x-form-error-message id="daysOpen" />
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control @error('hoursOpen') is-invalid @enderror" name="hoursOpen"
                            id="hoursOpen" maxlength="255" placeholder="Jam Operasional"
                            value="{{ old('hoursOpen', $tourism->hoursOpen) }}" required>
                        <x-form-error-message id="hoursOpen" />
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control @error('fee') is-invalid @enderror" name="fee"
                            id="fee" maxlength="255" placeholder="Biaya Masuk" value="{{ old('fee', $tourism->fee) }}"
                            required>
                        <x-form-error-message id="fee" />
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control @error('facility') is-invalid @enderror" name="facility"
                            id="facility" maxlength="255" placeholder="Fasilitas"
                            value="{{ old('facility', $tourism->facility) }}" required>
                        <x-form-error-message id="facility" />
                    </div>

                    <div class="mb-3">
                        <input type="number" step="any" class="form-control @error('lat') is-invalid @enderror"
                            name="lat" id="lat" placeholder="Koordinat (Latitude)"
                            value="{{ old('lat', $tourism->lat) }}" required>
                        <x-form-error-message id="lat" />
                    </div>

                    <div class="mb-3">
                        <input type="number" step="any" class="form-control @error('lng') is-invalid @enderror"
                            name="lng" id="lng" placeholder="Koordinat (Longitude)"
                            value="{{ old('lng', $tourism->lng) }}" required>
                        <x-form-error-message id="lng" />
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success me-4">
                            <i class="fa-solid fa-edit me-2"></i>
                            Ubah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
