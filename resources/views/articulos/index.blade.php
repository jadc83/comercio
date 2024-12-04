<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Artículos</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex gap-x-6">
            <div class="shadow-sm sm:rounded-lg w-11/12 p-4 text-gray-900">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3">Código</th>
                                <th class="px-6 py-3">Descripción</th>
                                <th class="px-6 py-3">Precio</th>
                                <th colspan="3" class="px-6 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articulos as $articulo)
                                <tr class="bg-white border-b dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $articulo->codigo }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('articulos.show', $articulo) }}"
                                            class="text-blue-600 hover:underline">
                                            {{ $articulo->descripcion }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">{{ $articulo->precio }}</td>
                                    <td class="px-6 py-4 flex gap-2">
                                        @if (Auth::user())
                                        <a href="{{ route('articulos.edit', $articulo) }}"
                                        class="text-white bg-blue-500 p-4 hover:underline rounded-lg">Editar</a>
                                        <form method="POST" action="{{ route('articulos.destroy', $articulo) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="text-white bg-red-500 p-4 hover:underline rounded-lg" type="submit">Eliminar</button>
                                        </form>
                                        @endif
                                        <a href="{{ route('carrito.meter', $articulo) }}"
                                            class="text-white bg-green-500 p-4 hover:underline rounded-lg">Comprar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 text-center">
                    <a href="{{ route('articulos.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 rounded-lg px-5 py-2.5">Crear un nuevo artículo</a>
                </div>
            </div>

            <aside class="rounded-lg dark:bg-gray-800 w-7/12 p-4 flex-row">
                <table class="w-full bg-gray-400 text-sm text-left dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 col-span-3">
                        <tr>
                            <th class="py-3 px-6">Articulo</th>
                            <th class="py-3 px-6">Precio</th>
                            <th class="py-3 px-6"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carrito->getLineas() as $id => $linea)
                            @php
                                $articulo = $linea->getArticulo();
                                $cantidad = $linea->getCantidad();
                            @endphp
                            <tr class="bg-white border-b dark:bg-gray-800">
                                <td class="py-4 px-6">{{ $articulo->descripcion }}   x{{ $cantidad }}</td>
                                <td class="py-4 px-6">{{ ($articulo->precio * $cantidad) }}€</td>
                                <td class="py-4 px-6 flex items-center gap-2">
                                    <a href="{{ route('carrito.sacar', $articulo) }}"
                                        class="bg-blue-700 text-white rounded-lg px-2.5 hover:bg-blue-800">Quitar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if (!$carrito->vacio())
                <div class="flex justify-between mt-4">
                    <a href="{{ route('carrito.vaciar') }}"
                        class="bg-red-700 text-white rounded-lg p-2 align-bottom hover:bg-red-800">Vaciar carrito</a>
                        <form method="POST" action="{{ route('realizar_compra') }}">
                            @csrf
                            <button type="submit"class="bg-green-700 text-white rounded-lg px-4 py-2 hover:bg-green-800">Comprar</button>
                        </form>
                    @endif
                </div>
            </aside>
        </div>
    </div>
</x-app-layout>
