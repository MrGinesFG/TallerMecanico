<section>
    <header class="mb-6">
        <p class="mt-2 text-brand-brown-dark dark:text-gray-300">
            Actualiza tu nombre y correo electrónico.
        </p>
    </header>

    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('PATCH')

        <div>
            <label for="name" class="block mb-2 font-semibold text-brand-green-dark dark:text-brand-green">
                Nombre
            </label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus 
                class="w-full p-3.5 rounded-lg border-2 border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 text-[15px] focus:border-brand-green focus:ring focus:ring-brand-green/30 transition-colors">
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="block mb-2 font-semibold text-brand-green-dark dark:text-brand-green">
                Correo electrónico
            </label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required 
                class="w-full p-3.5 rounded-lg border-2 border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 text-[15px] focus:border-brand-green focus:ring focus:ring-brand-green/30 transition-colors">
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div class="bg-amber-100 dark:bg-amber-900/40 p-4 rounded-lg mb-6">
                <p class="text-amber-800 dark:text-amber-200 text-sm">
                    Tu correo aún no está verificado.
                    <button form="send-verification" class="underline font-bold hover:text-amber-900 dark:hover:text-amber-100">
                        Reenviar correo de verificación
                    </button>
                </p>
            </div>
        @endif

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-brand-green-dark hover:bg-brand-green dark:bg-brand-green dark:hover:bg-brand-green-light text-white px-7 py-3.5 rounded-lg text-base font-bold transition-colors">
                Guardar cambios
            </button>

            @if(session('status') === 'profile-updated')
                <span class="text-green-600 dark:text-green-400 font-bold">
                    ✔ Datos actualizados correctamente
                </span>
            @endif
        </div>
    </form>
</section>