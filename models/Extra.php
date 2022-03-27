<?php

namespace Model;

class Extra extends ActiveRecord{
    protected static $tabla = 'extra';
    protected static $columnasDB=['id','titulo','precio'];

    public $id;
    public $titulo;
    public $precio;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['tipo'] ?? '';
        $this->precio = $args['precio'] ?? '';
    }
}