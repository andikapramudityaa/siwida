@extends('layouts.admin')

@section('body')
    <div class="d-flex justify-content-center">
        <div class="col-lg-6">
            <h5 class="mb-3">
                <small>
                    <a href="{{ url()->previous() }}" class="text-decoration-none">
                        <i class="fa-solid fa-circle-chevron-left text-success"></i>
                    </a>
                </small>
                &nbsp; Perbarui Akun
            </h5>
            <div class="container mb-3 card bg-white shadow-sm">
                <form action="/admin/users/{{ $user->username }}" method="POST" class="mt-3 mb-3"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" maxlength="25" placeholder="Nama Lengkap" required
                            value="{{ old('name', $user->name) }}">
                        <x-form-error-message id="name" />
                    </div>

                    <div class="mb-3">
                        <input type="tel" pattern="^08[1-9][0-9]{7,10}$" minlength="10" maxlength="13"
                            name="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror"
                            id="phoneNumber" placeholder="Nomor Telepon"
                            value="{{ old('phoneNumber', $user->phoneNumber) }}" required>
                        <x-form-error-message id="phoneNumber" />
                    </div>

                    <button type="submit" class="btn btn-success me-4">
                        <i class="fa-solid fa-edit me-2"></i>
                        Ubah
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
