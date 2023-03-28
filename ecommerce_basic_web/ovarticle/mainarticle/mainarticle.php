<?php 
include_once("connexiondb.php"); 


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
    <link rel="stylesheet" href="css1.css" >
    <link rel="stylesheet" href="css2.css" >
    <link rel="stylesheet" href="css_main_article.css" media="none" onload="if(media!=='all')media='all'">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
            <li><a href="../../index.php">home</a></li>
            <li><a href="../../auth/signin.php">account</a></li>
            <li><a href="#footer"> contact us</a></li>
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
        echo "<div style=\"display:flex ; flex-direction:row; background-color:white;\" id=\"passbt\">  <button  style=\"width:40%; margin:50px 3% 50px 2%  \" >passer commande</button>
        <button  style=\"width:40%;margin-bottom: 50px; margin:50px 3% 50px 2%  \" id=\"clear\">clear pannier</button>
        </div>";
    }      
    ?>
    
    </div>
    </div>
    </header>
    <main>
        <div>

      
        <aside>
            <details>
                <summary>Filter</summary>
                <ul>
                    <li>new trend</li>
                    <li>peti enfant</li>
                    <li>jeans</li>
                    <li>pulls</li>
                    <li>shoos</li>
                </ul>
            </details>
        </aside>
    </div>
       <div class="articles" style="height: auto;">
           <p>ARTICLE</p>
           <hr>
           <div class="flex">
               <?php  include_once("connexiondb.php");
               $des="\"".$_COOKIE["nav1"]."-".$_COOKIE["nav2"]."\"";
               $reqtrend = "select * from produit where description=".$des;
               $sth=$cnx->query($reqtrend);
               $reponse=$sth->fetchAll(PDO::FETCH_ASSOC);
               for($i=0;$i<count($reponse);$i++){
                   $dev.="<a href=\" article/article.php\" id=\"".$reponse[$i]["ProductID"]."\" class=\"arti\" ><div class=\"arti\"> <image src=\"image/".  $reponse[$i]["image"] . "\" > <p>".$reponse[$i]["ProductName"]."</p> <p style=\"text-align:center;color:black\"> ".$reponse[$i]["UnitPrice"]."</p></div></a>";
               };
               echo $dev;
               

                ?>
           </div>
          <?php echo $reqtrend ?>
       </div>


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
    <script src="panie.js" ></script>
    <script src="navigation3.js" ></script>
    <script src="pan.js"></script>
</body>
</html>