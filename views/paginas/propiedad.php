<main class="seccion contenedor">

    <h2>Menú de <?php echo $clasificacion->tipo; ?> </h2>

    <div class="contenedor-tacos">
        <?php foreach($tacos as $taco ) : ?>
            <?php if($taco->clasificacionId  == $clasificacion->id) : ?>
                <div class="anuncio">
                    <img loading="lazy" src="/imagenes/<?php echo $taco->imagen; ?>" alt="anuncio1">
                    <div class="contenido-tacos">
                        <h3><?php echo $taco->titulo; ?></h3>
                        <?php
                            if($taco->plus == 4){
                                foreach($extras as $extra ) :
                                    if($extra->id <= 4): 
                                    ?>  <h3><?php echo $extra->titulo; ?></h3>
                                        <p class="precio">$<?php echo $extra->precio; ?></p>
                                    <?php    
                                    endif; 
                                endforeach;
                            }
                            if($taco->plus == 6){
                                foreach($extras as $extra ) :
                                    if($extra->id > 4 && $extra->id <= 6 ): 
                                    ?>  <h3><?php echo $extra->titulo; ?></h3>
                                        <p class="precio">$<?php echo $extra->precio; ?></p>
                                    <?php    
                                    endif; 
                                endforeach;
                            }

                            if($taco->plus == 8){
                                foreach($extras as $extra ) :
                                    if($extra->id > 6 && $extra->id <= 8 ):
                                    ?>  <h3><?php echo $extra->titulo; ?></h3>
                                        <p class="precio">$<?php echo $extra->precio; ?></p>
                                    <?php    
                                    endif; 
                                endforeach;
                            }   
                        ?> 
                        <!-- <?php foreach($extras as $extra ) : ?>
                            <?php if($extra->id <= 4): ?>
                                <h3><?php echo $extra->titulo; ?></h3>
                                <p class="precio">$<?php echo $extra->precio; ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>  -->
                    </div><!-- .contenido-anuncio -->
                </div> <!-- .anuncio-->
            <?php endif; ?>
        <?php endforeach; ?>
    </div><!-- .contenedor-anuncio-->
</main>