<link rel="stylesheet" href="{{ asset('css/register.css') }}">

<div class="register-wrapper">
    <div class="register-card">
        <div class="register-media" aria-hidden="true">
            <div class="shape one" aria-hidden="true"></div>
            <div class="shape two" aria-hidden="true"></div>
        </div>

        <div class="register-form">
            <div class="card-header">
                <div class="logo-badge" aria-hidden="true">
                    <img src="{{ asset('images/monkey-motors-logo.png') }}" alt="Monkey Motors" class="form-logo">
                </div>
                <div class="brand-logo">Monkey<span>Motor</span></div>
                <p class="subtitle">Crear una nueva cuenta de usuario</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">Nombre completo</label>
                    <input id="name" type="text" name="name" class="form-input" placeholder="Tu nombre y apellido" value="{{ old('name') }}" required autofocus autocomplete="name">
                    @error('name')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input id="email" type="email" name="email" class="form-input" placeholder="nombre@ejemplo.com" value="{{ old('email') }}" required autocomplete="username">
                    @error('email')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Contraseña</label>
                    <input id="password" type="password" name="password" class="form-input" placeholder="Mínimo 8 caracteres" required autocomplete="new-password">
                    @error('password')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-input" placeholder="Repite tu contraseña" required autocomplete="new-password">
                </div>

                <button type="submit" class="btn-submit">
                    Registrarse
                </button>

                <div class="card-footer">
                    ¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
                </div>
            </form>
        </div>
    </div>
</div>