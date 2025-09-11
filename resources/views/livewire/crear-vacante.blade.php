<form class="md:w-1/2 space-y-5" wire:submit.prevent="crearVacante" novalidate>
    <!-- Título -->
    <div>
        <x-input-label for="titulo" :value="__('Título')" />
        <x-text-input class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')"
            placeholder="Título de la vacante" />

        @error('titulo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <!-- Descripción -->
    <div>
        <x-input-label for="descripcion" :value="__('Descripción de la vacante')" />
        <textarea wire:model="descripcion" placeholder="Descripción de la vacante"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm h-44"></textarea>
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <!-- Salario -->
    <div>
        <x-input-label for="salario" :value="__('Salario mensual')" />
        <select wire:model="salario"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="" @selected(true) disabled>-- Selecciona un salario --</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>
        @error('salario')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <!-- Categoría -->
    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />
        <select wire:model="categoria"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="" disabled>-- Selecciona una categoría --</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
            @error('categoria')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </select>
    </div>

    <!-- Empresa -->
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')"
            placeholder="Empresa: Netflix, Uber, Shopify..." />
        @error('empresa')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <!-- Último día para postularse -->
    <div>
        <x-input-label for="ultimoDia" :value="__('Último día para postularse')" />
        <x-text-input class="block mt-1 w-full" type="date" wire:model="ultimoDia" :value="old('ultimoDia')"
            placeholder="Empresa: Netflix, Uber, Shopify..." />
        @error('ultimoDia')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <!-- Imagen -->
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input class="block mt-1 w-full" type="file" wire:model="imagen" accept="image/*" />

        <div class="my-5">
            @if ($imagen)
                <img src="{{ $imagen->temporaryUrl() }}" alt="Preview">
            @endif
        </div>

        @error('imagen')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <x-primary-button>
        {{ __('Crear vacante') }}
    </x-primary-button>
</form>
