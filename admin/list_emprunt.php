<?php
    session_start();
    if(!isset($_SESSION['user']))
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_livre.css">
    <link rel="stylesheet" href="../styles/admin.css">
    <title>livres MyBiblio</title>
</head>
<body>
    <nav class="navbar">   
          <div class="logo">
          <a href="http://localhost/bibliotheque/admin/admin.php">My<span class="log">Biblio</span></a>
          </div>
                <ul class="list-item">
                    <li class="item"><a href="http://localhost/bibliotheque/admin/list_membre.php">Membres</a></li>
                    <li class="item"><a href="http://localhost/bibliotheque/admin/list_livre.php">Livres</a></li>
                    <li class="item"><a href="http://localhost/bibliotheque/admin/list_emprunt.php">Emprunt</a></li>
                    <li class="item"><a href="http://localhost/bibliotheque/admin/addlivres.php">Ajouter livres</a></li>
                    <li class="item">@<?php echo $_SESSION['user']; ?></li>
                </ul>
        </nav> 
    <div class="container">
    <table>
                        <thead>
                           <tr>
                              <th>Num Livre</th>
                              <th>Titre Livre</th>
                              <th>Categorie</th>
                              <th>Couverture</th>
                              <th>Nom Membre</th>
                              <th>telephone membre</th>
                              <th>Date Emprunt</th>
                              <th>Date Retour</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php
                                  include "../Config/Config.php";
                                  /*$req_listclient="SELECT `id_livre`,`titre`,
                                   `auteurs`,`categorie`,
                                   `description`,`annee_publication`,
                                   `nb_exemplaire`,`url_image` FROM `livre`";*/
                                   $req_listclient ="SELECT emprunt.*,client.*,livre.*
                                   FROM emprunt
                                   JOIN client ON emprunt.id_client = client.id_client
                                   JOIN livre ON emprunt.id_livre = livre.id_livre";
                                  //execution de la requete
                                  $res=$bdd->query($req_listclient);
                                  while($row=$res->fetch()){
                                    ?>    
                           <tr>
                              <td><?php echo " N00". $row["id_livre"] ." "?></td>
                              <td><?php echo $row["titre"]?></td>
                              <td><?php echo $row["categorie"]?></td>
                              <td><?php echo "<img src=\"../img/".$row["url_image"]."\" width=\"55\">"?></td>
                              <td><?php echo $row["nom"]?></td>
                              <td><?php echo $row["numeroTel"]?></td>
                              <td><?php echo $row["dateEmprunt"]?></td>
                              <td><?php echo $row["dateRetour"]?></td>
                              <td><button class="btndel">
                              <?php echo "<a href=\"./delEmprunt.php?id=" . $row["id_client"] . ";\">Supprimer</a>"?>
                              </button></td>
                           </tr>
                      <?php
                                  }
                      ?>
                           </tbody> 
                      </table>
    </div>
</body>
</html>