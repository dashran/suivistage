<?php 
try
                      {
                        $connexion = new PDO('mysql:host=localhost:3308;dbname=projetstage;charset=utf8', 'root', '');
                      }
                      catch(Exception $e)
                      {
                      die('Erreur : '.$e->getMessage());
                      }?>