<div class="fondo">
    <main class="contenedor">
        <h1> Contacto</h1>

        <?php if($mensaje): ?>
            <p class="alerta exito"> <?php echo $mensaje; ?> </p>
        <?php endif; ?>

        <picture>
            <source class="alto" srcset="build/img/destacada.webp" type="image/webp">
            <source class="alto" srcset="build/img/destacada.jpg" type="jpeg">
            <img class="alto" loading="lazy" src="build/img/destacada.jpg" alt="img contacto">
        </picture>
        <h3>Envíanos un Mensaje</h3>
        <form class="formulario" action="/contacto" method="POST">
            <div class="row">
                
                    <label for="nombre">Nombre</label>
                    <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required>
                

                
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
                
            </div>

            <fieldset>
                <legend>Como desea ser Contactado</legend>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>
                    
                    <label for="contactar-email">Email</label>
                    <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
                </div> 
                <div id="contacto"></div>
                
            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

    <section class="contenedor seccion">
        <div class="iconos-nosotros contacto">
            <div class="icono">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="12" cy="11" r="3" />
                        <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                    </svg>
                    <h3>Ubicación</h3>
                <p>Narcizo Mendoza #49, colonia providencia. Huajuapan de León, Oaxaca, México.</p>
            </div>
            <div class="icono">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone-call" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                        <path d="M15 7a2 2 0 0 1 2 2" />
                        <path d="M15 3a6 6 0 0 1 6 6" />
                    </svg>
                    <!-- <img src="build/img/icono_moto.svg" alt="Icono precio" loading="lazy"> -->
                    <h3>Llámanos</h3>
                <p class="celular">Celular: (+52)953 107 51 30</p>
                <p class="celular">Fijo:(953) 503 41 44</p>
            </div>
            <div class="icono">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="12" cy="12" r="9" />
                        <polyline points="12 7 12 12 15 15" />
                    </svg>
                    <!-- <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy"> -->
                    <h3>Horario</h3>
                <p>Servicio de 16:00hrs a 3:00 hrs</p>
                <p>de Lunes a Domingo</p>
            </div>
        </div> 
    </section>
</div>