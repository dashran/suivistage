<?php
session_start();
include 'connexion.php';

if( isset($_GET['recherche_entreprise'])&& !empty($_GET['recherche_entreprise']))
// requete recherche par nom
    $reponse = $connexion->query('SELECT * FROM entreprise WHERE Nom = '.$_GET['nomentreprise'].' ORDER BY Nom ASC ')
?>