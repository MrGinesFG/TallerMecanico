<section>

    <header>

        <h2 class="text-lg font-medium text-gray-900">
            Cambiar Contraseña
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Utiliza una contraseña segura para proteger tu cuenta.
        </p>

    </header>

    <form method="POST" action="{{ route('password.update') }}" class="mt-6 space-y-6">

        @csrf
        @method('PUT')

        <div>

            <x-input-label
                for="update_password_current_password"
                value="Contraseña Actual" />

            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-1 block w-full"
                autocomplete="current-password" />

            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('current_password')" />

        </div>

        <div>

            <x-input-label
                for="update_password_password"
                value="Nueva Contraseña" />

            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-1 block w-full"
                autocomplete="new-password" />

            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('password')" />

        </div>

        <div>

            <x-input-label
                for="update_password_password_confirmation"
                value="Confirmar Contraseña" />

            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                autocomplete="new-password" />

            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('password_confirmation')" />

        </div>

        <div class="flex items-center gap-4">

            <x-primary-button>
                Actualizar Contraseña
            </x-primary-button>

            @if (session('status') === 'password-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600">

                    Contraseña actualizada correctamente.

                </p>

            @endif

        </div>

    </form>

</section>