<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <h2 class="m-0 font-heading text-brand-green-dark dark:text-brand-green text-xl font-bold">
                Mi Perfil
            </h2>
        </div>
    </x-slot>

    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">

        <div class="bg-gradient-to-br from-brand-green to-brand-green-dark text-white rounded-2xl p-10 mb-8 flex items-center gap-6 shadow-lg shadow-brand-green/20">
            <div class="w-24 h-24 rounded-full bg-white flex justify-center items-center text-5xl shrink-0">
                👤
            </div>
            <div>
                <h1 class="m-0 text-3xl font-heading">{{ Auth::user()->name }}</h1>
                <p class="mt-2 text-base opacity-90">{{ Auth::user()->email }}</p>
                <p class="text-base opacity-90">Bienvenido nuevamente a Monkey Motors.</p>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 mb-8 shadow-sm border border-brand-cream-2 dark:border-gray-700 border-l-8 border-l-brand-green dark:border-l-brand-green transition-colors duration-200">
            <h3 class="mb-5 text-brand-green-dark dark:text-brand-green font-heading text-2xl font-semibold">Información personal</h3>
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 mb-8 shadow-sm border border-brand-cream-2 dark:border-gray-700 border-l-8 border-l-brand-green dark:border-l-brand-green transition-colors duration-200">
            <h3 class="mb-5 text-brand-green-dark dark:text-brand-green font-heading text-2xl font-semibold">Cambiar contraseña</h3>
            @include('profile.partials.update-password-form')
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 mb-8 shadow-sm border border-brand-cream-2 dark:border-gray-700 border-l-8 border-l-red-600 dark:border-l-red-500 transition-colors duration-200">
            <h3 class="mb-5 text-red-600 dark:text-red-500 font-heading text-2xl font-semibold">Zona peligrosa</h3>
            @include('profile.partials.delete-user-form')
        </div>

    </div>
</x-app-layout>