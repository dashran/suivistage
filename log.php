<?php
session_start();
include 'connexion.php';
?>
<html lang="fr">
    <head>        
        <title>Recherche de stage</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&subset=latin-ext" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <meta charset="utf-8">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.7.3/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.7.3/themes/base/jquery-ui.css">
        <script src="main.js" type="text/javascript"></script>
    </head>
    <body>
        <!-- Modal // ajout  BootStrap + JS -->   
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Vous devez être connecté pour accéder à la recherche</p>
                        <img src="tenor.gif" alt="Tenor qui branche un fil"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin modal -->
        <header>
            <?php
            include 'barrenav.php';
            ?>
        </header>
        <br><br><br>
        <section>
            <div id="container_demo" >
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <div id="wrapper">
                    <div id="login" class="animate form">
                        <form  action="connexionetudiant.php" method="POST"> 
                            <!--						//champs pour se connecter avec son compte, appelle laconnexion.php-->
                            <h1>Se connecter</h1>
                            <br>
                            <p>
                                Nom : <input type="text" name="nom" value="" /><br />
                            </p>
                            <p>
                                Mdp : <input type="password" name="mdp" value="" /><br />
                            </p>
                            <p>
                                <input class="button" type="submit" value="Connexion" /> 
                            </p>

                        </form>
                    </div>
                    <div id="register" class="animate form">
                        <form  action="newetudiant.php" method="POST"> 
                            <!--						//champs pour se créer un compte et l'ajouter a la bdd-->
                            <h1>Creer un compte</h1> 
                            <br>
                            <p> 
                                Nom : <input type="text" name="nom" value="" /><br />
                            </p>
                            <p> 
                                Prenom : <input type="text" name="prenom" value="" /><br />
                            </p>
                            <p>
                                Classe : <input type="text" name="classe" value="" /><br />
                            </p>

                            <p>
                                Mdp : <input type="password" name="mdp" value="" /><br />

                            </p>
                            <p>
                                Photo : <input type="text" id="input_text_file" class="inputText" readonly="readonly" />
                                <input type="file" onmousedown="return false" onkeydown="return false" class="inputFile" onchange="afficherimage(this);" />
                                <img class="fit-picture" id="profile" src="" alt="" />
                                <img src="/photos/loic.jpg" alt=""/><br />
                            </p>
                            <p> 
                                <input class="button" type="submit" value="Creez"/> 
                            </p>
                            <br><br>
                        </form>
                    </div>
                </div>
            </div> 
        </section>
        <!-- Modal -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script type="text/javascript">
                                    var op = <?PHP echo (!empty($_GET['err']) ? json_encode($_GET['err']) : '""'); ?>;
                                    if (op == 1) {
                                        $('#exampleModalCenter').modal('show');
                                    }

        </script>
        <!-- Modal -->
    </body>
</html>