document.addEventListener("DOMContentLoaded", () => {
	jQuery(document).ready(function ($) {

		var animating = false;

		//Actualiza la visibilidad de las flechas y detecta si la seccion esta o no visible
		setSlider();
		$(window).on('scroll resize', function () {
			(!window.requestAnimationFrame) ? setSlider() : window.requestAnimationFrame(setSlider);
		});
		//Observa cada vez que la ventana se desplaza. 
		//La ternaria prepara al navegador para realizar una animación, si la respuesta del navegador es true, activa la funcion slider,
		//Si es false, pide al navegador que se prepare para la animación y entonces activa la función.

		function setSlider() {
			checkNavigation();
			checkVisibleSection();
		}

		//Detecta cual es la sección que se está viendo ahora en pantalla
		function checkVisibleSection() {
			var scrollTop = $(window).scrollTop(),
				windowHeight = $(window).height();

			$('[data-type="slider-item"]').each(function () {
				var actualBlock = $(this),
					offset = scrollTop - actualBlock.offset().top;
					
				//quita o pone la clase .is-visible si la sección está en la ventana gráfica. Para navegar a través de las secciones
				(offset >= 0 && offset < windowHeight) ? actualBlock.addClass('is-visible') : actualBlock.removeClass('is-visible');
			});
			/**
			 * Primero obtiene el desplazamiento vertical y la altura actual de la ventana.
			 * Selecciona los elementos con el data-type slider
			 * Se almacena en offset la distancia entre la parte superior y la del elemento actual, restando la posición vertical del elemento y la del desplazamiento
			 * Despues se realiza una ternaria, si el elemento this esta en ventana, si offset es >= 0 y menor que la altura, el objeto se está mostrando, asique se añade la clase is-visible
			 * Si no cumple estos requisitos, quita la clase.
			 */
		}

		//Modifica la visibilidad de las flechas de navegacion con dos ternarias
		function checkNavigation() {
			($(window).scrollTop() < $(window).height() / 2) ? $('.cd-vertical-nav .cd-prev').addClass('inactive') : $('.cd-vertical-nav .cd-prev').removeClass('inactive');
			($(window).scrollTop() > $(document).height() - 3 * $(window).height() / 2) ? $('.cd-vertical-nav .cd-next').addClass('inactive') : $('.cd-vertical-nav .cd-next').removeClass('inactive');
			/** window.scrollTop devuelve la cantidad de pixeles que se ha desplazado verticalmente la pantalla. window.height devuelve la altura de la pantalla.
			* Comprueba si la situación de la pantalla es menor que la mitad de la altura de la ventana. Si es así, añade la clase inactive, que oculta el boton superior cuando no es necesario.	
			* En caso contrario, la ternaria elimina la clase inactive
			* La segunda linea comprueba si el desplazamiento vertical es mayor que la altura total menos 1,5 veces el tamaño de la ventana. Si es así añade inactive a la flecha inferior y sino la quita.
			*/
		}

		//Movimiento de una sección a otra
		$('.cd-vertical-nav .cd-prev').on('click', function () {
			prevSection();
		});
		$('.cd-vertical-nav .cd-next').on('click', function () {
			nextSection();
		});

		//Permite usar las flechas del teclado para activar las funciones de desplazamiento
		$(document).keydown(function (event) {
			if (event.which == '38') {
				prevSection();
				event.preventDefault();
			} else if (event.which == '40') {
				nextSection();
				event.preventDefault();
			}
		});

		//Moverse a la siguiente sección
		function nextSection() {
			if (!animating) {
				if ($('.is-visible[data-type="slider-item"]').next().length > 0) smoothScroll($('.is-visible[data-type="slider-item"]').next());
			}
		}

		function prevSection() {
			if (!animating) {
				var prevSection = $('.is-visible[data-type="slider-item"]');
				if (prevSection.length > 0 && $(window).scrollTop() != prevSection.offset().top) {
					smoothScroll(prevSection);
				} else if (prevSection.prev().length > 0 && $(window).scrollTop() == prevSection.offset().top) {
					smoothScroll(prevSection.prev('[data-type="slider-item"]'));
				}
			}
		}

		function smoothScroll(target) {
			if (target.length > 0) {
				animating = true;
				$('body,html').animate({ 'scrollTop': target.offset().top }, 500, function () {
					animating = false;
				});
			}
		}


		const text = document.querySelectorAll(".cd-fixed-background");
		const modal = document.querySelector(".modal");
		const modalImg = document.querySelector('.modal-img');
		const paragraph = document.querySelector('.modal-text');
		const modalClose = modal.querySelector(".cerrar-modal");


		text.forEach(element => {
			element.addEventListener("click", function () {
				const id = this.id; // Captura el id del elemento clicado
				let src, textContent;
				switch (id) {
					case 'vi':
						src = '../imagenes/galeria/Completas/05.png';
						textContent = "Violet Mandolin-Birdwhistle\nUna rosa con un millón de espinas";
						break;
					case 'pipa':
						src = '../imagenes/galeria/Completas/03.png';
						textContent = "Philippa Pelerín\nAhora me ves, ahora no me ves";
						break;
					case 'krenk':
						src = '../imagenes/galeria/Completas/02.png';
						textContent = "Krentrin Blackstone \nArgrhhggff";
						break;
					case 'kalan':
						src = '../imagenes/galeria/Completas/04.png';
						textContent = "Kalan Blackstone\n Guapo, hábil y soso";
						break;
					default:
						src = '';
						textContent = '';
				}

				if (src && textContent) {
					modalImg.src = src;
					const textLines = textContent.split('\n');
					paragraph.innerHTML = `<p class="modal-nombre">${textLines[0]}</p><p class="modal-text">${textLines[1]}</p>`;
					modal.classList.add("modal--show");
					document.querySelector('.modal-overlay').style.display = 'block';
				}
			});
		});

		modalClose.addEventListener("click", function (e) {
			e.preventDefault();
			modal.classList.remove("modal--show");
			document.querySelector('.modal-overlay').style.display = 'none';
		});

	});
});