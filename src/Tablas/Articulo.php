<?php

namespace App\Tablas;

use PDO;

class Articulo extends Modelo
{
    protected static string $tabla = 'articulos';

    private $id;
    private $codigo;
    private $descripcion;
    private $precio;
    private $stock;
    private $categoria_id;
    private $descuento;

    public function __construct(array $campos)
    {
        $this->id = $campos['id'];
        $this->codigo = $campos['codigo'];
        $this->descripcion = $campos['descripcion'];
        $this->precio = $campos['precio'];
        $this->stock = $campos['stock'];
        $this->categoria_id = $campos['categoria_id'];
        $this->descuento = $campos['descuento'];
    }

    public static function existe(int $id, ?PDO $pdo = null): bool
    {
        return static::obtener($id, $pdo) !== null;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescuento()
    {
        return $this->descuento;
    }

    public function getCategoriaNombre(PDO $pdo)
    {
        $sent = $pdo->prepare("SELECT categoria FROM categorias WHERE id = :categoria_id");
        $sent->execute(['categoria_id' => $this->categoria_id]);
        return $sent->fetchColumn();
    }
    
}
