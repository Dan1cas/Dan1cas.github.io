<?php 
    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? null;

    if(!isset($inicio)){
        $inicio = false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taqueria la Parrilla Suiza</title>
    <link rel="stylesheet" href="../build/css/app.css">
    
</head>
<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?> "> 
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/"> 
                    <img src="/build/img/logo.svg" alt="Logotipo"> 
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="hambur">
                </div>
                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="dark img">
                    <nav class="navegacion">    
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Servicio</a>
                        <a href="/carta">Carta</a>
                        <a href="/contacto">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/cerrar-sesion">Cerrar Sesión</a>    
                        <?php endif;?>
                        
                    </nav>
                </div>
            </div><!-- .barra -->
            <?php  
                if($inicio){
                    echo "<h1> Los mejores Tacos solo en Taquería la parrilla, De la parrilla a tu mesa </h1>";
                }
            ?>
        </div><!-- .contenedor -->
        
    </header>

    <?php echo $contenido; ?>
    
    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
            <a href="/nosotros">Nosotros</a>
            <a href="/propiedades">Servicio</a>
            <a href="/carta">Carta</a>
            <a href="/contacto">Contacto</a>
            </nav>
        </div>
        <p class="copyright">Derechos reservados <?php echo date('Y');?> &copy</p>
    </footer>
    
    <script src="../build/js/bundle.min.js"></script>
</body>
</html>