/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction1() {
    document.getElementById("myDropdown1").classList.toggle("show-my");
}
// function myFunction2() {
//     document.getElementById("myDropdown2").classList.toggle("show-my1");
// }

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn-my')) {

    var dropdowns = document.getElementsByClassName("dropdown-content-my");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show-my')) {
        openDropdown.classList.remove('show-my');
      }
    }
  }
  // if (!event.target.matches('.dropbtn-my1')) {

  //   var dropdowns1 = document.getElementsByClassName("dropdown-content-my1");
  //   var j;
  //   for (j = 0; j < dropdowns.length; j++) {
  //     var openDropdown1 = dropdowns[j];
  //     if (openDropdown1.classList.contains('show-my1')) {
  //       openDropdown1.classList.remove('show-my1');
  //     }
  //   }
  // }
}
/*window.onclick = function(event) {
  
}*/