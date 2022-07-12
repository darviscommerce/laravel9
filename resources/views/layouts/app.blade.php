<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="/libs/bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/libs/fontawesome-pro-6/css/all.css">
    <style>
body {
    font-size: 80%;
  }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 60px;
            background-color: #00A79D;
            /*opacity: 0.5;*/
        }

        .footer>.container {
            padding-right: 15px;
            padding-left: 15px;
        }
    </style>
        @livewireStyles
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('cms.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cms.pages.list') }}">Pagina's</a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-sm btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            {{ $slot }}
        </main>
        <footer class="footer mt-auto py-3 bg-light">
            <div class="container">
                <span class="text-muted">{!! config('manta.whitelabel.copyright', '&copy; <a href="https://darvis.nl">Darvis</a>') . ' ' . date('Y') !!}</span>
            </div>
        </footer>
        <script src="/libs/bootstrap-5/js/bootstrap.min.js" defer></script>
        @stack('modals')
        @livewireScripts
    </body>
</html>
