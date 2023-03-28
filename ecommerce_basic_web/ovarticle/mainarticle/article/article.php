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
    <link rel="stylesheet" href="../css1.css">
    <link rel="stylesheet" href="article.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
   
    <title>brechos</title>
</head>
<body>
    <header>
        <p id="pp">PSS:LES FRAIS D'ENVOI VERS LE MAROC MÉTROPOLITAINE SONT OFFERTS DÈS 100dh D'ACHAT !</p>
        <div id="sss">
             <p id="ss" style="margin-left: 500px;"> VINTAGE SHOP - FREPPIER EN LIGNE </p>
        </div>
        <hr>
        <nav><ul>
            <li><a href="../../../index.php">about</a></li>
            <li><a href="../../../auth/signup.html">account</a></li>
            <li><a href="#footer"> contact us</a></li>
        </ul></nav>
        <hr>
    </header>
    
    <div class="panier" id="ppn" style="z-index: 1000;"> 
    <span id="span" class="material-icons" style="font-size: 32px;">shopping_bag</span> 
    <p id="title" style="color:black ;display:none;">PANIER</p><hr>
    <div id="ppn1" style="width:100% ; height:90% ;display:none; overflow:scroll" > 
    <?php 
    $l = count($reponsepan);
    for($i=0;$i<$l;$i++){
        echo "<div class=\"divpan\" style=\" background-color:white; width:100% ; height:25%;\"> <img style=\" float:left; margin:0px\" src=\"../image/".$reponsepan[$i]["image"]."\" > <p style=\"text-align:left;\">".$reponsepan[$i]["ProductName"]."</p> <p style=\"text-align:center;\">".$reponsepan[$i]["UnitPrice"]."</p></div><hr>";
    }
    if(count($reponsepan)){
        echo "<div style=\"display:flex ;margin-top:100px; flex-direction:row\" id=\"passbt\">  <button  style=\"width:40%;margin-bottom: 50px; margin:50px 3% 50px 2% ; onclick=\"passcmd()\"\" > <a href=\"cmd.php\" style=\"font-size:10px\"> passer commande</a></button>
        <button  style=\"width:40%;margin-bottom: 50px; margin:50px 3% 50px 2%  \" id=\"clear\">clear pannier</button>
        </div>";
    }      
    ?>
    </div>
    </div>
    <!-- ############## -->
       <main id="article">
       <?php
    $requet="select * from produit where ProductID=\"".$_COOKIE["nav4"]."\"";
    include_once("../connexiondb.php");
    $sth=$cnx->query($requet);
    $reponse=$sth->fetchAll(PDO::FETCH_ASSOC);  
    ?>
      <div id="article1">
       <?php echo "<img src=\"../image/". $reponse[0]["image"]. "\"  alt=\"article\" >" ?>
        <div id="info">
        <p><?php echo $reponse[0]["ProductName"] ?></p>
        <p id="p">Joli T-shirt mixte de couleur noire avec un visage masculin et une inscription au devant. A manches courtes, il a une encolure ronde.

            Composition non indiquée mais sans doute du coton
            
            Taille non indiquée - Taille Look-Vintage : 36-38 homme / 38-40 femme
            
            Dimensions : 49 cm de largeur d'épaules, 70 cm de long
         Seulement 1 exemplaire en stock !</p>
         <p><?php echo $reponse[0]["UnitPrice"]?></p>
       <?php $req=implode("-",$reponse[0]);
        echo  "<button name=\"".$req."\" id=\"btt\">ajouter panier</button> <div id=\"editor\"></div><button id=\"cmd\">generate PDF</button>" ; ?>
        <div>
            <form action="article.php" method="POST">
                <input type="text" name="avis" placeholder="votre avis...." style="margin-top: 60px; width:300px ; height:100px; border:0px">
                <input type="submit" style="background-color: #EEEE ; height:100px; border:0px">
            </form>
        </div>
        </div>
    </div>
    </main>
    <script src="../pan.js"></script>
    <script src="../panie.js"></script>
    <script>
  
  var doc = new jsPDF();
  var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#article').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});
    </script>
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
                <form action="article.php" method="post">
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
  

</body>
</html>