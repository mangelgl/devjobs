<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

        @forelse ($vacantes as $vacante)
            <div
                class="p-4 text-gray-900 dark:text-gray-100 border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="leading-10">
                    <p class="font-bold">{{ $vacante->titulo }}</p>
                    <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                    <p class="text-sm text-gray-500">Último día: {{ $vacante->ultimo_dia->format('Y/m/d') }}</p>
                </div>

                <div class="flex flex-col md:flex-row gap-3 mt-5 md:mt-0 text-center">
                    <a href="" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                        Candidatos
                    </a>
                    <a href="{{ route('vacantes.edit', $vacante->id) }}"
                        class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                        Editar
                    </a>
                    <a href="" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                        Eliminar
                    </a>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>
        @endforelse

    </div>

    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>
</div>
