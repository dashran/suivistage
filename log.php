<?php
session_start();
include 'connexion.php';
?>
<html lang="fr">
    <head>        
        <title>Filmothèque</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&subset=latin-ext" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <meta charset="utf-8">
        <link rel="icon" href="images/favicon.ico" />
    </head>
    <body>
        <header>
            <?php
            include 'barrenav.php';
            ?>
        </header>
        <section>
            <div id="container_demo" >
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <div id="wrapper">
                    <div id="login" class="animate form">
                        <form  action="connexionetudiant.php" method="POST"> 
                            <!--						//champs pour se connecter avec son compte, appelle laconnexion.php-->
                            <h1>Se connecter</h1> 
                            <p>
                                Nom : <input type="text" name="nom" value="" /><br />
                            </p>
                            <p>
                                Mdp : <input type="password" name="mdp" value="" /><br />
                            </p>
                            <p>
                                <input class="button" type="submit" value="Connexion" /> 
                            </p>

                        </form>
                    </div>
                    <div id="register" class="animate form">
                        <form  action="newetudiant.php" method="POST"> 
                            <!--						//champs pour se créer un compte et l'ajouter a la bdd-->
                            <h1>Creer un compte</h1> 
                            <p> 
                                Nom : <input type="text" name="nom" value="" /><br />
                            </p>
                            <p> 
                                Prenom : <input type="text" name="prenom" value="" /><br />
                            </p>
                            <p>
                                Classe : <input type="text" name="classe" value="" /><br />
                            </p>
                            <p>
                                Photo : <input type="text" name="photo" value="" /><br />
                            </p>
                            <p>
                                Mdp : <input type="password" name="mdp" value="" /><br />

                            </p>
                            <p> 
                                <input class="button" type="submit" value="Creez"/> 
                            </p>
                            <br><br>
                        </form>
                    </div>
                </div>
            </div> 
        </section>
    </body>
</html>
