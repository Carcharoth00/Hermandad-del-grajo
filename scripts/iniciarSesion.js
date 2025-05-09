document.addEventListener("DOMContentLoaded", () => {

    const botonRegistro = document.getElementById("botonRegistro");
    const botonAtras = document.getElementById("botonAtras");
    const loginForm = document.getElementById("login");
    const registroForm = document.getElementById("registro");

    botonRegistro.addEventListener("click", () => {
        loginForm.style.display = "none";
        registroForm.style.display = "block";
    });

    botonAtras.addEventListener("click", () => {
        registroForm.style.display = "none";
        loginForm.style.display = "block";
    });

});