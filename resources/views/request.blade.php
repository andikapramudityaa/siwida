@extends('layouts.main')

@section('body')
    <x-success-alert />

    <div class="d-flex justify-content-center">
        <div class="col-lg-6">
            <h5>
                <small>
                    <a href="/" class="text-decoration-none">
                        <i class="fa-solid fa-circle-chevron-left link-success"></i>
                    </a>
                </small>
                &nbsp; Permintaan Wisata
            </h5>

            <small class="text-warning">
                <i class="fa-solid fa-triangle-exclamation"></i>
                Permintaan yang tidak sesuai tidak akan diterima.
            </small>

            <div class="container mb-3 card bg-white shadow-sm">
                <form action="/requestTourisms" method="POST" class="mt-3 mb-3" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-6">
                        <select class="form-select mb-3" name="type" id="type" aria-label="Jenis Permintaan"
                            autofocus required>
                            <option value="1">Permintaan Tambah Wisata</option>
                            <option value="2">Permintaan Ubah Wisata</option>
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <select class="form-select mb-3" name="village_id" id="village_id" aria-label="Select Village"
                            autofocus required>
                            @foreach ($villages as $village)
                                <option value="{{ $village->id }}">Desa {{ $village->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" maxlength="255" placeholder="Nama Wisata" value="{{ old('name') }}" required>
                        <x-form-error-message id="name" />
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">
                            Upload Gambar &nbsp;
                            <small class="text-warning d-inline">
                                <i class="fa-solid fa-circle-exclamation text-warning"></i>
                                Maksimal 1MB
                            </small>
                        </label>
                        <input class="form-control @error('image') is-invalid @enderror " type="file" id="image"
                            name="image" required onchange="previewImage()">
                        <img class="img-preview img-fluid mt-3 col-sm-5">
                        <x-form-error-message id="image" />
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control @error('daysOpen') is-invalid @enderror" name="daysOpen"
                            id="daysOpen" maxlength="255" placeholder="Hari Operasional" value="{{ old('daysOpen') }}"
                            required>
                        <x-form-error-message id="daysOpen" />
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control @error('hoursOpen') is-invalid @enderror" name="hoursOpen"
                            id="hoursOpen" maxlength="255" placeholder="Jam Operasional" value="{{ old('hoursOpen') }}"
                            required>
                        <x-form-error-message id="hoursOpen" />
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control @error('fee') is-invalid @enderror" name="fee"
                            id="fee" maxlength="255" placeholder="Biaya Masuk" value="{{ old('fee') }}" required>
                        <x-form-error-message id="fee" />
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control @error('facility') is-invalid @enderror" name="facility"
                            id="facility" maxlength="255" placeholder="Fasilitas" value="{{ old('facility') }}" required>
                        <x-form-error-message id="facility" />
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control @error('desc') is-invalid @enderror" name="desc"
                            id="desc" maxlength="255" placeholder="Keterangan" value="{{ old('desc') }}" required>
                        <x-form-error-message id="desc" />
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success me-4">
                            <i class="fa-solid fa-plus me-2"></i>
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault()
        })

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
