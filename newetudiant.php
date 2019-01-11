<?php
if ($_POST) {
    $nom = htmlentities($_POST["nom"]);
    $prenom = htmlentities($_POST["prenom"]);
    $classe = htmlentities($_POST["classe"]);
    $photo = htmlentities($_POST["photo"]);
    $mdp = htmlentities($_POST["mdp"]);
} else {
    $nom = htmlentities($_POST["nom"]);
    $prenom = htmlentities($_POST["prenom"]);
    $classe = htmlentities($_POST["classe"]);
    $photo = htmlentities($_POST["photo"]);
    $mdp = htmlentities($_POST["mdp"]);
}
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
                Votre inscription a bien ete effectuee.
            <p>
                <input class="button" type="submit" onclick="window.location.href = 'index.php'" value="Retour à l'accueil"/>
            </p>                
            <?php
            $req = $connection->prepare('INSERT INTO etudiant(nom, prenom, classe, photo, mdp) VALUES(:nom, :prenom, :classe, :photo, :mdp)');
            $req->execute(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'classe' => $classe,
                'photo' => $photo,
                'mdp' => $mdp,
            ));
            ?>
    </body>
</html>
