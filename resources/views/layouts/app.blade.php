<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>{{ $title ?? 'BINIPOS' }} | BINIPOS</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            color: #172033;
            background: #f4f7fb;
            font-family:
                system-ui,
                -apple-system,
                "Segoe UI",
                sans-serif;
        }

        .container {
            width: min(1100px, calc(100% - 2rem));
            margin-inline: auto;
        }

        header {
            color: white;
            background: #0f172a;
        }

        nav {
            min-height: 70px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        nav a {
            padding: 0.55rem 0.75rem;
            color: #cbd5e1;
            border-radius: 0.5rem;
            font-weight: 600;
            text-decoration: none;
        }

        nav a:hover,
        nav a.active {
            color: white;
            background: #26334b;
        }

        .brand {
            margin-right: auto;
            color: white;
            font-size: 1.3rem;
            font-weight: 800;
        }

        main {
            min-height: calc(100vh - 140px);
            padding-block: 3rem;
        }

        h1 {
            margin: 0 0 1rem;
            font-size: clamp(2.25rem, 6vw, 4rem);
        }

        p {
            color: #64748b;
        }

        .hero {
            max-width: 720px;
            padding-block: 3rem;
        }

        .button {
            display: inline-flex;
            margin: 0.5rem 0.5rem 0 0;
            padding: 0.7rem 1rem;
            color: white;
            background: #2563eb;
            border-radius: 0.6rem;
            font-weight: 700;
            text-decoration: none;
        }

        .table-wrapper {
            overflow-x: auto;
            margin-top: 2rem;
            background: white;
            border: 1px solid #dfe6f0;
            border-radius: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 1rem;
            border-bottom: 1px solid #dfe6f0;
            text-align: left;
        }

        th {
            color: #475569;
            background: #f8fafc;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        footer {
            min-height: 70px;
            display: flex;
            align-items: center;
            color: #64748b;
            background: #e9eef6;
        }
    </style>
</head>

<body>
    <header>
        <nav class="container">
            <a class="brand" href="{{ route('home') }}">
                BINIPOS
            </a>

            <a
                href="{{ route('home') }}"
                class="{{ request()->routeIs('home') ? 'active' : '' }}"
            >
                Home
            </a>

            <a
                href="{{ route('about') }}"
                class="{{ request()->routeIs('about') ? 'active' : '' }}"
            >
                About
            </a>

            <a
                href="{{ route('customers.index') }}"
                class="{{
                    request()->routeIs('customers.*')
                        ? 'active'
                        : ''
                }}"
            >
                Customers
            </a>

            <a
                href="{{ route('users.index') }}"
                class="{{
                    request()->routeIs('users.*')
                        ? 'active'
                        : ''
                }}"
            >
                Users
            </a>
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        <div class="container">
            &copy; {{ date('Y') }} BINIPOS
        </div>
    </footer>
</body>
</html>