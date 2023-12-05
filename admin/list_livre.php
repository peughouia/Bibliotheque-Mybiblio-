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
                              <th>Titres</th>
                              <th>Auteurs</th>
                              <th>categories</th>
                              <th>Description</th>
                              <th>Année Pub</th>
                              <th>Nombre livre</th>
                              <th>couverture</th>
                              <th>Action</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php
                                  include "../Config/Config.php";
                                  $req_listclient="SELECT `id_livre`,`titre`,
                                   `auteurs`,`categorie`,
                                   `description`,`annee_publication`,
                                   `nb_exemplaire`,`url_image` FROM `livre`";
                                  //execution de la requete
                                  $res=$bdd->query($req_listclient);
                                  while($row=$res->fetch()){
                                    ?>    
                           <tr>
                              <td><?php echo $row["titre"]?></td>
                              <td><?php echo $row["auteurs"]?></td>
                              <td><?php echo $row["categorie"]?></td>
                              <td><?php echo $row["description"]?></td>
                              <td><?php echo $row["annee_publication"]?></td>
                              <td><?php echo $row["nb_exemplaire"]?></td>  
                              <td><?php echo "<img src=\"../img/".$row["url_image"]."\" width=\"55\">"?></td>
                              <td><button class="btnModif">
                              <?php echo "<a href=\"./editmember.php?id=" . $row["id_livre"] . ";\">Modifier</a>"?>
                              </button></td>
                              <td><button class="btndel">
                              <?php echo "<a href=\"./deleteclient.php?id=" . $row["id_livre"] . ";\">Supprimer</a>"?>
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