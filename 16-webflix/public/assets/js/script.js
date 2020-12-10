// alert('Le JS fonctionne bien');

// Détecter s'il y a du scroll ?
// Si la hauteur de la page (avec le scroll) est supérieur à la fenètre (visible)
if ($(document).height() <= $(window).height()) {
    // On va ajouter la classe .sticky-to-bottom s'il y n'a pas de scroll
    $('footer').addClass('sticky-to-bottom');
}

// On doit exécuter le code précèdent au resize de la fenêtre
// @todo Régler le petit soucis du footer
$(window).resize(function () {
    if ($(document).height() <= $(window).height()) {
        $('footer').addClass('sticky-to-bottom');
    } else {
        $('footer').removeClass('sticky-to-bottom');
    }
});
