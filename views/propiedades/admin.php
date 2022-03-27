<main class="contenedor seccion">
    <h1>Administrador de platillos</h1>
    <?php
        if($resultado){
            $mensaje = mostrarNotificacion( intval($resultado) );
            if($mensaje){ ?>
                <p class="alerta exito"> <?php echo s($mensaje); ?>  </p>
            <?php }
        }?>

    <a href="/propiedades/crear" class="boton boton-verde">Nuevo platillo</a>
    <a href="/clasificaciones/crear" class="boton boton-amarillo">Nueva clasificación</a>
    
    <h2>Tacos</h2>
    
    <table class="producto">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
            <tbody>  <!-- 4.- Mostrar resultados de la Base de Datos-->
                <?php foreach($tacos as $taco): ?>
                    <tr>
                        <td> <?php echo $taco->id; ?> </td>
                        <td> <?php echo $taco->titulo; ?>  </td>
                        <td> <img src="/imagenes/<?php echo $taco->imagen; ?>" class="imagen-tabla"> </td>
                        <td> $ <?php echo $taco->precio; ?> </td>
                        <td>
                            <form method="POST" class="w-100" action="/propiedades/eliminar">
                                <input type="hidden" name="id" value=" <?php echo $taco->id; ?>">
                                <input type="hidden" name="tipo" value="tacos">
                                <input type="submit" class="boton-rojo-block" value="Eliminar ">
                            </form>
                            <a href="/propiedades/actualizar?id=<?php echo $taco->id; ?>" class="boton-amarillo-block">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </thead>
    </table>

    <h2>Clasificacion</h2>
        
    <table class="producto">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tipo</th>
                <th>Imagen</th>
                <th>Rango de Precios</th>
                <th>Acciones</th>
            </tr>
            <tbody>  <!-- 4.- Mostrar resultados de la Base de Datos-->
                <?php foreach($clasificaciones as $clasificacion): ?>
                    <tr>
                        <td> <?php echo $clasificacion->id; ?> </td>
                        <td> <?php echo $clasificacion->tipo; ?>  </td>
                        <td> <img src="/imagenes/<?php echo $clasificacion->imagen; ?>" class="imagen-tabla"> </td>
                        <td> $ <?php echo $clasificacion->rangoPrecio; ?> </td>
                        <td>
                            <form method="POST" class="w-100" action="/clasificaciones/eliminar">
                                <input type="hidden" name="id" value=" <?php echo $clasificacion->id; ?>">
                                <input type="hidden" name="tipo" value="clasificaciones">
                                <input type="submit" class="boton-rojo-block" value="Eliminar ">
                            </form>
                            <a href="clasificaciones/actualizar?id=<?php echo $clasificacion->id; ?>" class="boton-amarillo-block">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </thead>
    </table>

</main>