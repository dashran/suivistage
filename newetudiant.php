<?php
session_start();
    $nom = htmlentities($_REQUEST["nom"]);
    $prenom = htmlentities($_REQUEST["prenom"]);
    $classe = htmlentities($_REQUEST["classe"]);
    echo $_SESSION["nomImage"];
    $photo = htmlentities($_SESSION["nomImage"]);
    $email = htmlentities($_REQUEST["email"]);
    $mdp = htmlentities($_REQUEST["mdp"]);
    
?>
<!DOCTYPE html>
<html>
    <!--//permet d'enregistrer les infos rentrer lors de l'inscription d'un nouveau client-->
    <head>
        <title>Enregistrer</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
        include 'connexion.php';
        ?>
        <div>
            <p class="text">               <br><br>
                Bonjour <?php
                echo html_entity_decode($nom);
                echo " ";
                ?>
                </br>
                </br>
                Votre inscription à bien été effectuee.
            <p>
                <input class="button" type="submit" onclick="window.location.href = 'index.php'" value="Retour à l'accueil"/>
            </p>                
            <?php
            $req = $connection->prepare('INSERT INTO etudiant(nom, prenom, classe, email, photo, mdp) VALUES(:nom, :prenom, :classe, :mail, :photo, :mdp)');
            $req->execute(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'classe' => $classe,
                'mail' => $email,
                'photo' => $photo,
                'mdp' => $mdp,
            ));
            ?>
    </body>
</html>
