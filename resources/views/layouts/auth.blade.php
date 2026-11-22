<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Eliska Catering')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    @include('partials.theme')
    <style>
        body.auth-body {
            display: flex; align-items: center; min-height: 100vh; padding: 1.5rem 0;
            background: linear-gradient(135deg, #0b2a5b 0%, #1d4ed8 55%, #3b82f6 100%) fixed;
        }
        .auth-shell { max-width: 900px; border-radius: 1.5rem; overflow: hidden; box-shadow: 0 25px 60px rgba(0,0,0,.35); }
        .auth-side {
            background: linear-gradient(160deg, rgba(11,42,91,.80), rgba(29,78,216,.70)),
                        url('{{ asset('catering-services-website-template/img/background-site.jpg') }}') center/cover;
            color: #fff; padding: 2.5rem;
        }
        .auth-side .accent { color: var(--orange); }
        .auth-form { background: #fff; padding: 2.5rem; }
    </style>
</head>
<body class="auth-body">

    <div class="container">
        <div class="auth-shell row g-0 mx-auto">

            {{-- Panel kiri --}}
            <div class="col-md-5 auth-side d-none d-md-flex flex-column justify-content-center">
                <i class="bi bi-cup-hot-fill accent" style="font-size: 3.5rem;"></i>
                <h2 class="fw-bold mt-2">Eliska Catering</h2>
                <p class="opacity-75 mb-4">Hidangan lezat untuk pernikahan, rapat, dan setiap momen spesial Anda.</p>
                <div class="small opacity-75">
                    <div class="mb-2"><i class="bi bi-check-circle-fill accent"></i> Paket catering lengkap</div>
                    <div class="mb-2"><i class="bi bi-check-circle-fill accent"></i> Menu segar setiap hari</div>
                    <div><i class="bi bi-check-circle-fill accent"></i> Pesanan mudah dipantau</div>
                </div>
            </div>

            {{-- Panel form --}}
            <div class="col-md-7 auth-form">
                <div class="d-md-none text-center mb-3">
                    <i class="bi bi-cup-hot-fill text-warning fs-1"></i>
                    <h4 class="fw-bold" style="color: var(--navy)">Eliska Catering</h4>
                </div>

                @include('partials.alert')

                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>
