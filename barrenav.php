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
                echo '<a href="logout.php">Deconnexion</a>';
            } else {
                echo ' <a href="log.php">Connexion</a>';
            }
            ?>
        </li>
        <li class="nomCompte"> 
            <?php
            if (isset($_SESSION['nomC'])) {
                echo $_SESSION['nomC'];
            }
            ?> 
        </li>
        <li>
            <?php
            if (isset($_SESSION['nomC'])) {
                if (($_SESSION['nomC'] == "ADMIN")) {
                    echo '<a href="filmcrud.php">CRUD</a>';
                }
            }
            ?>
        </li>
    </ul>
</nav>
