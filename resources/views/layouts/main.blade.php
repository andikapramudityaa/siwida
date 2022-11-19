<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Siwida - {{ $pageTitle }} </title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    {{-- Font Awesome Kit --}}
    <script src="https://kit.fontawesome.com/cf6a86679c.js" crossorigin="anonymous"></script>

    {{-- Separated CSS --}}
    @yield('pageCSS')
</head>

<body>
    <nav class="navbar bg-white navbar-expand-md shadow-sm mb-3">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo-kabupaten.png') }}" width="28" height="30"
                    class="d-inline-block align-text-top">
            </a>

            @guest
                <a href="/login" class="text-reset text-decoration-none">
                    <i class="fa-solid fa-right-to-bracket {{ $pageTitle === 'Masuk' ? 'text-success' : '' }}"></i>
                </a>
            @endguest

            @auth
                <form action="/logout" method="POST" class="mt-2 mb-2">
                    @csrf
                    <button class="border-0 btn nav-link" type="submit"
                        onclick="return confirm('Apa anda yakin untuk Logout?')">
                        <i class="fa-solid fa-user text-success me-2"></i>
                        {{ auth()->user()->name }}
                    </button>
                </form>
            @endauth
        </div>
    </nav>

    <div class="container">
        @yield('body')
    </div>
</body>

</html>
