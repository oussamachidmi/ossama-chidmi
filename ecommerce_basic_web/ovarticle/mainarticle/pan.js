let bt=document.getElementById("btt");
    let pn=document.getElementById("ppn1");
        bt.onclick= function(){
        let id=this.name.split("-")[0]+"-"+this.name.split("-")[1];
        let pan1= document.cookie.split(";").map(cookie=>cookie.split("="))[0][1];
        document.cookie="pan1="+pan1+"/"+id; 
        location.reload();
    }

