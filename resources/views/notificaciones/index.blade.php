<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center mb-5">Mis notificaciones</h1>

                    @forelse ($notificaciones as $notificacion)
                        <div class="p-5 border border-gray-200 md:flex md:justify-between md:items-center">
                            <div>
                                <p>Tienes un nuevo candidato en <span>{{ $notificacion->data['nombreVacante'] }}</span>
                                </p>
                                <p><span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span></p>
                            </div>
                            <div class="mt-5 md:mt-0">
                                <a class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase"
                                    href="#">Ver candidatos</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">No hay notificaciones.</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
