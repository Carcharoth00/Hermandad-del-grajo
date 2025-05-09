document.addEventListener("DOMContentLoaded", () => {

    const images = document.querySelectorAll(".cuadros");
    const modal = document.querySelector(".modal");
    const modalImg = document.querySelector('.modal_img');
    const modalClose = modal.querySelector(".cerrar-modal");

    images.forEach(image => {
        image.addEventListener("click", function () {
            const src = this.src;
            const posiciones = src.slice(-6, -4);
            const nuevaRuta = src.slice(0, -7);
            modalImg.src = nuevaRuta + '/Completas/' + posiciones + '.png';
            modal.classList.add("modal--show");
            document.querySelector('.modal-overlay').style.display = 'block';
        });
    });

    modalClose.addEventListener("click", function (e) {
        e.preventDefault();
        modal.classList.remove("modal--show");
        document.querySelector('.modal-overlay').style.display = 'none';
    });

});