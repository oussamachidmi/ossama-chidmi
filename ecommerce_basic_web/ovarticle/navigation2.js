let but=document.querySelectorAll("#ovrarticle article button");
but.forEach(element=>{
    element.onclick = function() {
     document.cookie="nav2="+this.name;
    }
})
