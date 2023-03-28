<?php 
include_once("../connexiondb.php"); 


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
    <link rel="stylesheet" href="ovarticle.css">
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
            <li><a href="../index.php">home</a></li>
            <li><a href="../auth/signup.html">account</a></li>
            <li><a href="two"> contact us</a></li>
        </ul></nav>
        <hr>
        <div class="panier" id="ppn" style="z-index: 1000;"> 
    <span id="span" class="material-icons" style="font-size: 32px;">shopping_bag</span> 
    <p id="title" style="color:black ;display:none;">PANIER</p><hr>
    <div id="ppn1" style="width:100% ; height:90% ;display:none; overflow:scroll" > 
    <?php 
    $l = count($reponsepan);
    for($i=0;$i<$l;$i++){
        echo "<div class=\"divpan\" style=\" background-color:white; width:100% ; height:25%\"> <img style=\"float:left ;\" src=\"../image/".$reponsepan[$i]["image"]."\" > <p>".$reponsepan[$i]["ProductName"]."</p> <p>".$reponsepan[$i]["UnitPrice"]."</p></div><hr>";
    }
    if(count($reponsepan)){
        echo "<div style=\"display:flex ; flex-direction:row\" id=\"passbt\">  <button  style=\"width:40%; margin:50px 3% 50px 2%  \" >passer commande</button>
        <button  style=\"width:40%;margin-bottom: 50px; margin:50px 3% 50px 2%  \" id=\"clear\">clear pannier</button>
        </div>";
    }      
    ?>
    
    </div>
    </div>
    </header>
        </div>
    <!-- ############## -->
       <main id="ovrarticle">

     <article  style="background-image:url(11.jpg);">
         <p>DERNIER OUVRAGE</p>
         <button name="heautes"><a href="mainarticle/mainarticle.php"> voirs les produits</a></button>
     </article>    
     <article style="background-image:url(pull.jpg);">
        <p>PULL</p>
        <button  name="pull"> <a href="mainarticle/mainarticle.php"> voirs les produits </a></button>
    </article>    
    <article  style="background-image:url(bottom.jpg);">
        <p>SHORT</p>
        <button name="short"><a href="mainarticle/mainarticle.php"> voirs les produits</a></button>
    </article>    
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
    <script src="nav.js" defer></script>
    <script src="panie.js" defer></script>
    <script src="navigation2.js" defer></script>
    <script src="mainarticle/pan.js"></script>


    
    
</body>
</html>