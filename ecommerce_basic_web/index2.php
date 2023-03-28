<?php
session_start();
if($_SESSION['autoriser']!='oui')
{
    header("Location:../index.php");
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css1.css">
    <link rel="stylesheet" href="css2.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
   
    <title>brechos</title>
</head>
<body>
    <header>
        <p id="pp">PSS:LES FRAIS D'ENVOI VERS LE MAROC MÉTROPOLITAINE SONT OFFERTS DÈS 100dh D'ACHAT ! </p>
        <div id="sss">
             <p id="ss"> VINTAGE SHOP - FREPPIER EN LIGNE </p>
        </div>
        <hr>
        <nav style="width: 90%;"><ul>
            <li><a href="#four">categorie</a></li>
            <li><a href="auth/signup.html">account</a></li>
            <li><a href="#two"> contact us</a></li>
            <li><a href="auth/deconnexion.php">Déconnexion</a></li>
            <li></li>
        </ul></nav>
        <div class="panier" id="ppn">  <span class="material-icons" style="font-size: 32px;">shopping_bag</span>
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
           <p id='four' style="letter-spacing: 5px; color: rgb(61, 58, 58);">categories</p>

         <div id="home_femme">
           <article style="background-image: url(images/trend.jpeg);">
            <p>trend</p>
            <button><a href="ovarticle/ovarticle.html">voir le produit</a></button>
        </article>
           <article style="background-image: url(images/me.jpeg);"><p>men</p>
            <button><a href="ovarticle/ovarticle.html">voir le produit</a></button>
        </article>
           <article style="background-image: url(images/women.jpeg);"><p>women</p>
            <button><a href="ovarticle/ovarticle.html">voir le produit</a></button>
        </article>
           <article style="background-image: url(images/men.jpeg);"><p>petit prix</p>
            <button><a href="ovarticle/ovarticle.html">voir le produit</a></button>
        </article> 
     </article>
           <article style="background-image: url(images/pti.jpeg);"><p>enfant</p>
            <button><a href="ovarticle/ovarticle.html">voir le produit</a></button>
        </article>
        </div>
           <aside id="aside1">
               <div>
               <img src="images/delivery.png" alt="livraison a domicile" width="100" height="100">
               <p>livraison à domicile dans moins de 48h </p>
              </div> 
              <div>
                <img src="images/payment-method.png" alt="payament" width="100" height="100">
                <p>choisir votre methode de payement</p>
               </div>
           </aside>
       </section>

          <!-- ############## -->

       <section id="tree">
           <p>summer is coming</p>
           <hr>
           <div class="flex">
               <div class="arti" >
                   <img src="images/11.jpg" alt="">
                   <p>beauty</p>
                   <p>desctip sadasda asdasidojasd 
                       jsadnkjans sjdaknsjnakdkaj 
                       kjnsadjka </p>
               </div>   
               <div class="arti" >
               <img src="images/11.jpg" alt="">
                   <p>beauty</p>
                   <p>desctip sadasda asdasidojasd 
                       jsadnkjans sjdaknsjnakdkaj 
                       kjnsadjka </p>
               </div>  
                <div class="arti" >
                <img src="images/article3.jpeg" alt="">
                   <p>beauty</p>
                   <p>desctip sadasda asdasidojasd 
                       jsadnkjans sjdaknsjnakdkaj 
                       kjnsadjka </p>
               </div>
           </div>
           <div id="trend">
               <p>trend</p>
              <div>
               <?php  
                       
                ?>;
               </div>
           </div>
           <hr>
           <div id="last">
               <p>last product</p>
               <div id="#navdiv"></div>
           </div>
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
</body>
</html>