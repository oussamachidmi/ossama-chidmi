<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="cssauth.css">
    <link rel="stylesheet" href="../css1.css">
    <title>
        brechos
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
    <!-- ############## -->

    <main>
        <?php
    if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email non valide
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email trop long
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> pseudo trop long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?>
    <form method="post" action="inscription.php">
        <fieldset>
        <legend>Veuillez remplir les champs suivants :</legend>
        <p><input type="text" name="nom" placeholder="nom" required></p>
        <input type="email" name="email" placeholder="Email" required></p>
        <p><input type="password" name="pass" placeholder="Mot de passe" required></p>
        <p><input class="one" type="submit" value="Créer mon compte"></p>
        <p><a href="signin.php">Vous avez dèja un compte? Cliquer ici</a></p>
    </fieldset>

    </form>

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
                   livraison/ Retours <br>
                    Mentions légales / Conditions de vente
                </p>
            </div>
            <div>
                <h4>NEWSLETTER</h4>
                <hr>
                <p>Envie de recevoir de nos nouvelles ?! </p>
                <input type="email" name="recoisemail" placeholder="entre votre email email">
                <input type="submit">
            </div>
        </div>

        <div id="footer2">
         <p>© BRECHOS - FRIPERIE EN LIGNE</p>
        </div>

    </footer>
    
</body>
</html>