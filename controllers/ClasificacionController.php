<?php

namespace Controllers;
use MVC\Router;
use Model\Tacos;
use Model\Clasificacion;
use Intervention\Image\ImageManagerStatic as Image;

class ClasificacionController{

    public static function crear(Router $router){

        $clasificacion = new Clasificacion;
        $errores = Clasificacion::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Crear un a nueva instancia
            $clasificacion = new Clasificacion($_POST['clasificacion']);
            // Generar un Nombre único
            $nombreImagen = md5(uniqid( rand(), true )) . ".jpg";
            //Realiza un resize a la imagen con intervetion
            if($_FILES['clasificacion']['tmp_name']['imagen']){
                $image = Image::make($_FILES['clasificacion']['tmp_name']['imagen'])->fit(800,600);
                $clasificacion -> setImagen($nombreImagen);
            }
            //Validar que no haya campos vacios
            $errores = $clasificacion-> validar();
    
            //No hay errores
            if(empty($errores)){
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }
                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                $clasificacion->guardar();
            }
        }

        $router->render('clasificaciones/crear', [
            'clasificacion' => $clasificacion,
            'errores' => $errores    
        ]);
    } 

    public static function actualizar(Router $router){
        
        $id = validarORedireccionar('/admin');
        $errores = Clasificacion::getErrores();
        $clasificacion = Clasificacion::find($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
            //Asignar los atributos
            $args = $_POST['clasificacion'];
            
            //Sincronizar objeto en memoria con lo que el usuario escribio
            $clasificacion->sincronizar($args);
           
            //Validacion subida de archivos
            $errores = $clasificacion->validar();
    
            // Generar un Nombre único
            $nombreImagen = md5(uniqid( rand(), true )) . ".jpg";
            
            //Subida de archivos
            if($_FILES['clasificacion']['tmp_name']['imagen']){
                $image = Image::make($_FILES['clasificacion']['tmp_name']['imagen'])->fit(800,600);
                $clasificacion -> setImagen($nombreImagen);
            }
    
            // Revisar que el arreglo de errores esté vacio
            if(empty($errores)) {
                
                if($_FILES['clasificacion']['tmp_name']['imagen']) {
                    // Almacenar la imagen
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                
                $clasificacion->guardar();
            }
        }        

        $router->render('/clasificaciones/actualizar', [
            'errores' => $errores,
            'clasificacion' => $clasificacion
        ]);


    }
    
    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Validar ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id){
                //Validar tipo
                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)){
                    $clasificacion = Clasificacion::find($id);
                    $clasificacion->eliminar();
                }
            }
        }
    }
}