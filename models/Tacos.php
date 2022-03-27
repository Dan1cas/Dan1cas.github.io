<?php

namespace Model;

class Tacos extends ActiveRecord{
    protected static $tabla = 'menu';
    protected static $columnasDB=['id','titulo','precio','imagen','descripcion','creado','clasificacionId','plus'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $creado;
    public $clasificacionId;
    public $plus;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->creado = date('Y/m/d');
        $this->clasificacionId = $args['clasificacionId'] ?? '';
        $this->plus = $args['plus'] ?? '0';
    }

    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un titulo";
        }

        if(!$this->precio){
            self::$errores[] = "Debes añadir un precio";
        }

        if( strlen($this->descripcion) < 10 ){
           self::$errores[] = "Debes añadir una descripcion y debe tener almenos 10 caracteres";
        }

        if(!$this->clasificacionId){
            self::$errores[] = "Debes añadir una clasificacion";
        }

        if(!$this->imagen){
           self::$errores[]=" La Imagen es obligatoria";
        }
        return self::$errores;
    }
}