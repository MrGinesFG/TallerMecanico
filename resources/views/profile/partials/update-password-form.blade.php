<section>
    <header class="mb-6">
        <p class="mt-2 text-brand-brown-dark dark:text-gray-300">
            Cambia tu contraseña para mantener tu cuenta protegida.
        </p>
    </header>

    <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="update_password_current_password" class="block mb-2 font-semibold text-brand-green-dark dark:text-brand-green">
                Contraseña actual
            </label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" 
                class="w-full p-3.5 rounded-lg border-2 border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 text-[15px] focus:border-brand-green focus:ring focus:ring-brand-green/30 transition-colors">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password" class="block mb-2 font-semibold text-brand-green-dark dark:text-brand-green">
                Nueva contraseña
            </label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password" 
                class="w-full p-3.5 rounded-lg border-2 border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 text-[15px] focus:border-brand-green focus:ring focus:ring-brand-green/30 transition-colors">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block mb-2 font-semibold text-brand-green-dark dark:text-brand-green">
                Confirmar nueva contraseña
            </label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" 
                class="w-full p-3.5 rounded-lg border-2 border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 text-[15px] focus:border-brand-green focus:ring focus:ring-brand-green/30 transition-colors">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-brand-green-dark hover:bg-brand-green dark:bg-brand-green dark:hover:bg-brand-green-light text-white px-7 py-3.5 rounded-lg text-base font-bold transition-colors">
                Cambiar contraseña
            </button>

            @if (session('status') === 'password-updated')
                <span class="text-green-600 dark:text-green-400 font-bold">
                    ✔ Contraseña actualizada correctamente
                </span>
            @endif
        </div>
    </form>
</section>