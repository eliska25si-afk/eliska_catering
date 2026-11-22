{{-- Tema global: biru + sentuhan putih. Dipakai oleh layouts.app & layouts.auth --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    :root {
        --navy: #0b2a5b;
        --blue: #1d4ed8;
        --blue-dark: #1e40af;
        --sky: #eaf2ff;
        --orange: #fffcf8;
        --bs-primary: #1d4ed8;
        --bs-primary-rgb: 29, 78, 216;
        --bs-link-color: #1d4ed8;
        --bs-link-hover-color: #1e40af;
        --bs-body-font-family: 'Poppins', system-ui, -apple-system, 'Segoe UI', sans-serif;
    }

    body {
        font-family: var(--bs-body-font-family);
        background: linear-gradient(180deg, #dbe9ff 0, #f4f8ff 280px, #f4f8ff 100%) fixed;
        color: #1e293b;
        min-height: 100vh;
    }

    /* ---------- Navbar ---------- */
    .app-nav {
        background: linear-gradient(90deg, var(--navy), var(--blue));
        box-shadow: 0 4px 18px rgba(11, 42, 91, .25);
    }
    .app-nav .navbar-brand { font-weight: 700; letter-spacing: .3px; }
    .app-nav .navbar-brand i { color: var(--orange); }
    .app-nav .nav-link { border-radius: .6rem; padding: .45rem .8rem !important; margin: 0 .1rem; color: rgba(255,255,255,.8); }
    .app-nav .nav-link:hover { background: rgba(255,255,255,.12); color: #fff; }
    .app-nav .nav-link.active { background: rgba(255,255,255,.2); color: #fff; font-weight: 600; }

    /* ---------- Judul halaman ---------- */
    main.page h2 { color: var(--navy); font-weight: 700; margin-bottom: 1rem; }
    main.page h2::after {
        content: ''; display: block; width: 56px; height: 4px; margin-top: .35rem;
        border-radius: 4px; background: linear-gradient(90deg, var(--blue), var(--orange));
    }
    main.page h5 { color: var(--navy); font-weight: 600; }

    /* ---------- Card ---------- */
    .card {
        border: 0; border-radius: 1rem;
        box-shadow: 0 4px 18px rgba(29, 78, 216, .08);
    }

    /* ---------- Tombol ---------- */
    .btn { border-radius: .65rem; font-weight: 500; transition: all .15s; }
    .btn:hover { transform: translateY(-1px); }
    .btn-primary {
        --bs-btn-bg: var(--blue); --bs-btn-border-color: var(--blue);
        --bs-btn-hover-bg: var(--blue-dark); --bs-btn-hover-border-color: var(--blue-dark);
        --bs-btn-active-bg: var(--navy); --bs-btn-active-border-color: var(--navy);
        --bs-btn-disabled-bg: var(--blue); --bs-btn-disabled-border-color: var(--blue);
        box-shadow: 0 4px 12px rgba(29, 78, 216, .25);
    }
    .btn-secondary {
        --bs-btn-bg: #e2e8f0; --bs-btn-border-color: #e2e8f0; --bs-btn-color: #334155;
        --bs-btn-hover-bg: #cbd5e1; --bs-btn-hover-border-color: #cbd5e1; --bs-btn-hover-color: #0f172a;
    }
    .btn-warning { --bs-btn-bg: var(--orange); --bs-btn-border-color: var(--orange); --bs-btn-hover-bg: #d97706; --bs-btn-hover-border-color: #d97706; --bs-btn-color: #fff; --bs-btn-hover-color: #fff; }

    /* ---------- Form ---------- */
    .form-label { font-weight: 500; color: var(--navy); }
    .form-control, .form-select {
        border-radius: .65rem; border: 1px solid #cfdcf5; padding: .6rem .85rem;
    }
    .form-control:focus, .form-select:focus {
        border-color: var(--blue); box-shadow: 0 0 0 .25rem rgba(29, 78, 216, .15);
    }
    .input-group-text { background: var(--sky); border: 1px solid #cfdcf5; color: var(--blue); border-radius: .65rem 0 0 .65rem; }
    .input-group > .form-control { border-radius: 0 .65rem .65rem 0; }

    /* ---------- Tabel ---------- */
    .table { background: #fff; border-radius: 1rem; box-shadow: 0 4px 18px rgba(29, 78, 216, .08); --bs-table-striped-bg: #f1f6ff; --bs-table-hover-bg: #e3eeff; }
    .table-dark, .table-dark th, .table > .table-dark > tr > th {
        --bs-table-bg: transparent; color: #fff !important; border-color: transparent !important;
        background: linear-gradient(90deg, var(--navy), var(--blue)) !important;
    }
    .table th, .table td { padding: .75rem .9rem; vertical-align: middle; }
    .table-bordered > :not(caption) > * > * { border-color: #e2ebfa; }

    /* ---------- Alert & badge ---------- */
    .alert { border: 0; border-radius: .9rem; box-shadow: 0 3px 12px rgba(0, 0, 0, .06); }
    .badge { border-radius: .5rem; font-weight: 500; }

    footer.app-footer { color: #64748b; font-size: .85rem; }
</style>
