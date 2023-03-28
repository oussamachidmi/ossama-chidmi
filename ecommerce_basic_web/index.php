<?php  
include_once("connexiondb.php");
    $reqtrend="select * from produit";
    $ar=explode("/",$_COOKIE["pan1"]);
    $ar1=implode("\",\"",$ar);
    $requetpan="select * from produit where ProductID IN (\"".$ar1."\")";
    $sth1=$cnx->query($requetpan);
    $reponsepan=$sth1->fetchAll(PDO::FETCH_ASSOC);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css1.css">
    <link rel="stylesheet" href="./css2.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
   
    <title>brechos</title>
</head>
<body>
    <header>
        <p id="pp">PSS:LES FRAIS D'ENVOI VERS LE MAROC MÉTROPOLITAINE SONT OFFERTS DÈS 100dh D'ACHAT !</p>
        <div id="sss">
             <p id="ss"> VINTAGE SHOP - FREPPIER EN LIGNE </p>
        </div>
        <hr>
        <nav><ul>
            <li><a href="index.php">home</a></li>
            <li><a href="auth/signup.php">account</a></li>
            <li><a href="two">contact us</a></li>
        </ul></nav>
        <div class="panier" id="ppn" style="z-index: 1000;"> 
    <span id="span" class="material-icons" style="font-size: 32px;">shopping_bag</span> 
    <p id="title" style="color:black ;display:none;">PANIER</p><hr>
    <div id="ppn1" style="width:100% ; height:90% ;display:none; overflow:scroll" > 
    <?php 
     for($i=0;$i<$l;$i++){
        echo "<div class=\"divpan\" style=\" background-color:white; width:100% ; height:25%\"> <img style=\"float:left ;\" src=\"../image/".$reponsepan[$i]["image"]."\" > <p>".$reponsepan[$i]["ProductName"]."</p> <p>".$reponsepan[$i]["UnitPrice"]."</p></div><hr>";
    };
    if(count($reponsepan)){
        echo "<div style=\"display:flex ; flex-direction:row\ ;background-color:white \" id=\"passbt\">  <button  style=\"width:40%;margin-bottom: 50px; margin:50px 3% 50px 2%  \" >passer commande</button>
        <button  style=\"width:40%;margin-bottom: 50px; margin:50px 3% 50px 2%  \" id=\"clear\">clear pannier</button>
        </div>";
    };      
    ?> 
    
    </div>
    </div>
    </header>
    
    
    <!-- ############## -->
       <main id="main">
       <section id="one">
        <p id="brechos">BRECHOS</p>
        <video id="background-video" autoplay loop muted >
            <source src="vd/44.mp4" type="video/mp4">
         </video>
      </section>

       <!-- ############## -->
       <section id="two">
           <p>SHOP ON FIRE!</p>
           <hr>
           <p style="letter-spacing: 5px; color: rgb(61, 58, 58);">categories</p>
         <div id="home_femme" >
           <article style="background-image: url(images/me.jpeg);"><p>men</p>
            <button name="home" onclick="bt()"><a href="ovarticle/ovarticle.php" onclick="bt()">voir le produit</a></button>
        </article>
           <article style="background-image: url(images/women.jpeg);"><p>women</p>
            <button name="women"><a href="ovarticle/ovarticle.php" onclick="bt()">voir le produit</a></button>
        </article>
           <article style="background-image: url(images/men.jpeg);"><p>petit prix</p>
            <button name="enfant"><a href="ovarticle/ovarticle.php"onclick="bt()">voir le produit</a></button>
        </article> 
        </div>
           <aside id="aside1">
               <div>
               <img src="images/delivery.png" alt="livraison a domicile" width="100" height="100">
               <p>livraison à domicile dans mois de 48h </p>
              </div> 
              <div>
                <img src="images/payment-method.png" alt="payament" width="100" height="100">
                <p>choisir votre methode de peyemnt</p>
               </div>
           </aside>
       </section>

          <!-- ############## -->

       <section id="tree">
           </div>
           <div id="trend" style="height: auto; margin-right:30px;">
               <p>trend</p>
               <hr>
               <div class="flex" style=" flex-wrap:wrap ;height:auto ;margin-top:50px">
               <?php  include_once("connexiondb.php");
               $reqtrend = "select * from produit";
               $sth=$cnx->query($reqtrend);
               $reponse=$sth->fetchAll(PDO::FETCH_ASSOC);
               for($i=0;$i<count($reponse)-6;$i++){
                   $dev.="<a href=\"ovarticle/mainarticle/article/article.php\" id=\"".$reponse[$i]["ProductID"]."\" class=\"arti homearti\" ><div class=\"arti \"> <image src=\"ovarticle/mainarticle//image/".  $reponse[$i]["image"] . "\" > <p style=\"background-color:white\">".$reponse[$i]["ProductName"]."</p> <p>".$reponse[$i]["UnitPrice"]."</p></div></a>";
               };
               echo $dev;
               
                ?>
           </div>
           </div>
           <hr>  
       </section>
       
       <!-- ############## -->

       <section id="four">
           <div>
           <p>you can take a pomosion from us because your
                wondefull and always be
             happy and u will do it with working </p>
             <button>submet to take promotion</button>
           </div>
       </section>
        
           <!-- ############## -->

        <section id="five">
            <hr>
           <h3> ET SI VOUS VENIEZ NOUS VOIR ?</h3>
            <h2> NOTRE BOUTIQUE EST À LYON !</h2>
             <p>   La boutique a ouvert ses portes en Mars 2017.
                On vous accueille à Lyon, du lundi au samedi quartier Saint-Paul, avec le sourire !
                La sélection est différente de celle en ligne, et il y a les essayages et conseils en plus.
            </p>
             <p>   RDV au 8 quai de Bondy, 69005 Lyon</p>
                
              <p> En ce moment :
                Du Lundi au Samedi, de 12h00 à 19h00
              </p> 


        </section>   
        <section id="sex">
            <p>Super satisfaite de ma commande : la livraison est rapide, article de qualité et 
                un petit message attentionné. Merci ! Sarah</p>
        </section>
    </main>
    <footer>
        <div id="footer1">
            <div>  
                 <h4>A PROPOS
                </h4>
                <hr>
                 <p>Nous vous proposons une sélection d'articles de seconde-main, pour hommes & femmes, chinés avec amour aux quatre coins de la France !
                    Nous militons pour une mode différente, éthique et plus douce pour la planète.</p>
            </div>
            <div>
                <h4>INFORMATIONS INTÉRESSANTES</h4>
                <hr>
                <p>
                   livraison/ Retours <br><br>
                    Mentions légales / Conditions de vente
                </p>
            </div>
            <div>
                <h4>NEWSLETTER</h4>
                <hr>
                <form action="email.php" method="post">
                <p>Envie de recevoir de nos nouvelles ?! </p>
                <input type="email" name="recoisemail" placeholder="entre votre email email">
                <input type="submit">
                </form>
            </div>
        </div>

        <div id="footer2">
         <p>© BRECHOS - FRIPERIE EN LIGNE</p>
        </div>

    </footer>
    <script src="panie.js"></script>
    <script src="nav.js"></script>
    <script src="navigation.js"></script>
</body>
</html>