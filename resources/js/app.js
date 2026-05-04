import './bootstrap';

ScrollReveal().reveal('.navbarprincipal', {
    duration: 4000,
    origin: 'top',
    distance: '400px',

});

ScrollReveal().reveal('.tituloportada', {
    duration: 3000,
    origin: 'top',
    distance: '400px',
});

ScrollReveal().reveal('.botonesportada-1', {
    duration: 4000,
    origin: 'left',
    distance: '550px',
});

ScrollReveal().reveal('.botonesportada-2', {
    duration: 4000,
    origin: 'right',
    distance: '550px',
});

ScrollReveal().reveal('.botonsaltarin', {
    duration: 5000,
    origin: 'top',
    distance: '400px',
});

ScrollReveal().reveal('.seccion-institucion-1', {
    duration: 1500,
    origin: 'left',
    distance: '400px',
});

ScrollReveal().reveal('.seccion-institucion-2', {
    duration: 1500,
    origin: 'right',
    distance: '400px',
});

ScrollReveal().reveal('.boton1', {
    duration: 3000,
    origin: 'left',
    distance: '400px',

});
ScrollReveal().reveal('.boton2', {
    duration: 3000,
    origin: 'right',
    distance: '400px',

});

ScrollReveal().reveal('.card1', {
    duration: 1000,
    origin: 'top',
    distance: '150px',

});
ScrollReveal().reveal('.card2', {
    duration: 1500,
    origin: 'top',
    distance: '150px',

});
ScrollReveal().reveal('.card3', {
    duration: 2000,
    origin: 'top',
    distance: '150px',

});

ScrollReveal().reveal('.titulo-tecnologias', {
    duration: 3000,
    origin: 'top',
    distance: '50px',

});

ScrollReveal().reveal('.curso-1', {
    duration: 1000,
    origin: 'top',
    distance: '100px',

});

ScrollReveal().reveal('.curso-2', {
    duration: 1500,
    origin: 'top',
    distance: '100px',

});

ScrollReveal().reveal('.curso-3', {
    duration: 2000,
    origin: 'top',
    distance: '100px',

});

ScrollReveal().reveal('.porque-elegirnos', {
    duration: 1500,
    origin: 'top',
    distance: '100px',
});

ScrollReveal().reveal('.seccion-dudas', {
    duration: 1500,
    origin: 'top',
    distance: '100px',
});

ScrollReveal().reveal('.seccion-formulario', {
    duration: 1500,
    origin: 'top',
    distance: '100px',
});

ScrollReveal().reveal('.convenio-1', {
    duration: 1000,
    origin: 'top',
    distance: '100px',
});

ScrollReveal().reveal('.convenio-2', {
    duration: 2000,
    origin: 'top',
    distance: '100px',
});

ScrollReveal().reveal('.acuerdo-titulo', {
    duration: 1000,
    origin: 'top',
    distance: '50px',
});

ScrollReveal().reveal('.acuerdo-1', {
    duration: 1500,
    origin: 'left',
    distance: '900px',
});

ScrollReveal().reveal('.acuerdo-2', {
    duration: 1500,
    origin: 'right',
    distance: '900px',
});

window.addEventListener('scroll', function() {
    var scroll = document.querySelector('.scrollTop');
    scroll.classList.toggle("active", window.scrollY > 500);
});

// Script para indicador del menú
/* let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('.menu a');

window.onscroll = () => {
    sections.forEach(sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if ((top >= offset) && top < (offset + height)) {
            navLinks.forEach(link => {
                link.classList.remove('active');
            });
            let currentLink = document.querySelector('.menu a[href*=' + id + ']');
            if (currentLink) {
                currentLink.classList.add('active');
            }
        }
    });
}; */


//esto es para el smooth    
$('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
            location.hostname == this.hostname
        ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000, function() {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    };
                });
            }
        }
    });