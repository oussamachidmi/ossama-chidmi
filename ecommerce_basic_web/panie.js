let ar=document.getElementById("ppn");
console.log(ar);
let cp=1;
ar.onclick=function(){
    console.log("test");
    cp++;
    if(cp%2==0){
        ar.classList.remove("panier");
        ar.classList.add("paniercl");
        ar.innerHTML="<p style=\"color:black\";>PANIER</p> <hr>";
        console.log("test1");
    }
    else {
        ar.classList.remove("paniercl");
        ar.classList.add("panier");
        ar.innerHTML=" <span class=\"material-icons\" style=\"font-size: 32px;\">shopping_bag</span> "    
        console.log("test2");


    }

}

