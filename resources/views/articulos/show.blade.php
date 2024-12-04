<x-app-layout>
    <a href="{{ route('articulos.edit', $articulo) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
        Editar
    </a>
    <form method="POST" action="{{ route('articulos.destroy', $articulo) }}">
        @method('DELETE')
        @csrf
        <a href="{{ route('articulos.destroy', $articulo) }}"
            class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3"
            onclick="event.preventDefault(); if (confirm('¿Está seguro?')) this.closest('form').submit();">
            Eliminar
        </a>
    </form>
</x-app-layout>
