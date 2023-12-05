<?php
    session_start();
    if(!isset($_SESSION['user']))
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_membre.css">
    <link rel="stylesheet" href="../styles/admin.css">
    <title>membre MyBiblio</title>
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
                              <th>Nom</th>
                              <th>Email</th>
                              <th>Telephone</th>
                              <th>Action</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php
                                  include "../Config/Config.php";
                                  $req_listclient="SELECT `id_client`,`nom`, `email`,`numeroTel` FROM `client`";
                                  //execution de la requete
                                  $res=$bdd->query($req_listclient);
                                  while($row=$res->fetch()){
                                    ?>    
                           <tr>
                              <td><?php echo $row["nom"]?></td>
                              <td><?php echo $row["email"]?></td>
                              <td><?php echo $row["numeroTel"]?></td>
                              <td><button class="btnModif">
                              <?php echo "<a href=\"./editmember.php?id=" . $row["id_client"] . ";\">Modifier</a>"?>
                              </button></td>
                              <td><button class="btndel">
                              <?php echo "<a href=\"./deleteclient.php?id=" . $row["id_client"] . ";\">Supprimer</a>"?>
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