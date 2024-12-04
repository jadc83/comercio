<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar departamento
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('departamentos.update', $departamento) }}" class="max-w-sm mx-auto">
                @method('PUT')
                @csrf
                <div class="mb-5">
                    <x-input-label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Código
                    </x-input-label>
                    <x-text-input name="codigo" type="text" id="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('codigo', $departamento->codigo)" />
                    <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
                </div>
                <div class="mb-5">
                    <x-input-label for="denominacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Denominación
                    </x-input-label>
                    <x-text-input name="denominacion" type="text" id="denominacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('denominacion', $departamento->denominacion)" />
                    <x-input-error :messages="$errors->get('denominacion')" class="mt-2" />
                </div>
                <div class="mb-5">
                    <x-input-label for="localidad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Localidad
                    </x-input-label>
                    <x-text-input name="localidad" type="text" id="localidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('localidad', $departamento->localidad)" />
                    <x-input-error :messages="$errors->get('localidad')" class="mt-2" />
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Editar
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
