<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Información del Perfil
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Actualiza tu información personal y tu dirección de correo electrónico.
        </p>
    </header>

    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('PATCH')

        <div>
            <x-input-label for="name" value="Nombre" />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name" />

            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="Correo Electrónico" />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full"
                :value="old('email', $user->email)"
                required
                autocomplete="username" />

            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

                <div>

                    <p class="mt-2 text-sm text-gray-800">

                        Tu correo electrónico aún no ha sido verificado.

                        <button
                            form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900">

                            Haz clic aquí para reenviar el correo de verificación.

                        </button>

                    </p>

                    @if (session('status') === 'verification-link-sent')

                        <p class="mt-2 text-sm font-medium text-green-600">
                            Se ha enviado un nuevo enlace de verificación a tu correo.
                        </p>

                    @endif

                </div>

            @endif

        </div>

        <div class="flex items-center gap-4">

            <x-primary-button>
                Guardar Cambios
            </x-primary-button>

            @if (session('status') === 'profile-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600">

                    ¡Cambios guardados correctamente!

                </p>

            @endif

        </div>

    </form>
</section>
