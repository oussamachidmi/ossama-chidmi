let but=document.querySelectorAll("#home_femme article button");
but.forEach(element=>{
    element.onclick = function() {
     document.cookie="nav1="+this.name;
    }
})

let a=document.querySelectorAll(".flex a");
a.forEach(element=>{
    element.onclick = function() {
     document.cookie="nav4="+this.id;
    }
})
