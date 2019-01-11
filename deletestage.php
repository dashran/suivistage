<?php
session_start();
include('connexion.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Supprimer film</title>
    </head>
    <body>
        <?php
        $id = $_GET['id'];
        $requete = "DELETE FROM stage WHERE idstage = '" . $id . "'";
        $req = $connection->exec($requete);
        header('location: stage.php');
        ?>
        <!--//permet de supprimer un client de la base de donnees-->
    </body>
</html>
