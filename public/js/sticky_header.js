
/******************* STICKY HEADER *******************/

// je scroll et execute myStickyHeader
window.onscroll = function () {
    myStickyHeader()
  };
  
  // selctionner Header & Nav
  var header = document.getElementById("myHeader");
  var nav = document.getElementById("myNav")
  
  //  offset position de la navbar
  var sticky = header.offsetTop;
  
  // Ajout de la class sticky au header & flexRow à la nav quand je scroll. annuler "sticky" en revenant en haut du site
  function myStickyHeader() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
      myNav.classList.add("flexRow");
    } else {
      header.classList.remove("sticky");
      myNav.classList.remove("flexRow");
    }
  }

  /******************* navbar scroll **************************** */

// window.onscroll = function () {
//   scrollFunction()
// };

// function scrollFunction() {
//   if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
//     document.getElementById("navbar").style.padding = "30px 10px";
//     document.getElementById("logo").style.fontSize = "25px";
//   } else {
//     document.getElementById("navbar").style.padding = "80px 10px";
//     document.getElementById("logo").style.fontSize = "35px";
//   }
// }