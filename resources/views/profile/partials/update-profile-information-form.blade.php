<div class="bg-white rounded-3xl shadow-xl p-10">

    <div class="text-center">

        <img
            src="{{ asset('images/monkey-motors-logo.png') }}"
            class="w-28 mx-auto mb-5">

        <h2 class="text-3xl font-bold text-green-800">

            {{ $user->name }}

        </h2>

        <p class="text-gray-500 mb-8">

            {{ $user->email }}

        </p>

    </div>

    <form
        method="POST"
        action="{{ route('profile.update') }}">

        @csrf
        @method('PATCH')

        <div class="mb-6">

            <label class="block text-green-800 font-bold mb-2">

                Nombre Completo

            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name',$user->name) }}"
                class="w-full rounded-xl border-gray-300 focus:border-green-700 focus:ring-green-700">

            @error('name')

                <p class="text-red-500 mt-2">
                    {{ $message }}
                </p>

            @enderror

        </div>

        <div class="mb-8">

            <label class="block text-green-800 font-bold mb-2">

                Correo Electrónico

            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email',$user->email) }}"
                class="w-full rounded-xl border-gray-300 focus:border-green-700 focus:ring-green-700">

            @error('email')

                <p class="text-red-500 mt-2">
                    {{ $message }}
                </p>

            @enderror

        </div>

        <div class="text-center">

            <button
                type="submit"
                class="bg-green-700 hover:bg-green-800 text-white font-bold px-10 py-3 rounded-xl transition">

                Guardar Cambios

            </button>

        </div>

        @if(session('status')=='profile-updated')

            <div class="mt-6 text-center">

                <span class="text-green-700 font-semibold">

                    ✔ Perfil actualizado correctamente.

                </span>

            </div>

        @endif

    </form>

</div>