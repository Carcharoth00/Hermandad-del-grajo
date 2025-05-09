document.addEventListener("DOMContentLoaded", () => {

    //Vuelve invisible la barra de navegación arriba del todo y le pone color al bajar.
    let lienzo = document.getElementById("nav-bar");
    if (lienzo) {
        document.addEventListener("scroll", () => {
            let scrollAbajo = window.scrollY;
            if (scrollAbajo >= 0 && scrollAbajo <= 1) {
                lienzo.style.backgroundColor = "transparent";
            } else if (scrollAbajo > 10) {
                lienzo.style.backgroundColor = "#b81414";
            } else {
                lienzo.style.backgroundColor = "#b81414";
            }
        });
    } else {
        console.error("Elemento con id 'nav-bar' no encontrado"); // Depuración
    }
});