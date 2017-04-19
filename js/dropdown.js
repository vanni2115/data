/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction1() {
    document.getElementById("myDropdown1").classList.toggle("show-my");
}

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
}




function myFunction2() {
    document.getElementById("myDropdown2").classList.toggle("show-my1");
}

// // Close the dropdown menu if the user clicks outside of it
// window.onclick = function(event) {
//   if (!event.target.matches('.dropbtn-my1')) {

//     var dropdowns1 = document.getElementsByClassName("dropdown-content-my1");
//     var i;
//     for (i = 0; i < dropdowns1.length; i++) {
//       var openDropdown1 = dropdowns1[i];
//       if (openDropdown1.classList.contains('show-my1')) {
//         openDropdown1.classList.remove('show-my1');
//       }
//     }
//   }
// }
