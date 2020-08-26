
/******************* STICKY HEADER *******************/

  // fonction permettant à l'entete (identité du site, menu,...) de faire suive le mouvement de la molette lorsqu'on descend ou monte dans les differentes page
window.onscroll = function () {
    myStickyHeader()
  };
  
  var header = document.getElementById("myHeader");
  var nav = document.getElementById("myNav")
  
  var sticky = header.offsetTop;
  
  
  // fonction permettant de superposer l'entete du site (identité du site, menu,...) afin qu'elle apparaisse au dessus

  function myStickyHeader() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
      myNav.classList.add("flexRow");
    } else {
      header.classList.remove("sticky");
      myNav.classList.remove("flexRow");
    }
  }