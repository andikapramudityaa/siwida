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

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    {{-- Main CSS --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    {{-- Font Awesome Kit --}}
    <script src="https://kit.fontawesome.com/cf6a86679c.js" crossorigin="anonymous"></script>

    {{-- Separated CSS --}}
    @yield('head')
</head>

<body>
    <nav class="navbar bg-white navbar-expand-md shadow-sm mb-3">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo-kabupaten.png') }}" alt="Siwida" height="30" width="28">
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="fa-solid fa-bars-staggered"></span>
            </button>

            @guest
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/login">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                &nbsp; Login
                            </a>
                        </li>
                    </ul>
                </div>
            @endguest

            @auth
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-circle-user link-success"></i>
                                &nbsp; <b>{{ auth()->user()->name }}</b>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @if (auth()->user()->isAdmin)
                                    <li>
                                        <a class="dropdown-item" href="/admin/tourisms">
                                            <i class="fa-solid fa-gauge fa-fw"></i>
                                            &nbsp; Admin
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <form action="/logout" method="POST" class="mt-2 mb-2">
                                        @csrf
                                        <button class="dropdown-item" type="submit">
                                            <i class="fa-solid fa-right-from-bracket fa-fw"></i>
                                            &nbsp; Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </nav>

    <div class="container">
        @yield('body')
    </div>
</body>

</html>
