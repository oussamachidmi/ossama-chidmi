let ar=document.getElementById("ppn");
let ar2=document.getElementById("ppn1");
let span=document.getElementById("span");
let title=document.getElementById("title");
let bt1=document.getElementById("passbt");
console.log(ar);
let cp=1;
ar.onclick=function(){
    cp++;
    if(cp%2==0){
        ar.classList.remove("panier");
        ar.classList.add("paniercl");
        span.style.display="none";
        title.style.display="block"
        ar2.style.display="block";
        bt1.style.display="flex";

    }
    else {
        ar.classList.remove("paniercl");
        ar.classList.add("panier");
        span.style.display="inline";
        title.style.display="none"
        ar2.style.display="none";
        bt1.style.display="none";
    }

}

document.getElementById("clear").onclick= function(){
    document.cookie="pan1=0";
    location.reload();
}

