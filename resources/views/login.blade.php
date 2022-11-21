@extends('layouts.main')

@section('body')
    <x-success-alert />

    @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <i class="fa-solid fa-circle-xmark me-2"></i> {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/" class="link-success text-decoration-none">
                    <i class="fa-solid fa-house"></i>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Login
            </li>
        </ol>
    </nav>

    <h5 class="text-center fs-4 text-uppercase mt-5">Login Akun</h5>
    <p class="text-center text-muted mb-3">Masukan identitas anda untuk melanjutkan</p>

    <div class="col d-flex justify-content-center">
        <div class="col-lg-4">
            <form action="/validate" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                        id="username" maxlength="30" placeholder="Nama Pengguna" autofocus required
                        value="{{ old('username') }}">
                    <x-form-error-message id="username" />
                </div>

                <div class="mb-4">
                    <input type="password" name="password" class="form-control" id="password" maxlength="255"
                        placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-success w-100 mb-3">Masuk</button>

                <div class="col d-flex justify-content-center">
                    <p class="text-muted">Belum Punya Akun?&nbsp;</p>
                    <a href="/users/create" class="text-decoration-none text-success">Daftar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
