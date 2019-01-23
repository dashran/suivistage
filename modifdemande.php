
<?php
session_start();
include('connexion.php');

$id = $_REQUEST['id'];
if (isset($_REQUEST['submit'])) {

    $id = $_REQUEST['iddemande'];
    $date = $_REQUEST['date_demande'];
    $idetat = $_REQUEST['idetat'];
    $refus = $_REQUEST['refus'];
    $idetu = $_REQUEST['idetudiant'];
    $idperio = $_REQUEST['idperiode'];
    $sql = "UPDATE demande SET iddemande = ?,date_demande = ?,idetat = ?,refus = ?,idetudiant = ?,idperiode = ? WHERE iddemande ='" . $id . "'";
    $q = $connection->prepare($sql);
    $q->execute(array($id, $date, $idetat, $refus, $idetu, $idperio));

    header('location: stage.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Modifier demande de stage</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta charset="utf-8">
    </head>
    <body style="margin: 200px;">
        <h2>Modification demande de stage</h2>
        <br>
        <?php
        if (isset($erreur)) {
            echo $erreur;
        }
        ?>
        <?php
        $sql = "SELECT * FROM demande WHERE iddemande ='" . $id . "'";
        $q = $connection->query($sql);
        $row = $q->fetch();
        ?>

        <!--	//champs permettant de modifier les infos d'un client et d'enregistrer les modifs dans la bdd-->
        <form method="GET" action="">
            <div class="form-group">
                <label for="">ID Demande</label>
                <input type="text" class="form-control" id="example" name="iddemande" value=<?php echo $row['iddemande']; ?>>
            </div>
            <div class="form-group">
                <label for="">Date de la demande</label>
                <input type="date" class="form-control" id="example" name="date_demande" value="<?php echo $row['date_demande']; ?>">
            </div>
            <div class="form-group">
                <label for="">Etat</label>
                <br>
                <?php
                $sql = "SELECT * FROM etat";
                $q = $connection->query($sql);
                echo "<select name = 'idetat' >";
                while ($ligne = $q->fetch()) {
                    if ($row['idetat'] == $ligne[0])
                        echo "<option value=" . $ligne[0] . " selected='selected'>" . $ligne[1] . "</option>";
                    else
                        echo "<option value=" . $ligne[0] . ">" . $ligne[1] . "</option>";
                }
                echo "</select>";
                ?> 
            </div>
            <div class="form-group">
                <label for="">Refus</label>
                <input type="text" class="form-control" id="example" name="refus" value="<?php echo $row['refus']; ?>">
            </div>
            <div class="form-group">
                <label for="">Etudiant</label>
                <br>
                <?php
                $sql = "SELECT * FROM etudiant WHERE type <> 0";
                $q = $connection->query($sql);
                echo "<select name = 'idetudiant' >";
                while ($ligne = $q->fetch()) {
                    if ($row['idetudiant'] == $ligne[0])
                        echo "<option value=" . $ligne[0] . " selected='selected'>" . $ligne[1] . "</option>";
                    else
                        echo "<option value=" . $ligne[0] . ">" . $ligne[1] . "</option>";
                }
                echo "</select>";
                ?> 
            </div>
            <div class="form-group">
                <label for="">Periode</label>
                <br>
                <?php
                $sql = "SELECT * FROM periode";
                $q = $connection->query($sql);
                echo "<select name = 'idperiode' >";
                while ($ligne = $q->fetch()) {
                    if ($row['idperiode'] == $ligne[0])
                        echo "<option value=" . $ligne[0] . " selected='selected'>" . $ligne[2] . " " . $ligne[3] . "</option>";
                    else
                        echo "<option value=" . $ligne[0] . ">" . $ligne[2] . " au " . $ligne[3] . "</option>";
                }
                echo "</select>";
                ?> 
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Modifier dans la base de donnees</button>
            <a class="btn btn-success" href="stage.php?">Retour</a>
        </form>
    </body>
</html>