<main class="contenedor seccion">
    <h1>Registrar Clasificacion</h1>
    <a href="/admin" class="boton boton-verde">Regresar</a>
    
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    
    <form class="formulario" method="POST" action="/clasificaciones/crear" enctype="multipart/form-data">
        <?php include 'formulario.php'; ?>
        <input type="submit" value="Registrar Clasificacion" class="boton boton-verde">
    </form>
</main>