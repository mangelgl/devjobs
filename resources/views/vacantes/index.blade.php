<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @session('message')
                <p class="bg-green-100 border-l-4 border-green-600 text-green-600 font-bold mb-4 p-2">
                    {{ session('message') }}
                </p>
            @endsession

            <livewire:mostrar-vacante />
        </div>
    </div>
</x-app-layout>
