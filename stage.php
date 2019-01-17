<?php
session_start();
include 'connexion.php';
?>
<html lang="fr">
    <head>        
        <title>Filmothèque</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&subset=latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        <br />
        <div class="container">
            <br />
            <div class="row">
                <br />
                <h2>Periode de stage</h2>
                <p>
            </div>
            <p>
                <br/>
            <div class="row">
                <tbody>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th data-column-id="id" data-type="numeric" data-identifier="true">ID</th>
                            <th data-column-id="annee">Annee</th>
                            <th data-column-id="datedebut">Date Debut (AAAA-MM-JJ)</th>
                            <th data-column-id="datefin">Date Fin (AAAA-MM-JJ)</th>
                    </thead>
                    <tbody>
                        <?php
                        $test = '0';
                        include 'connexion.php';

                        $reponse = $connection->query('SELECT * FROM periode');

                        while ($donnees = $reponse->fetch()) {
                            $don = '<tr>
                               <td>' . $donnees['idperiode'] . '</td>
                               <td>' . $donnees['annee'] . '</td>
                               <td>' . $donnees['date_debut'] . '</td>
                               <td>' . $donnees['date_fin'] . '</td>';
                            echo $don;
                            echo '<td>';
                            echo '<a class="btn btn-success" href="modifstage.php?id=' . $donnees['idperiode'] . '">Modifier</a>'; // un autre td pour le bouton d'update
                            echo '</td>
                                <p>';
                            echo'<td>';
                            echo '<a class="btn btn-danger" href="deletestage.php?id=' . $donnees['idperiode'] . ' ">Supprimer</a>'; // un autre td pour le bouton de suppression
                            echo '</td>
                                <p>';
                            echo '</tr>
                                <p></tr>'
                            ;
                        }
                        $reponse->closeCursor();
                        $_SESSION['deco'] = '1';
                        echo '<a class="btn btn-success" href="addStage.php?">Ajouter une periode de stage</a>';
                        ?>   
                    </tbody>	
                </table>
            </div>
            <p>
        </div>
        <div class="container">
            <br />
            <div class="row">
                <br />
                <h2>Demandes effectuées</h2>
                <p>
            </div>
            <p>
                <br/>
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th data-column-id="id" data-type="numeric" data-identifier="true">ID Demande</th>
                            <th data-column-id="datedemande">Date de la demande</th>
                            <th data-column-id="raisonrefus">Etat</th>
                            <th data-column-id="datedemande">Refus</th>
                            <th data-column-id="raisonrefus">ID Etudiant</th>
                    </thead>
                    <tbody>
                        <?php
                        $test = '0';
                        include 'connexion.php';

                        $reponse = $connection->query('SELECT * FROM demande, etudiant, etat WHERE etudiant.idetudiant = demande.idetudiant AND demande.idetat =etat.idetat ');

                        while ($donnees = $reponse->fetch()) {
                            $don = '<tr>
                               <td>' . $donnees['iddemande'] . '</td>
                               <td>' . $donnees['date_demande'] . '</td>
                               <td>' . $donnees['libelle_etat'] . '</td>
                               <td>' . $donnees['refus'] . '</td>  
                               <td>' . $donnees['idetudiant'] . '</td>';
                            
                            echo $don;
                            echo '<td>';
                            echo '<a class="btn btn-success" href="modifstage.php?id=' . $donnees['iddemande'] . '">Modifier</a>'; // un autre td pour le bouton d'update
                            echo '</td>
                                <p>';
                            echo'<td>';
                            echo '<a class="btn btn-danger" href="deletestage.php?id=' . $donnees['iddemande'] . ' ">Supprimer</a>'; // un autre td pour le bouton de suppression
                            echo '</td>
                                <p>';
                            echo '</tr>
                                <p></tr>'
                            ;
                        }
                        $reponse->closeCursor();
                        $_SESSION['deco'] = '1';
                        echo '<a class="btn btn-success" href="addStage.php?">Ajouter une demande de stage</a>';
                        ?>   
                    </tbody>	
                </table>
                <?php
                echo '<a class="btn btn-danger" href="index.php?">Retour au site</a>';
                echo "";
                ?>
            </div>
            <p>
        </div>
        <p>
    </body>
</html>