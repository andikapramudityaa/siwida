@extends('layouts.main')

@section('body')
    <div class="container mt-3 mb-3">
        <h3 class="text-center fs-3 text-uppercase mt-5">Daftar Akun</h3>
        <p class="text-center text-muted mb-3">Masukan identitas anda untuk mendaftar</p>
        <div class="col d-flex justify-content-center">
            <div class="col-lg-4">
                <form action="/users" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            id="username" maxlength="30" placeholder="Nama Pengguna" autofocus required
                            value="{{ old('username') }}">
                        <x-form-error-message id="username" />
                    </div>

                    <div class="mb-3">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" maxlength="25" placeholder="Nama Lengkap" required value="{{ old('name') }}">
                        <x-form-error-message id="name" />
                    </div>

                    <div class="mb-3">
                        <input type="tel" pattern="^08[1-9][0-9]{7,10}$" minlength="10" maxlength="13"
                            name="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror"
                            id="phoneNumber" placeholder="Nomor Telepon" value="{{ old('phoneNumber') }}">
                        <x-form-error-message id="phoneNumber" />
                    </div>

                    <div class="mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" maxlength="255" placeholder="Password" required>
                        <x-form-error-message id="password" />
                    </div>

                    <button type="submit" class="btn btn-success w-100 mb-3">Daftar</button>

                    <div class="col d-flex justify-content-center">
                        <p class="text-muted">Sudah Punya Akun?&nbsp;</p>
                        <a href="/login" class="text-decoration-none text-success">Masuk</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
