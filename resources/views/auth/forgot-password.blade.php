<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña | Monkey Motors</title>

    <style>
        :root {
            --green: #2E6F47;
            --green-dark: #1F4D32;
            --brown: #6B4A35;
            --cream: #FBF8F2;
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
                radial-gradient(circle at 20% 20%, rgba(242, 183, 5, .18), transparent 28%),
                radial-gradient(circle at 85% 85%, rgba(107, 74, 53, .60), transparent 35%),
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

            background:
                repeating-linear-gradient(
                -45deg,
                rgba(251,248,242,.08) 0px,
                rgba(251,248,242,.08) 20px,
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
            background: #fff;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
        }

        .logo-box img {
            width: 500px;
        }

        .badge {
            display: inline-block;
            color: var(--yellow);
            border: 1px solid rgba(242,183,5,.7);
            padding: 8px 18px;
            border-radius: 999px;
            margin-bottom: 28px;
        }

        .auth-brand h1 {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1;
        }

        .auth-brand span {
            color: var(--yellow);
        }

        .auth-brand p {
            margin-top: 22px;
            line-height: 1.7;
        }

        .auth-right {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #06100b;
            padding: 45px;
        }

        .auth-card {
            width: 100%;
            max-width: 500px;
            background: #0b1710;
            border: 1px solid rgba(241,235,221,.16);
            border-radius: 26px;
            padding: 50px;
        }

        .auth-card h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .subtitle {
            color: rgba(251,248,242,.7);
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .success-message {
            background: rgba(46,111,71,.25);
            border: 1px solid rgba(46,111,71,.5);
            color: #b9ffcb;
            padding: 14px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 16px;
            border-radius: 13px;
            border: 1px solid rgba(241,235,221,.18);
            background: #07110c;
            color: white;
            margin-bottom: 20px;
        }

        input:focus {
            outline: none;
            border-color: var(--yellow);
            box-shadow: 0 0 0 4px rgba(242,183,5,.15);
        }

        .form-error {
            color: #ffb4a8;
            margin-top: -12px;
            margin-bottom: 12px;
            font-size: .85rem;
        }

        .btn-login {
            width: 100%;
            border: none;
            cursor: pointer;
            background: var(--green);
            color: white;
            padding: 16px;
            border-radius: 13px;
            font-weight: 700;
            box-shadow: 0 6px 0 var(--green-dark);
        }

        .btn-login:hover {
            background: var(--green-dark);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: var(--yellow);
            font-weight: 600;
        }

        @media(max-width:900px) {

            .auth-wrapper {
                grid-template-columns: 1fr;
            }

            .auth-left {
                display: none;
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

            <span class="badge">
                TALLER MECÁNICO INTEGRAL
            </span>

            <h1>
                Monkey <span>Motors</span>
            </h1>

            <p>
                Recuperá el acceso a tu cuenta y seguí gestionando
                clientes, servicios y órdenes de trabajo.
            </p>

        </div>

    </section>

    <section class="auth-right">

        <div class="auth-card">

            <h2>¿Olvidaste tu contraseña?</h2>

            <p class="subtitle">
                Ingresá tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
            </p>

            @if (session('status'))
                <div class="success-message">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <label>Correo electrónico</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="tu_correo@gmail.com"
                    required
                >

                @error('email')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" class="btn-login">
                    Enviar enlace de recuperación
                </button>
            </form>

            <a href="{{ route('login') }}" class="back-link">
                ← Volver al inicio de sesión
            </a>

        </div>

    </section>

</main>

</body>
</html>