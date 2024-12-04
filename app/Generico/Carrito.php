<?php

namespace App\Generico;

use App\Models\Articulo;
use ValueError;

class Carrito
{
    /**
     * @var Linea[] $lineas
     */
    private array $lineas;

    public function __construct()
    {
        $this->lineas = [];
    }

    public function meter($id)
    {
        if (!($articulo = Articulo::find($id))) {
            throw new ValueError('El artículo no existe.');
        }

        if (isset($this->lineas[$id])) {
            $this->lineas[$id]->incrCantidad();
        } else {
            $this->lineas[$id] = new Linea($articulo);
        }
    }

    public function sacar($id)
    {
        if (!isset($this->lineas[$id])) {
            throw new ValueError('Artículo inexistente en el carrito.');
        }

        $this->lineas[$id]->decrCantidad();
        if ($this->lineas[$id]->getCantidad() == 0) {
            unset($this->lineas[$id]);
        }
    }

    public function getLineas(): array
    {
        return $this->lineas;
    }

    public function vacio(): bool
    {
        return count($this->lineas) == 0;
    }

    public static function carrito(): static
    {
        if (session()->missing('carrito')) {
            session()->put('carrito', new static());
        }

        // session('carrito')->meter(1);
        // session()->forget('carrito');

        return session('carrito');
    }
}
