<?php

namespace Controllers;
use MVC\Router;
use Model\Tacos;
use Model\Extra;
use Model\Clasificacion;
use PHPMailer\PHPMailer\PHPMailer;
use Intervention\Image\ImageManagerStatic as Image;

class PaginasController{
    public static function index(Router $router){
        $clasificaciones = Clasificacion::get(3);
        $inicio = true;

       $router->render('paginas/index',[
        'clasificaciones' => $clasificaciones,
        'inicio' => $inicio
       ]);
    }
    
    public static function nosotros(Router $router){
        
        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router){
        $clasificaciones = Clasificacion::all();
        $router->render('paginas/propiedades',[
            'clasificaciones' => $clasificaciones,
        ]);
    }

    public static function propiedad(Router $router){
        $id = validarORedireccionar('/propiedades');
        $tacos = Tacos::find($id);
        $tacos = Tacos::all();
        $clasificacion = Clasificacion::find($id);
        $extras = Extra::find($id);
        $extras = Extra::all();
        $router->render('paginas/propiedad',[
            'tacos' => $tacos,
            'clasificacion' => $clasificacion,
            'extras' => $extras
        ]);
    }

    public static function carta(Router $router){

        $router->render('paginas/carta');
    }

    public static function entrada(Router $router){
        $router->render('paginas/entrada');
    }

    public static function contacto(Router $router){

        $mensaje = null;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $respuestas = $_POST['contacto'];
                       
            // Crear una instancia de PHPMailer
            $mail = new PHPMailer();
            
            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io'; 
            $mail->SMTPAuth =true;
            $mail->Username = 'c325496bdfac05';
            $mail->Password = 'b06adf453588b5';
            $mail->SMTPSecure = 'tls';
            $mail->Port =2525;
    
            //Configurar el contenido del email
            $mail->setFrom('admin@taqueria.com');
            $mail->addAddress('admin@taqueria.com','taqueria.com');
            $mail->Subject = 'Tienes un Nuevo Mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
        
            //Definir el Contenido
            $contenido ='<html>';
            $contenido .='<p> Tienes un nuevo Mensaje </p>';
            $contenido .='<p> Nombre: ' . $respuestas['nombre'] . '</p>';

            //Enviar de forma condicional algunos campos de email o telefono
            if( $respuestas['contacto'] === 'telefono'){
                $contenido .='<p> Eligió ser contactado por Telefono: </p>';
                $contenido .='<p> Telefono: ' . $respuestas['telefono'] . '</p>';
                $contenido .='<p> El Día: ' . $respuestas['fecha'] . '</p>';
                $contenido .='<p> Horario preferente: ' . $respuestas['hora'] . ' horas' . '</p>';
            }else{
                $contenido .='<p> Eligió ser contactado por E-mail: </p>';
                $contenido .='<p> E-Mail: ' . $respuestas['email'] . '</p>';
            }

            $contenido .='<p> Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .='</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            //Enviar el Email
            if($mail->send()){
                $mensaje = "Mensaje enviado Correctamente!!";
            }else{
                $mensaje = "El mensaje no se pudo enviar...";
            }
        }

        $router->render('paginas/contacto',[
            'mensaje' => $mensaje
        ]);
    }

}   