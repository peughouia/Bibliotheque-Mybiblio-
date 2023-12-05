<?php
  //connexion a la base de données
  include ("../Config/Config.php");
  //récupération de l'id dans le lien
  $id_client = $_GET['id'];
  //requête de suppression
  $statement = $bdd -> prepare("DELETE FROM client WHERE id_client = $id_client");
  $resultat = $statement -> execute();
  header('location:list_membre.php');  
         
?>