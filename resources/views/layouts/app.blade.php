<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="BINIPOS customer and user account management system"
    >

    <title>{{ $title ?? 'BINIPOS' }} | BINIPOS</title>

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            min-height: 100%;
        }

        body {
            min-height: 100vh;
            margin: 0;
            color: #0f172a;
            background: #f4f7fb;
            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
            font-size: 16px;
            line-height: 1.6;
        }

        a {
            color: inherit;
        }

        img {
            display: block;
            max-width: 100%;
        }

        .page-wrapper {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .container {
            width: min(100% - 40px, 1370px);
            margin-inline: auto;
        }

        /* Header and navigation */
        .site-header {
            color: #ffffff;
            background: #0f172a;
        }

        .nav-wrap {
            display: flex;
            min-height: 88px;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .brand {
            color: #ffffff;
            font-size: 1.65rem;
            font-weight: 900;
            letter-spacing: 0.02em;
            text-decoration: none;
        }

        .main-nav {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .main-nav a {
            padding: 10px 16px;
            border-radius: 10px;
            color: #ffffff;
            font-size: 1.05rem;
            font-weight: 700;
            text-decoration: none;
        }

        .main-nav a:hover,
        .main-nav a.active {
            background: #263550;
        }

        /* Main page */
        .main-content {
            flex: 1;
            padding: 72px 0;
        }

        .eyebrow {
            display: block;
            margin-bottom: 12px;
            color: #475569;
            font-weight: 600;
        }

        h1,
        h2,
        h3,
        p {
            margin-top: 0;
        }

        h1 {
            margin-bottom: 18px;
            color: #111a30;
            font-size: clamp(2.6rem, 6vw, 4.6rem);
            line-height: 1.05;
            letter-spacing: -0.04em;
        }

        h2 {
            color: #111a30;
        }

        .lead {
            max-width: 760px;
            color: #58708f;
            font-size: 1.1rem;
        }

        /* General buttons */
        .button {
            display: inline-flex;
            min-height: 48px;
            padding: 11px 20px;
            border: 1px solid #2563eb;
            border-radius: 11px;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            background: #2563eb;
            font: inherit;
            font-weight: 800;
            line-height: 1.2;
            text-decoration: none;
            cursor: pointer;
        }

        .button:hover {
            border-color: #1d4ed8;
            background: #1d4ed8;
        }

        .button-secondary {
            border-color: #cbd5e1;
            color: #1e3a5f;
            background: #ffffff;
        }

        .button-secondary:hover {
            border-color: #94a3b8;
            color: #0f172a;
            background: #f8fafc;
        }

        .page-actions {
            display: flex;
            margin-bottom: 24px;
            justify-content: flex-end;
            gap: 12px;
        }

        /* Status and validation messages */
        .alert {
            margin-bottom: 24px;
            padding: 14px 18px;
            border: 1px solid;
            border-radius: 10px;
        }

        .alert-success {
            border-color: #86efac;
            color: #166534;
            background: #dcfce7;
        }

        .alert-error {
            border-color: #fca5a5;
            color: #991b1b;
            background: #fee2e2;
        }

        .alert ul {
            margin: 8px 0 0;
            padding-left: 22px;
        }

        /* Account tables */
        .table-shell {
            overflow-x: auto;
            margin-top: 32px;
            border: 1px solid #dce5f1;
            border-radius: 16px;
            background: #ffffff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 18px 20px;
            border-bottom: 1px solid #dce5f1;
            text-align: left;
            vertical-align: middle;
        }

        th {
            color: #334155;
            background: #f8fafc;
            font-weight: 800;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        tbody tr:hover {
            background: #f8fbff;
        }

        .table-avatar {
            width: 52px;
            height: 52px;
            object-fit: cover;
            border: 2px solid #dbeafe;
            border-radius: 50%;
            background: #dbeafe;
        }

        .action-link {
            color: #2563eb;
            font-weight: 700;
            text-decoration: none;
        }

        .action-link:hover {
            text-decoration: underline;
        }

        /* Create and edit form layout */
        .form-shell {
            display: grid;
            grid-template-columns:
                minmax(240px, 0.75fr)
                minmax(420px, 1.25fr);
            align-items: start;
            gap: 42px;
        }

        .form-intro {
            padding: 24px 0;
        }

        .form-intro h1 {
            margin-bottom: 20px;
        }

        .form-intro p {
            max-width: 440px;
            margin-bottom: 24px;
            color: #58708f;
            font-size: 1.05rem;
        }

        .form-card {
            padding: 32px;
            border: 1px solid #dce5f1;
            border-radius: 16px;
            background: #ffffff;
            box-shadow: 0 12px 32px rgb(15 23 42 / 8%);
        }

        .form-card h2 {
            margin: 0 0 26px;
            font-size: 1.55rem;
        }

        .field {
            margin-bottom: 22px;
        }

        .field label {
            display: block;
            margin-bottom: 8px;
            color: #14213d;
            font-weight: 700;
        }

        .field label span {
            color: #dc2626;
        }

        .field input[type="text"],
        .field input[type="email"],
        .field input[type="file"] {
            display: block;
            width: 100%;
            min-height: 46px;
            padding: 11px 13px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            color: #0f172a;
            background: #ffffff;
            font: inherit;
        }

        .field input[type="file"] {
            padding: 9px;
        }

        .field input:focus {
            border-color: #2563eb;
            outline: 3px solid rgb(37 99 235 / 15%);
        }

        .field small {
            display: block;
            margin-top: 7px;
            color: #64748b;
            font-size: 0.88rem;
            line-height: 1.4;
        }

        .field .field-error {
            color: #dc2626;
            font-weight: 700;
        }

        .form-actions {
            display: flex;
            margin-top: 30px;
            justify-content: flex-end;
            gap: 12px;
        }

        .back-link {
            display: inline-block;
            color: #2563eb;
            font-weight: 700;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        /* Avatar field on user edit page */
        .avatar-field {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .avatar-input {
            width: 100%;
        }

        .avatar-preview {
            width: 120px;
            height: 120px;
            flex: 0 0 auto;
            object-fit: cover;
            border: 4px solid #dbeafe;
            border-radius: 50%;
            background: #dbeafe;
        }

        /* Footer */
        .site-footer {
            padding: 28px 0;
            color: #58708f;
            background: #eaf0f9;
        }

        /* Mobile layout */
        @media (max-width: 800px) {
            .container {
                width: min(100% - 28px, 1370px);
            }

            .nav-wrap {
                padding: 16px 0;
                align-items: flex-start;
                flex-direction: column;
                gap: 12px;
            }

            .main-nav {
                width: 100%;
                overflow-x: auto;
            }

            .main-nav a {
                padding: 8px 12px;
                white-space: nowrap;
            }

            .main-content {
                padding: 44px 0;
            }

            .form-shell {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .form-intro {
                padding: 0;
            }

            .form-card {
                padding: 24px;
            }

            .avatar-field {
                align-items: flex-start;
                flex-direction: column;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .form-actions .button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <header class="site-header">
            <div class="container nav-wrap">
                <a
                    class="brand"
                    href="{{ route('home') }}"
                >
                    BINIPOS
                </a>

                <nav
                    class="main-nav"
                    aria-label="Main navigation"
                >
                    <a
                        href="{{ route('home') }}"
                        class="{{ request()->routeIs('home')
                            ? 'active'
                            : '' }}"
                    >
                        Home
                    </a>

                    <a
                        href="{{ route('about') }}"
                        class="{{ request()->routeIs('about')
                            ? 'active'
                            : '' }}"
                    >
                        About
                    </a>

                    <a
                        href="{{ route('customers.index') }}"
                        class="{{ request()->routeIs('customers.*')
                            ? 'active'
                            : '' }}"
                    >
                        Customers
                    </a>

                    <a
                        href="{{ route('users.index') }}"
                        class="{{ request()->routeIs('users.*')
                            ? 'active'
                            : '' }}"
                    >
                        Users
                    </a>
                </nav>
            </div>
        </header>

        <main class="main-content">
            <div class="container">
                @if (session('success'))
                    <div
                        class="alert alert-success"
                        role="status"
                    >
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div
                        class="alert alert-error"
                        role="alert"
                    >
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>

        <footer class="site-footer">
            <div class="container">
                &copy; {{ date('Y') }} BINIPOS
            </div>
        </footer>
    </div>
</body>
</html>