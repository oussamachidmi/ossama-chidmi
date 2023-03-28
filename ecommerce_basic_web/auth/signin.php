<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css1.css">
    <link rel="stylesheet" href="cssauth.css">
    <title>
        formulaire de connexion
    </title>
    
    
</head>
<body>
<header>
      
      <nav><ul>
          <li><a href="/index2.php">home</a></li>
          <li><a href="auth/signin.php">account</a></li>
          <li><a href="two"> contact us</a></li>
      </ul></nav>
  </header>
    <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger" width="300px" margin-top="5%">
                                <strong>Erreur</strong> compte non existant ou mot de passe incorrecte
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
    <form method="post" action="login.php">
        <fieldset>
            <legend>remplir</legend>
            <p>Veuillez indiquer votre email et mot de passe :</p>
            <p> <input type="email" name="email" placeholder="Email" required></p>
            <p> <input type="password" name="pass" placeholder="Mot de passe" required></p>
            <p><a href="password.html">Mot de passe oublié?Cliquer ici</a></p>
            <p><input class="one" name="valider" type="submit" value="connexion"></p>
            <p><a href="signup.php">Vous n'avez pas de compte ? En créer un maintenant</a></p>
        </fieldset>
    </form>
            </div>
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
                   livraison/ Retours <br>
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
</body>
</html>