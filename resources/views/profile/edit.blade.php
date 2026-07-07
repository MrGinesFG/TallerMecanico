<x-app-layout>

    <x-slot name="header">

        <div class="flex justify-between items-center">

            <div>

                <h2 class="text-3xl font-bold text-green-800">
                    Mi Perfil
                </h2>

                <p class="text-gray-600">
                    Administrá la información de tu cuenta.
                </p>

            </div>

            <img src="{{ asset('images/monkey-motors-logo.png') }}" class="w-20" alt="Monkey Motors">

        </div>

    </x-slot>

    <div class="py-12" style="background:#FBF8F2; min-height:100vh;">

        <div class="max-w-4xl mx-auto">

            @include('profile.partials.update-profile-information-form')

        </div>

    </div>

</x-app-layout>