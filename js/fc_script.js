document.addEventListener('DOMContentLoaded', function () {
    const sliderContent = document.querySelector('.slider-content');
    const slides = document.querySelectorAll('.slide');
    let currentIndex = 0;
    const totalSlides = slides.length;

    function showNextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides;
        const offset = -currentIndex * 100;
        sliderContent.style.transform = `translateX(${offset}%)`;
    }

    setInterval(showNextSlide, 5000); // Cambia de slide cada 5 segundos
});



// Función para simular la adquisición de una propiedad
function adquirirPropiedad(id) {
    alert("Has adquirido la propiedad con ID: " + id);
}

// Función que alerta al usuario que debe iniciar sesión
function alertaLogin() {
    alert("Debes iniciar sesión o registrarte para adquirir una propiedad.");
}

function fc_validar_mensaje() {
    const mensaje = document.getElementById('mensaje').value;
    const max_length = 500; // Máximo de caracteres permitidos
    const caracteres_prohibidos = ['<', '>', '$', '%', '&', '#']; // Puedes agregar más caracteres aquí

    // Comprobar la longitud del mensaje
    if (mensaje.length > max_length) {
        alert('El mensaje es demasiado largo. Máximo 500 caracteres.');
        return false; // Evitar el envío del formulario
    }

    // Comprobar si hay caracteres inapropiados
    for (let caracter of caracteres_prohibidos) {
        if (mensaje.includes(caracter)) {
            alert('El mensaje contiene caracteres no permitidos.');
            return false; // Evitar el envío del formulario
        }
    }

    return true; // Mensaje válido, permitir el envío del formulario
}
