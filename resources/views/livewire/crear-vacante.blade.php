<form class="md:w-1/2 space-y-5" action="">
    <!-- Título -->
    <div>
        <x-input-label for="title" :value="__('Título')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required
            placeholder="Título de la vacante" />
    </div>

    <!-- Descripción -->
    <div>
        <x-input-label for="description" :value="__('Descripción de la vacante')" />
        <textarea name="description" placeholder="Descripción de la vacante"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm h-44"></textarea>
    </div>

    <!-- Salario -->
    <div>
        <x-input-label for="income" :value="__('Salario mensual')" />
        <select name="income" id="income"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="" selected disabled>-- Selecciona un salario --</option>
        </select>
    </div>

    <!-- Categoría -->
    <div>
        <x-input-label for="category" :value="__('Categoría')" />
        <select name="category" id="category"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="" selected disabled>-- Selecciona una categoría --</option>
        </select>
    </div>

    <!-- Empresa -->
    <div>
        <x-input-label for="company" :value="__('Empresa')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" :value="old('company')" required
            placeholder="Empresa: Netflix, Uber, Shopify..." />
    </div>

    <!-- Último día para postularse -->
    <div>
        <x-input-label for="lastday" :value="__('Último día para postularse')" />
        <x-text-input id="lastday" class="block mt-1 w-full" type="date" name="lastday" :value="old('lastday')" required
            placeholder="Empresa: Netflix, Uber, Shopify..." />
    </div>

    <!-- Imagen -->
    <div>
        <x-input-label for="image" :value="__('Imagen')" />
        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" required />
    </div>

    <x-primary-button>
        {{ __('Crear vacante') }}
    </x-primary-button>
</form>
