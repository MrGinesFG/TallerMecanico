<section>
    <header class="mb-6">
        <p class="mt-2 text-brand-brown-dark dark:text-gray-300 leading-relaxed">
            Si eliminas tu cuenta, toda la información relacionada con ella se borrará de forma permanente.
            Esta acción no podrá deshacerse.
        </p>
    </header>

    <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-600 dark:border-red-500 p-6 rounded-xl">
        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" 
            class="bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 text-white px-7 py-3.5 rounded-lg text-base font-bold transition-colors">
            Eliminar cuenta
        </button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="POST" action="{{ route('profile.destroy') }}" class="p-8 bg-white dark:bg-gray-800 rounded-2xl">
            @csrf
            @method('DELETE')

            <h2 class="text-red-700 dark:text-red-500 text-2xl font-heading mb-4">
                Confirmar eliminación
            </h2>

            <p class="text-brand-brown-dark dark:text-gray-300 leading-relaxed mb-6">
                Esta acción eliminará definitivamente tu cuenta.
                Para confirmar, escribe tu contraseña.
            </p>

            <div class="mb-6">
                <label for="password" class="block mb-2 font-semibold text-brand-green-dark dark:text-brand-green">
                    Contraseña
                </label>
                <input id="password" name="password" type="password" 
                    class="w-full p-3.5 rounded-lg border-2 border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 text-[15px] focus:border-red-500 focus:ring focus:ring-red-500/30 transition-colors">
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end gap-4 mt-6">
                <button type="button" x-on:click="$dispatch('close')" 
                    class="bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 px-6 py-3 rounded-lg font-semibold transition-colors">
                    Cancelar
                </button>

                <button type="submit" 
                    class="bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 text-white px-6 py-3 rounded-lg font-bold transition-colors">
                    Eliminar definitivamente
                </button>
            </div>
        </form>
    </x-modal>
</section>