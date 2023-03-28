let but=document.querySelectorAll(".flex a");
but.forEach(element=>{
    element.onclick = function() {
     document.cookie="nav4="+this.id;
    }
})
