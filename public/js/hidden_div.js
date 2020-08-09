/******************* HIDDEN DIV **************************** */

$(document).ready(
    function(){
  const button = document.getElementById('toggleButton');
  
  button.addEventListener('click', event => {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  })
  })