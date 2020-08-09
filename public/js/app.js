"use strict";

/**************Récupération des données de formulaire au moyen d'ajax sans rechargement de la page */
$(document).on('submit', "#contact");

/******** Flexslider *********/

$(window).on('load', function () {
  $('.flexslider').flexslider({
    directionNav: false,
    controlNav: false
  });
});