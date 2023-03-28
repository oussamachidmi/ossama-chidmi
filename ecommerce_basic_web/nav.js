var className = "inverted";
window.onscroll = function() {
  if (window.scrollY >=300 || window.pageYOffset >= 300) {
    document.getElementsByTagName("header")[0].classList.add(className);
    document.getElementById("sss").style.display ="none";
    document.querySelector("header hr").style.display="none"
    document.getElementById("ss").style.color="white";
    document.getElementById("ppn").style.display="none";

  } else {
    document.getElementsByTagName("header")[0].classList.remove(className);
    document.getElementById("sss").style.display ="block";
    document.getElementById("ss").style.color="black";
    document.getElementById("ppn").children[0].style.color="black";
    document.getElementsByClassName("panier")[0].style.top="30px"
    document.getElementById("ppn").style.display="block";

  }
};


// p.onclick = function(){
//   p.classList.remove("panier");
//   p.classList.add("paniercl");
// }
