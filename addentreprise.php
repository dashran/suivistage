<?php
session_start();
include('connexion.php');

if (isset($_POST['submit'])) {

    $siret = $_POST['SIRET'];
    $nom = $_POST['nom'];
    $naf = $_POST['code_NAF'];
    $tel = $_POST['tel'];
    $mail = $_POST['mail'];
    $cp = $_POST['cpville'];
    if (!empty($_POST['SIRET'])AND ! empty($_POST['nom'])AND ! empty($_POST['code_NAF']) AND ! empty($_POST['tel'])AND ! empty($_POST['mail'])AND ! empty($_POST['cpville'])) {
        $insertmbr = $connection->prepare("INSERT INTO entreprise(SIRET, nom, code_NAF, tel, mail, cpville) VALUES(?,?,?,?,?,?)");
        $insertmbr->execute(array($siret, $nom, $naf, $tel, $mail, $cp));
        $sql = "INSERT INTO entreprise(SIRET, nom, code_NAF, tel, mail, cpville) VALUES($siret, $nom, $naf, $tel, $mail, $cp)";
        echo $sql;
        $erreur = "L'entreprise a bien été ajouté";
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ajouter entreprise</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta charset="utf-8">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.7.3/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.7.3/themes/base/jquery-ui.css">
        <script src="main.js" type="text/javascript"></script>
    </head>
    <body style="margin: 200px;">
        <h2>Nouvelle entreprise</h2>
        <a href="https://www.manageo.fr/" target="_blank">Trouver le SIRET et le code NAF de l'entreprise</a>
        <br>
        <a href="https://blog.easyfichiers.com/wp-content/uploads/2014/08/Liste-code-naf-ape.pdf" target="_blank">Trouver la division NAF de l'entreprise</a>
        <br>
        <a href="https://public.opendatasoft.com/explore/dataset/correspondance-code-insee-code-postal/table/" target="_blank">Trouver le code postal unique</a>
        <br><br>
        <?php
        if (isset($erreur)) {
            echo $erreur;
        }
        ?>
        <!--	//permet de rentrer de nouvelles infos clients et de les enregistrer dans la bdd-->
        <form method="POST" action="">
            <div class="form-group">
                <label for="">SIRET</label>
                <input type="text" class="form-control" id="example" name="SIRET" placeholder="SIRET">
            </div>
            <div class="form-group">
                <label for="">Nom</label>
                <input type="text" class="form-control" id="example" name="nom" placeholder="Nom">
            </div>
            <div class="form-group">
                <label for="">Division NAF</label>
                <br>
                <?php
                $sql = "SELECT * FROM naf";
                $q = $connection->query($sql);
                echo "<select name = 'code_NAF' >";
                while ($ligne = $q->fetch()) {
                    if ($row['code_NAF'] == $ligne[0])
                        echo "<option value=" . $ligne[0] . " selected='selected'>" . $ligne[1] . "</option>";
                    else
                        echo "<option value=" . $ligne[0] . ">" . $ligne[1] . "</option>";
                }
                echo "</select>";
                ?> 
            </div>
            <div class="form-group">
                <label for="">Telephone</label>
                <input type="text" class="form-control" id="example" name="tel" placeholder="Telephone">
            </div>
            <div class="form-group">
                <label for="">Mail</label>
                <input type="text" class="form-control" id="example" name="mail" placeholder="Mail">
            </div>
            <div class="form-group">
                <label for="">Ville</label>
                <br>
                <input name="cpville" id="cpville" type="hidden" placeholder="Code Postal">
                <input name="ville" id="ville" type="text" placeholder="Ville">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Ajouter a la base de donnees</button>
            <a class="btn btn-success" href="addDemande.php?">Retour</a>
        </form>
    </body>
</html>
