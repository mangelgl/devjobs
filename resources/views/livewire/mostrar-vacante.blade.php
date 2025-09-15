<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-xl text-gray-800 mb-3">
            {{ $vacante->titulo }}
        </h3>
    </div>

    <div class="md:grid md:grid-cols-2 bg-gray-100 p-4 my-10 rounded-lg">
        <p class="font-bold uppercase text-gray-800 my-3">Empresa:
            <span class="normal-case font-normal">{{ $vacante->empresa }}</span>
        </p>

        <p class="font-bold uppercase text-gray-800 my-3">Último día para postularse:
            <span class="normal-case font-normal">{{ $vacante->ultimo_dia->toFormattedDateString() }}</span>
        </p>

        <p class="font-bold uppercase text-gray-800 my-3">Categoría:
            <span class="normal-case font-normal">{{ $vacante->categoria->categoria }}</span>
        </p>

        <p class="font-bold uppercase text-gray-800 my-3">Salario:
            <span class="normal-case font-normal">{{ $vacante->salario->salario }}</span>
        </p>
    </div>

    <div class="md:grid md:grid-cols-6 gap-6">
        <div class="md:col-span-2">
            <img src="{{ asset('/storage/public/vacantes' . $vacante->imagen) }}" alt="{{ $vacante->titulo }}">
        </div>
        <div class="md:col-span-4">
            <h2 class="text-xl font-bold mb-5">Descripción</h2>
            <p>{{ $vacante->descripcion }}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-100 border border-dash p-5 text-center">
            <p>
                ¿Desea postular a esta vacante? <a class="font-bold text-indigo-600"
                    href="{{ route('register') }}">Regístrate y aplica</a>
            </p>
        </div>
    @endguest

    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante" />
    @endcannot

</div>
