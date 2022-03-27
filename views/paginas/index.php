<section class="home">
    <div class="conte-home">
        <h1>Bienvenidos a Taquería La Parrilla</h1>
        <p class="bienvenida">
            Aromas, sabores, colores… un ambiente que inmediatamente te transportará. 
            Bienvenidos a La Taqueria, ¡Bienvenidos a México!
        </p>
        <p class="bienvenida-end">
            La Taqueria, auténtica gastronomía callejera mexicana.
        </p>
    </div> 
</section>
<main class="contenedor seccion">
    <h2 class="icon-txt"> Servicios</h2>

    <?php include 'iconos.php'; ?> 
    
</main>
<section class="seccion contenedor">
    <h2>Menú: Tacos y Bebidas</h2>
    <?php 
        include 'listado.php';
    ?>
    
    <div class="alinear-derecha">
        <a href="/propiedades" class="boton-verde">Ver Todas</a>
    </div>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/platillo4.webp" type="image/webp">
                    <source srcset="build/img/platillo4.jpg" type="image/jpeg">
                    <img loading="lazy" srcset="build/img/platillo4.jpg" alt="entrada blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="servicios.php">
                    <h4>Taquizas hasta tu hogar</h4>
                    <p>Escrito el: <span>16/02/2022</span> por: <span>Daniel Castillo</span> </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellat perspiciatis hic? 
                        Non id quaerat nam voluptate atque necessitatibus ullam culpa aut, natus error harum fuga? Corrupti dolores nemo magni.
                    </p>

                </a>
            </div>
        </article><!-- .entrada-blog -->

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/platillo11.webp" type="image/webp">
                    <source srcset="build/img/platillo11.jpg" type="image/jpeg">
                    <img loading="lazy" srcset="build/img/platillo11.jpg" alt="entrada blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="servicios.php">
                    <h4>Servicio por kg y/o encargo</h4>
                    <p>Escrito el: <span>16/02/2022</span> por: <span>Daniel Castillo</span> </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellat perspiciatis hic? 
                        Non id quaerat nam voluptate atque necessitatibus ullam culpa aut, natus error harum fuga? Corrupti dolores nemo magni.
                    </p>

                </a>
            </div>
        </article><!-- .entrada-blog -->
    </section><!-- blog -->

    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal se comportó de una excelente forma, muy buena atención y el menú que me ofrecieron cumple con todas mis expectativas.
            </blockquote>
            <p> Daniel Castillo Gonzalez</p>
        </div>
    </section>
</div>