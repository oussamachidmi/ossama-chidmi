document.getElementById("plus").addEventListener('click',(event)=>{
    let counter=parseInt(document.getElementById("count").innerHTML)
    counter+=1
    document.getElementById("count").innerHTML=counter
})

document.getElementById("minus").addEventListener('click',(event)=>{
    let counter=parseInt(document.getElementById("count").innerHTML)
    counter-=1
    document.getElementById("count").innerHTML=counter
})