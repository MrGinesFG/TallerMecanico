<section>

    <header style="margin-bottom:25px;">

        <p style="
            color:#6B4A35;
            margin-top:8px;">
            Cambia tu contraseña para mantener tu cuenta protegida.
        </p>
    </header>

    <form method="POST" action="{{ route('password.update') }}" class="space-y-6">

        @csrf
        @method('PUT')

        <div style="margin-bottom:20px;">

            <label for="update_password_current_password" style="
                    display:block;
                    margin-bottom:8px;
                    font-weight:600;
                    color:#2E6F47;">

                Contraseña actual

            </label>

            <input id="update_password_current_password" name="current_password" type="password"
                autocomplete="current-password" style="
                    width:100%;
                    padding:14px;
                    border-radius:10px;
                    border:2px solid #DDD;
                    font-size:15px;">

            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

        </div>

        <div style="margin-bottom:20px;">

            <label for="update_password_password" style="
                    display:block;
                    margin-bottom:8px;
                    font-weight:600;
                    color:#2E6F47;">

                Nueva contraseña

            </label>

            <input id="update_password_password" name="password" type="password" autocomplete="new-password" style="
                    width:100%;
                    padding:14px;
                    border-radius:10px;
                    border:2px solid #DDD;
                    font-size:15px;">

            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

        </div>

        <div style="margin-bottom:25px;">

            <label for="update_password_password_confirmation" style="
                    display:block;
                    margin-bottom:8px;
                    font-weight:600;
                    color:#2E6F47;">

                Confirmar nueva contraseña

            </label>

            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                autocomplete="new-password" style="
                    width:100%;
                    padding:14px;
                    border-radius:10px;
                    border:2px solid #DDD;
                    font-size:15px;">

            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />

        </div>

        <button type="submit" style="
                background:#2E6F47;
                color:white;
                padding:14px 28px;
                border:none;
                border-radius:10px;
                font-size:16px;
                cursor:pointer;
                font-weight:bold;
                transition:.3s;">

            Cambiar contraseña

        </button>

        @if (session('status') === 'password-updated')

            <span style="
                        margin-left:15px;
                        color:green;
                        font-weight:bold;">

                ✔ Contraseña actualizada correctamente

            </span>

        @endif

    </form>

</section>