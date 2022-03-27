<?php

namespace Model;

class Clasificacion extends ActiveRecord{
    protected static $tabla = 'clasificacion';
    protected static $columnasDB=['id','tipo','descripcion','rangoPrecio','imagen'];

    public $id;
    public $tipo;
    public $descripcion;
    public $rangoPrecio;
    public $imagen;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->tipo = $args['tipo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->rangoPrecio = $args['rangoPrecio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
    }

    public function validar(){
        if(!$this->tipo){
            self::$errores[] = "Debes añadir el tipo de clasificacion";
        }

        if( !$this->rangoPrecio ){
           self::$errores[] = "Debes añadir un rango de precios";
        }

        if(!$this->descripcion){
            self::$errores[] = "Debes añadir una descripcion y debe tener almenos 10 caracteres";
        }

        if(!$this->imagen){
           self::$errores[]=" La Imagen es obligatoria";
        }

        if(!preg_match('/[0-9]/', $this->rangoPrecio)){
            self::$errores[]=" Formato No Valido";
        }
        return self::$errores;
    }
}