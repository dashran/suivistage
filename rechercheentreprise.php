<?php
session_start();
include 'connexion.php';
// si une methode de recherche est selectionnée alors

    if (isset($_REQUEST['selectR'])) {
    //init variable
    $rech = $_REQUEST['selectR'];
    $car = $_REQUEST['termeR'];

    // la requete est selectionnée en fonction de la methode de recherche
    if ($rech == "nom") {

        $sql = "SELECT * FROM entreprise,ville WHERE ville.cpville=entreprise.cpville and nom LIKE '%" . $car . "%'";
    } elseif ($rech == "naf") {

        $sql = "SELECT * FROM entreprise,ville WHERE ville.cpville=entreprise.cpville and libelle_NAF LIKE '%" . $car . "%'";
    } elseif ($rech == "secteur") {

        $sql = "SELECT * FROM entreprise,ville WHERE ville.cpville=entreprise.cpville and nom_ville LIKE '%" . $car . "%'";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Recherche d'entreprise</title>
    </head>
    <body>
        <?php
            include 'barrenav.php';
        ?>
        <p> Saississez votre recherche </p>
        <form action="" method="GET">
            <label for='exampleFormControlSelect1'>Rechercher par : </label>
            <select class="form-control" id="exampleFormControlSelect1" name="selectR">
                <option value="nom">Nom</option>
                <option value="naf">Libellé NAF</option>
                <option value="secteur">Secteur géographique</option>
            </select>
            <input type = "text" class="form-control" id="exampleFormControlInput1" placeholder="Saississez votre recherche..." name = "termeR">
            <input type="submit" name="s" value="Rechercher"/>
        </form>
        <br><br><br>
        <table class="table">
            <tbody>
                <th data-column-id="SIRET"> SIRET</th>
                <th data-column-id="nom">Nom</th> 
                <th data-column-id="libelle_NAF">Libellé NAF</th>
                <th data-column-id="telephone">Téléphone</th>
                <th data-column-id="mail">E-mail</th>
                <th data-column-id="ville">Ville</th>
            <?php
            if(isset($_SESSION['nomC'])){
                if (isset($_GET["s"]) AND $_GET["s"] == "Rechercher")
                {
                    $_GET["termeR"] = htmlspecialchars($_GET["termeR"]); //pour sécuriser le formulaire contre les failles html
                    $terme = $_GET["termeR"];
                    $terme = trim($terme); //pour supprimer les espaces dans la requête de l'internaute
                    $terme = strip_tags($terme); //pour supprimer les balises html dans la requête
                }
                if (isset($sql)){
                    $reponse = $connection->query($sql);
                    $nombre=$reponse->rowCount();
                    if ($car == ''){
                        if($rech=="nom"){
                            echo "Il n'existe aucune entreprise de ce nom dans la base de données";                                       
                        }elseif($rech == "naf"){
                            echo "Il n'existe aucune entreprise ayant pour libellé NAF ".$car." dans la base de données";
                        }elseif($rech == "secteur"){
                            echo "Il n'existe aucune entreprise dans ce secteur  dans la base de donnée";
                        }
                    }else{
                        while ($donnees = $reponse->fetch()) {
                            $don = '<tr>
                                <td>' . $donnees['SIRET'] . '</td>
                                <td>' . $donnees['nom'] . '</td>
                                <td>' . $donnees['libelle_NAF'] . '</td>
                                <td>' . $donnees['tel'] . '</td>
                                <td>' . $donnees['Mail'] . '</td>
                                <td>' . $donnees['nom_ville'].' '. $donnees['cpville'] . '</td></tr><br/>';
                            echo $don;
                        }
                    }
                    $reponse->closeCursor();
                }
            }else{
                header("Location: log.php?err=1");
            }
            ?>
            </tbody>
        </table>
    </body>
</html>

