<link rel="stylesheet" href="{{ asset('css/register.css') }}">

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
                Registrate y empezá a gestionar clientes, servicios y órdenes de trabajo.
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
            <h2>¡Bienvenido!</h2>

            <p class="subtitle">
                Creá tu cuenta para acceder al sistema.
            </p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Nombre completo</label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        class="form-input"
                        placeholder="Tu nombre y apellido"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        autocomplete="name"
                    >
                    @error('name')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="form-input"
                        placeholder="nombre@ejemplo.com"
                        value="{{ old('email') }}"
                        required
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
                        class="form-input"
                        placeholder="Mínimo 8 caracteres"
                        required
                        autocomplete="new-password"
                    >
                    @error('password')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar contraseña</label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        class="form-input"
                        placeholder="Repite tu contraseña"
                        required
                        autocomplete="new-password"
                    >
                </div>

                <button type="submit" class="btn-login">
                    Registrarse
                </button>
            </form>

            <div class="divider"></div>

            <p class="register-text">
                ¿Ya tenés cuenta?
                <a href="{{ route('login') }}">Inicia sesión</a>
            </p>

            <div class="back-home-wrapper">
                <a href="{{ url('/') }}" class="back-home">
                    Volver al inicio
                </a>
            </div>
        </div>
    </section>
</main>
