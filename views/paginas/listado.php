<div class="contenedor-anuncios">
    <?php foreach($clasificaciones as $clasificacion): ?>
        <div class="anuncio">
            <img loading="lazy" src="/imagenes/<?php echo $clasificacion->imagen; ?>" alt="anuncio" class="imagen-inicio">   
            <div class="contenido-anuncio">
                <h3><?php echo $clasificacion->tipo; ?></h3>
                <p><?php echo $clasificacion->descripcion; ?></p>
                <p class="precio">$<?php echo $clasificacion->rangoPrecio; ?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="wc">
                        <p>1</p>
                    </li>

                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="wc">
                        <p>0</p>
                    </li>

                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="wc">
                        <p>4</p>
                    </li>
                </ul>
                <a href="/propiedad?id=<?php echo $clasificacion->id;?>" class="boton boton-amarillo-block">Ver todos</a>
            </div><!-- .contenido-anuncio -->
        </div> <!-- .anuncio-->
    <?php endforeach; ?>
</div><!-- .contenedor-anuncio-->