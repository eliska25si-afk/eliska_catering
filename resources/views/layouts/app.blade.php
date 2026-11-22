<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Eliska Catering')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    @include('partials.theme')
</head>
<body>

    @include('partials.sidebar')

    <main class="container py-4 page">

        @include('partials.alert')

        @yield('content')

    </main>

    <footer class="app-footer text-center pb-4">
        &copy; {{ date('Y') }} Eliska Catering &middot; Rasa terbaik untuk setiap acara
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
