<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>
        @if (request()->routeIs('login'))
            Login
        @elseif (request()->routeIs('register'))
            Register
        @else
            Account
        @endif
        | BINIPOS
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
        }

        .auth-page {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .auth-header {
            position: relative;
            z-index: 10;
            color: #ffffff;
            background: #0f172a;
            box-shadow: 0 6px 22px rgb(15 23 42 / 12%);
        }

        .auth-header-inner {
            display: flex;
            width: min(100% - 40px, 1370px);
            min-height: 82px;
            margin-inline: auto;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .auth-brand {
            color: #ffffff;
            font-size: 1.65rem;
            font-weight: 900;
            letter-spacing: 0.02em;
            text-decoration: none;
        }

        .auth-home-link {
            padding: 10px 16px;
            border-radius: 10px;
            color: #ffffff;
            font-weight: 700;
            text-decoration: none;
        }

        .auth-home-link:hover {
            background: #263550;
        }

        .auth-main {
            display: flex;
            flex: 1;
            align-items: center;
            padding: 56px 20px;
            background:
                radial-gradient(
                    circle at 10% 10%,
                    rgb(37 99 235 / 12%),
                    transparent 32%
                ),
                radial-gradient(
                    circle at 90% 90%,
                    rgb(14 165 233 / 10%),
                    transparent 30%
                ),
                #f4f7fb;
        }

        .auth-shell {
            display: grid;
            width: min(100%, 1060px);
            margin-inline: auto;
            overflow: hidden;
            grid-template-columns: minmax(330px, 0.9fr) minmax(420px, 1.1fr);
            border: 1px solid #dce5f1;
            border-radius: 22px;
            background: #ffffff;
            box-shadow: 0 24px 65px rgb(15 23 42 / 14%);
        }

        .auth-intro {
            display: flex;
            min-height: 540px;
            padding: 52px 44px;
            flex-direction: column;
            justify-content: space-between;
            color: #ffffff;
            background:
                linear-gradient(
                    145deg,
                    rgb(37 99 235 / 95%),
                    rgb(15 23 42 / 98%)
                );
        }

        .auth-intro-badge {
            display: inline-flex;
            width: fit-content;
            padding: 7px 12px;
            border: 1px solid rgb(255 255 255 / 25%);
            border-radius: 999px;
            color: #dbeafe;
            background: rgb(255 255 255 / 8%);
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .auth-intro h1 {
            max-width: 430px;
            margin: 24px 0 18px;
            font-size: clamp(2.4rem, 5vw, 4rem);
            line-height: 1.03;
            letter-spacing: -0.04em;
        }

        .auth-intro p {
            max-width: 410px;
            margin: 0;
            color: #dbeafe;
            font-size: 1.05rem;
            line-height: 1.7;
        }

        .auth-features {
            display: grid;
            margin: 40px 0 0;
            padding: 0;
            gap: 13px;
            list-style: none;
        }

        .auth-features li {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #e0f2fe;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .auth-feature-icon {
            display: inline-grid;
            width: 25px;
            height: 25px;
            flex: 0 0 auto;
            place-items: center;
            border-radius: 50%;
            color: #ffffff;
            background: rgb(255 255 255 / 15%);
            font-size: 0.76rem;
        }

        .auth-intro-footer {
            margin-top: 45px;
            color: #bfdbfe;
            font-size: 0.88rem;
        }

        .auth-form-panel {
            display: flex;
            min-height: 540px;
            padding: 48px;
            align-items: center;
            justify-content: center;
            background: #ffffff;
        }

        .auth-form-wrap {
            width: min(100%, 430px);
        }

        .auth-form-heading {
            margin-bottom: 28px;
        }

        .auth-form-heading span {
            display: block;
            margin-bottom: 7px;
            color: #2563eb;
            font-size: 0.78rem;
            font-weight: 900;
            letter-spacing: 0.09em;
            text-transform: uppercase;
        }

        .auth-form-heading h2 {
            margin: 0 0 9px;
            color: #111a30;
            font-size: 2rem;
            line-height: 1.15;
            letter-spacing: -0.025em;
        }

        .auth-form-heading p {
            margin: 0;
            color: #64748b;
            line-height: 1.6;
        }

        /* Breeze form components */
        .auth-form-wrap label {
            color: #334155;
            font-weight: 700;
        }

        .auth-form-wrap input[type="text"],
        .auth-form-wrap input[type="email"],
        .auth-form-wrap input[type="password"] {
            min-height: 46px;
            border-color: #cbd5e1;
            border-radius: 9px;
            color: #0f172a;
            background: #ffffff;
        }

        .auth-form-wrap input[type="text"]:focus,
        .auth-form-wrap input[type="email"]:focus,
        .auth-form-wrap input[type="password"]:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgb(37 99 235 / 14%);
        }

        .auth-form-wrap button[type="submit"] {
            border-radius: 9px;
            background: #2563eb;
        }

        .auth-form-wrap button[type="submit"]:hover {
            background: #1d4ed8;
        }

        .auth-form-wrap a {
            color: #2563eb;
            font-weight: 700;
        }

        .auth-form-wrap a:hover {
            color: #1d4ed8;
        }

        .auth-switch {
            margin-top: 28px;
            padding-top: 22px;
            border-top: 1px solid #e2e8f0;
            color: #64748b;
            text-align: center;
            font-size: 0.94rem;
        }

        .auth-switch a {
            color: #2563eb;
            font-weight: 800;
            text-decoration: none;
        }

        .auth-switch a:hover {
            text-decoration: underline;
        }

        .auth-footer {
            padding: 22px 20px;
            color: #64748b;
            background: #eaf0f9;
            text-align: center;
            font-size: 0.9rem;
        }

        @media (max-width: 850px) {
            .auth-main {
                padding: 30px 16px;
            }

            .auth-shell {
                max-width: 570px;
                grid-template-columns: 1fr;
            }

            .auth-intro {
                min-height: auto;
                padding: 36px 30px;
            }

            .auth-intro h1 {
                font-size: 2.5rem;
            }

            .auth-features,
            .auth-intro-footer {
                display: none;
            }

            .auth-form-panel {
                min-height: auto;
                padding: 38px 30px;
            }
        }

        @media (max-width: 520px) {
            .auth-header-inner {
                width: min(100% - 28px, 1370px);
            }

            .auth-main {
                padding: 20px 12px;
            }

            .auth-intro,
            .auth-form-panel {
                padding: 28px 22px;
            }

            .auth-intro h1 {
                font-size: 2.1rem;
            }

            .auth-form-heading h2 {
                font-size: 1.7rem;
            }
        }
    </style>
</head>

<body>
    <div class="auth-page">
        <header class="auth-header">
            <div class="auth-header-inner">
                <a
                    class="auth-brand"
                    href="{{ route('home') }}"
                >
                    BINIPOS
                </a>

                <a
                    class="auth-home-link"
                    href="{{ route('home') }}"
                >
                    &larr; Back to Home
                </a>
            </div>
        </header>

        <main class="auth-main">
            <div class="auth-shell">
                <section class="auth-intro">
                    <div>
                        <span class="auth-intro-badge">
                            POS account management
                        </span>

                        @if (request()->routeIs('register'))
                            <h1>Join BINIPOS</h1>

                            <p>
                                Create your secure account to manage customer
                                and user records in the POS application.
                            </p>
                        @elseif (request()->routeIs('login'))
                            <h1>Welcome back</h1>

                            <p>
                                Sign in to continue managing your customer
                                and user account records.
                            </p>
                        @else
                            <h1>Secure account access</h1>

                            <p>
                                Manage your BINIPOS account securely.
                            </p>
                        @endif

                        <ul class="auth-features">
                            <li>
                                <span class="auth-feature-icon">&#10003;</span>
                                Protected customer records
                            </li>

                            <li>
                                <span class="auth-feature-icon">&#10003;</span>
                                Secure user management
                            </li>

                            <li>
                                <span class="auth-feature-icon">&#10003;</span>
                                Session-based authentication
                            </li>
                        </ul>
                    </div>

                    <div class="auth-intro-footer">
                        Laravel Breeze authentication for BINIPOS
                    </div>
                </section>

                <section class="auth-form-panel">
                    <div class="auth-form-wrap">
                        <div class="auth-form-heading">
                            @if (request()->routeIs('register'))
                                <span>New account</span>
                                <h2>Create an account</h2>

                                <p>
                                    Complete the fields below to register.
                                </p>
                            @elseif (request()->routeIs('login'))
                                <span>Account access</span>
                                <h2>Sign in</h2>

                                <p>
                                    Enter your registered email and password.
                                </p>
                            @elseif (request()->routeIs('password.request'))
                                <span>Password assistance</span>
                                <h2>Forgot password?</h2>

                                <p>
                                    Request a password-reset link.
                                </p>
                            @elseif (request()->routeIs('password.reset'))
                                <span>Password assistance</span>
                                <h2>Reset password</h2>

                                <p>
                                    Enter and confirm your new password.
                                </p>
                            @else
                                <span>BINIPOS account</span>
                                <h2>Account verification</h2>
                            @endif
                        </div>

                        {{ $slot }}

                        @if (request()->routeIs('login'))
                            <div class="auth-switch">
                                Do not have an account?

                                <a href="{{ route('register') }}">
                                    Register here
                                </a>
                            </div>
                        @elseif (request()->routeIs('register'))
                            <div class="auth-switch">
                                Already have an account?

                                <a href="{{ route('login') }}">
                                    Sign in here
                                </a>
                            </div>
                        @endif
                    </div>
                </section>
            </div>
        </main>

        <footer class="auth-footer">
            &copy; {{ date('Y') }} BINIPOS.
            Customer and user account management system.
        </footer>
    </div>
</body>
</html>