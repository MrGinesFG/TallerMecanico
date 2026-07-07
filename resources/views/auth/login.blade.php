<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | Monkey Motors</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com">

    <style>
        :root {
            --green: #2E6F47;
            --green-dark: #1F4D32;
            --brown: #6B4A35;
            --brown-dark: #4A3327;
            --cream: #FBF8F2;
            --cream-2: #F1EBDD;
            --yellow: #F2B705;
            --white: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #06100b;
            color: var(--white);
            min-height: 100vh;
        }

        a {
            text-decoration: none;
        }

        .auth-wrapper {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .auth-left {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 20% 20%, rgba(242, 183, 5, 0.18), transparent 28%),
                radial-gradient(circle at 85% 85%, rgba(107, 74, 53, 0.60), transparent 35%),
                linear-gradient(135deg, #1F4D32 0%, #2E6F47 52%, #6B4A35 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 70px;
        }

        .auth-left::before {
            content: "";
            position: absolute;
            inset: 0;
            background: repeating-linear-gradient(
                -45deg,
                rgba(251, 248, 242, 0.08) 0px,
                rgba(251, 248, 242, 0.08) 20px,
                transparent 20px,
                transparent 44px
            );
        }

        .auth-brand {
            position: relative;
            z-index: 1;
            max-width: 500px;
        }

        .logo-box {
            width: 300px;
            height: 300px;
            background: var(--white);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
            box-shadow: 0 24px 55px rgba(0, 0, 0, 0.25);
        }

        .logo-box img {
            max-width: 500px;
            max-height: 500px;
            object-fit: contain;
        }

        .badge {
            display: inline-block;
            font-family: 'IBM Plex Mono', monospace;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            color: var(--yellow);
            border: 1px solid rgba(242, 183, 5, 0.70);
            background: rgba(31, 77, 50, 0.45);
            padding: 8px 18px;
            border-radius: 999px;
            margin-bottom: 28px;
        }

        .auth-brand h1 {
            font-family: 'Poppins', sans-serif;
            color: var(--white);
            font-size: clamp(3.3rem, 5vw, 5rem);
            line-height: 1;
            font-weight: 800;
            margin-bottom: 24px;
        }

        .auth-brand h1 span {
            color: var(--yellow);
        }

        .auth-brand p {
            color: var(--cream);
            max-width: 470px;
            font-size: 1.08rem;
            line-height: 1.7;
        }

        .dots {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-top: 42px;
        }

        .dots span {
            width: 11px;
            height: 11px;
            border-radius: 999px;
            background: rgba(251, 248, 242, 0.35);
        }

        .dots .active {
            width: 58px;
            background: var(--yellow);
        }

        .auth-right {
            background: #06100b;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 45px;
        }

        .auth-card {
            width: 100%;
            max-width: 500px;
            background: #0b1710;
            border: 1px solid rgba(241, 235, 221, 0.16);
            border-radius: 26px;
            padding: 50px;
            box-shadow: 0 28px 65px rgba(0, 0, 0, 0.40);
        }

        .auth-card h2 {
            font-family: 'Poppins', sans-serif;
            color: var(--white);
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .subtitle {
            color: rgba(251, 248, 242, 0.72);
            font-size: 0.96rem;
            margin-bottom: 36px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            color: var(--cream);
            font-weight: 700;
            font-size: 0.9rem;
            margin-bottom: 9px;
        }

        .form-group input {
            width: 100%;
            background: #07110c;
            color: var(--white);
            border: 1px solid rgba(241, 235, 221, 0.18);
            border-radius: 13px;
            padding: 16px;
            font-size: 0.96rem;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-group input::placeholder {
            color: rgba(251, 248, 242, 0.35);
        }

        .form-group input:focus {
            border-color: var(--yellow);
            box-shadow: 0 0 0 4px rgba(242, 183, 5, 0.15);
        }

        .form-error {
            color: #ffb4a8;
            font-size: 0.82rem;
            margin-top: 7px;
        }

        .auth-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            margin: 6px 0 30px;
            font-size: 0.9rem;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(251, 248, 242, 0.75);
        }

        .remember input {
            width: 16px;
            height: 16px;
            accent-color: var(--yellow);
        }

        .forgot-link {
            color: var(--yellow);
            font-weight: 600;
        }

        .forgot-link:hover {
            color: #ffd34d;
        }

        .btn-login {
            width: 100%;
            border: none;
            cursor: pointer;
            background: var(--green);
            color: var(--white);
            padding: 16px;
            border-radius: 13px;
            font-weight: 800;
            font-size: 1rem;
            box-shadow: 0 6px 0 var(--green-dark);
            transition: background 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-login:hover {
            background: var(--green-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 0 #143522;
        }

        .divider {
            height: 1px;
            background: rgba(241, 235, 221, 0.14);
            margin: 36px 0 26px;
        }

        .register-text {
            text-align: center;
            color: rgba(251, 248, 242, 0.75);
            font-size: 0.94rem;
        }

        .register-text a {
            color: var(--yellow);
            font-weight: 800;
        }

        .register-text a:hover {
            color: #ffd34d;
        }

        .back-home-wrapper {
            text-align: center;
            margin-top: 18px;
        }

        .back-home {
            color: rgba(251, 248, 242, 0.55);
            font-size: 0.88rem;
        }

        .back-home:hover {
            color: var(--yellow);
        }

        @media (max-width: 900px) {
            .auth-wrapper {
                grid-template-columns: 1fr;
            }

            .auth-left {
                display: none;
            }

            .auth-right {
                min-height: 100vh;
                padding: 24px;
            }

            .auth-card {
                padding: 34px 26px;
            }
        }
    </style>
</head>

<body>
    <main class="auth-wrapper">

        <section class="auth-left">
            <div class="auth-brand">

                <div class="logo-box">
                    <img src="{{ asset('images/monkey-motors-logo.png') }}" alt="Monkey Motors Logo">
                </div>

                <span class="badge">TALLER MECÁNICO INTEGRAL</span>

                <h1>
                    Monkey <span>Motors</span>
                </h1>

                <p>
                    Tu auto, en manos expertas. Sin vueltas, sin sorpresas.
                    Accedé al sistema para gestionar clientes, servicios y órdenes de trabajo.
                </p>

                <div class="dots">
                    <span class="active"></span>
                    <span></span>
                    <span></span>
                </div>

            </div>
        </section>

        <section class="auth-right">
            <div class="auth-card">

                <h2>¡Hola de nuevo!</h2>

                <p class="subtitle">
                    Ingresá tus credenciales para acceder al sistema.
                </p>

                @if (session('status'))
                    <div class="form-error" style="margin-bottom: 18px;">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="tu_correo@gmail.com"
                            required
                            autofocus
                            autocomplete="username"
                        >

                        @error('email')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            required
                            autocomplete="current-password"
                        >

                        @error('password')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="auth-options">
                        <label class="remember">
                            <input type="checkbox" name="remember">
                            <span>Recordarme</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-link">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="btn-login">
                        Iniciar sesión
                    </button>
                </form>

                <div class="divider"></div>

                <p class="register-text">
                    ¿No tenés cuenta?

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registrate acá</a>
                    @endif
                </p>

                <div class="back-home-wrapper">
                    <a href="{{ url('/') }}" class="back-home">
                        Volver al inicio
                    </a>
                </div>

            </div>
        </section>

    </main>
</body>

</html>