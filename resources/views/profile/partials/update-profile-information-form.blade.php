<section>

    <header style="margin-bottom:25px;">
        <h2 style="
            font-size:28px;
            color:#1F4D32;
            font-family:Poppins,sans-serif;
            font-weight:700;">
            Información Personal
        </h2>

        <p style="
            color:#6B4A35;
            margin-top:8px;">
            Actualiza tu nombre y correo electrónico.
        </p>
    </header>

    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST"
          action="{{ route('profile.update') }}"
          class="space-y-6">

        @csrf
        @method('PATCH')

        <div style="margin-bottom:20px;">

            <label
                for="name"
                style="
                    display:block;
                    margin-bottom:8px;
                    font-weight:600;
                    color:#2E6F47;">
                Nombre
            </label>

            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name',$user->name) }}"
                required
                autofocus

                style="
                    width:100%;
                    padding:14px;
                    border-radius:10px;
                    border:2px solid #DDD;
                    font-size:15px;
                ">

            <x-input-error
                class="mt-2"
                :messages="$errors->get('name')" />

        </div>

        <div style="margin-bottom:25px;">

            <label
                for="email"
                style="
                    display:block;
                    margin-bottom:8px;
                    font-weight:600;
                    color:#2E6F47;">
                Correo electrónico
            </label>

            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email',$user->email) }}"
                required

                style="
                    width:100%;
                    padding:14px;
                    border-radius:10px;
                    border:2px solid #DDD;
                    font-size:15px;
                ">

            <x-input-error
                class="mt-2"
                :messages="$errors->get('email')" />

        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

            <div style="
                background:#FFF8E1;
                padding:15px;
                border-radius:10px;
                margin-bottom:25px;">

                <p>

                    Tu correo aún no está verificado.

                    <button
                        form="send-verification"
                        style="
                            border:none;
                            background:none;
                            color:#2E6F47;
                            font-weight:bold;
                            cursor:pointer;">

                        Reenviar correo de verificación

                    </button>

                </p>

            </div>

        @endif

        <button
            type="submit"

            style="
                background:#2E6F47;
                color:white;
                padding:14px 28px;
                border:none;
                border-radius:10px;
                font-size:16px;
                cursor:pointer;
                font-weight:bold;">

            Guardar cambios

        </button>

        @if(session('status')==='profile-updated')

            <span style="
                margin-left:15px;
                color:green;
                font-weight:bold;">

                ✔ Datos actualizados correctamente

            </span>

        @endif

    </form>

</section>