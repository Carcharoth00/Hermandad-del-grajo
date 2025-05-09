document.addEventListener("DOMContentLoaded", () => {
    let lienzo = document.getElementById("nav-barr");
    if (lienzo) {
        document.addEventListener("scroll", () => {
            let scrollAbajo = window.scrollY;
            if (scrollAbajo >= 0 && scrollAbajo <= 1) {
                lienzo.style.backgroundColor = "transparent";
            } else if (scrollAbajo > 10) {
                lienzo.style.backgroundColor = "#B6602E";
            } else {
                lienzo.style.backgroundColor = "#B6602E";
            }
        });
    } else {
        console.error("Elemento con id 'nav-bar' no encontrado"); // Depuración
    }
});