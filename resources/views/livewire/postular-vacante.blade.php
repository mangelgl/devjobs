<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center rounded-lg">
    <h3 class="text-center text-xl font-bold my-4">Postular a esta vacante</h3>

    @if (session('message'))
        <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 rounded-lg">
            {{ session('message') }}
        </p>
    @else
        <form wire:submit.prevent='postular' class="w-96 mt-5" action="">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('CV')" />
                <x-text-input wire:model="cv" id="cv" type="file" accept=".pdf" class="block mt-1 w-full" />
            </div>

            @error('cv')
                <livewire:mostrar-alerta :message="$message" />
            @enderror

            <x-primary-button class="my-5">
                {{ __('Postular') }}
            </x-primary-button>
        </form>
    @endif

</div>
