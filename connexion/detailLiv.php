<?php
    session_start();
    if(!isset($_SESSION['user']))
        header('Location:Indexx.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_detlivre.css">
    <link rel="stylesheet" href="../styles/admin.css">
    <title>Detail livres</title>
</head>
<body>
    <nav class="navbar">   
          <div class="logo">
            My<span class="log">Biblio</span>
          </div>

                <ul class="list-item">
                    <li class="item"><a href="#accueil">Accueil</a></li>
                    <li class="item"><a href="http://localhost/bibliotheque/connexion/emprunt.php">Emprunter</a></li>
                    <li class="item"><a href="http://localhost/bibliotheque/connexion/connexion.php?">Déconnexion</a></li>
                    <li class="item">@<?php echo $_SESSION['user']; ?></li>
                </ul>
        </nav>
        <div class="container">
        <form method="POST">
        <div class="gcard">
            <?php
    include "../Config/Config.php";
        $idlivre =  $_GET['id'];
    //$requete = "SELECT titre, auteurs, annee_publication, url_image, description, cat.nom_Categorie FROM livre liv JOIN categorie cat ON (liv.categorie = cat.id_cat)";
    $requete = "SELECT id_livre,titre, auteurs, annee_publication, url_image,description,categorie,nb_exemplaire from livre WHERE id_livre =  $idlivre";
    $res = $bdd -> query($requete);
    $target_dir = "../img/";
    while($row = $res -> fetch()){
        
        $target_file = $target_dir . $row["url_image"];   
        echo"<table>
        <tr>
        <td>
        <div class=\"card\">
        <img src=$target_file alt='Livre image'>
        </div>
        </td>
        <td>
        <div class=\"card-content\">
          <h2>Titre: ". $row["titre"] . "</h2>
          <span> Auteur: </span><label>" . $row["auteurs"] . "</label><br><br>
          <span> Année de Publication: </span><label>" . $row["annee_publication"] . "</label><br><br>
          <span> Categorie du Livre: </span><label>" . $row["categorie"] . "</label><br><br>
          <span> nombre d'exemplaire disponible: </span><label>" . $row["nb_exemplaire"] . "</label><br><br>
          <span>Description: </span><label>" . $row["description"] . "<label>
      </div>
      </td>
      </tr>
      </table>
      ";   
    }
    ?>
          </div> 
        </form>
    </div>
</body>
</html>