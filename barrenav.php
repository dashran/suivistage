
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<div id="top_img">
</div>
<!--//barre de navigation du site-->
<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li><!--
        --><li><a href="stage.php">Stages</a></li><!--
        --><li><a href="rechercheentreprise.php">Recherche</a></li><!--
        --><li>
            <?php
            if (isset($_SESSION['nomC'])) {
                if (($_SESSION['nomC'] != "ADMIN")) {
                    echo '<a href="recapitulatif.php">Récapitulatif</a>';
                } else {
                    echo ' <a href="tableaurec.php">Tableaux</a>';
                }
            }
            ?>
        </li><!--
        --><li>
            <?php
            if (isset($_SESSION['nomC'])) {
                echo '<a href="logout.php">Deconnexion</a>';
            } else {
                echo ' <a href="log.php">Connexion</a>';
            }
            ?>
        </li>
        <li class="nomCompte"> 
            <?php
            include('connexion.php');
            if (isset($_SESSION['nomC'])) {
                echo $_SESSION['nomC'];
                $sqlphoto = "SELECT photo FROM etudiant WHERE idetudiant = " . $_SESSION['code'];
                $q = $connection->query($sqlphoto);
                $ligne = $q->fetch();
            }
            ?>   
        </li>
        <li class="imageCompte">
            <?php
            include('connexion.php');
            if (isset($_SESSION['nomC'])) {
                echo '<div id="imageopt">';
                echo "<img src='images/" . $ligne['photo'] . "'>";
                echo "</div>";
            }
            ?>
    </ul>
</nav>
