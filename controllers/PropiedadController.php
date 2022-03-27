<?php

namespace Controllers;
use MVC\Router;
use Model\Tacos;
use Model\Clasificacion;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController{
    public static function index(Router $router){
        $tacos = Tacos::all();
        $clasificaciones = Clasificacion::all();
        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;//Si no existe "Resultado" le agrega un null

        $router->render('propiedades/admin', [
            'tacos' => $tacos,
            'resultado' => $resultado,
            'clasificaciones' => $clasificaciones
        ]);
    } 

    public static function crear(Router $router){
        
        $tacos = new Tacos;
        $clasificaciones = Clasificacion::all();
        $errores = Tacos::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Crea una nueva instancia
            $tacos = new Tacos($_POST['tacos']);
            
            /* Subida de archivos */
    
            // Generar un Nombre único
            $nombreImagen = md5(uniqid( rand(), true )) . ".jpg";
            
            //Setear la imagen
    
            //Realiza un resize a la imagen con intervetion
            if($_FILES['tacos']['tmp_name']['imagen']){
                $image = Image::make($_FILES['tacos']['tmp_name']['imagen'])->fit(800,600);
                $tacos -> setImagen($nombreImagen);
            }
    
            //Validar
            $errores = $tacos->validar();
    
            // Revisar que el arreglo de errores esté vacio
            if( empty($errores) ){
    
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }
    
                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                
                //Guarda en la base de datos
                $tacos->guardar();
            }
        } 

        $router->render('propiedades/crear', [
            'clasificaciones' => $clasificaciones,
            'tacos' => $tacos,
            'errores' => $errores    
        ]);
    } 

    public static function actualizar(Router $router){
        
        $id = validarORedireccionar('/admin');
        $tacos = Tacos::find($id);
        $errores = Tacos::getErrores();
        $clasificaciones = Clasificacion::all();

        // Ejecuta el codigo despues de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
            //Asignar los atributos
            $args = $_POST['tacos'];

            $tacos->sincronizar($args);
            
            //Validacion subida de archivos
            $errores = $tacos->validar();

            // Generar un Nombre único
            $nombreImagen = md5(uniqid( rand(), true )) . ".jpg";
            
            //Subida de archivos
            if($_FILES['tacos']['tmp_name']['imagen']){
                $image = Image::make($_FILES['tacos']['tmp_name']['imagen'])->fit(800,600);
                $tacos -> setImagen($nombreImagen);
            }

            // Revisar que el arreglo de errores esté vacio
            if(empty($errores)) {
                
                if($_FILES['tacos']['tmp_name']['imagen']) {
                    // Almacenar la imagen
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }

                $tacos->guardar();
            }
        }

        $router->render('/propiedades/actualizar', [
            'tacos' => $tacos,
            'errores' => $errores,
            'clasificaciones' => $clasificaciones
        ]);


    }
    
    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Validar ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $tacos = Tacos::find($id);
                    $tacos->eliminar();
                }
            }
        }
    }
}