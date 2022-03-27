document.addEventListener('DOMContentLoaded',function(){
    eventListeners();
    darkmode();
});

function eventListeners(){
    const mobileMenu=document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click',navegacionResponsive);

    // Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click',mostrarMetodosContacto ));
}

function navegacionResponsive(){
    const navegacion=document.querySelector('.navegacion');
    navegacion.classList.toggle('mostrar');
}

function darkmode(){
    const botonDarkMode=document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click',function(){
    document.body.classList.toggle('dark-mode');
    });
}
 
function mostrarMetodosContacto(e){
    const contactoDiv = document.querySelector('#contacto');
    if(e.target.value === 'telefono'){
        contactoDiv.innerHTML =`
            <label for="telefono">Telefono</label>
            <input type="tel" placeholder="Tu telefono" id="telefono" name="contacto[telefono]">
            
            <p>Elija la fecha y la hora para la llamada</p>
                
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora</label>
            <input type="time" id="hora" min="16:00" max="03:00" name="contacto[hora]">
        `; 
    }else{
        contactoDiv.innerHTML = `
            <label for="email">Email</label>
            <input type="email" placeholder="Tu E-mail" id="email" name="contacto[email]" required>
        `;
    }
}