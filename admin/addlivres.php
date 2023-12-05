<?php
    session_start();
    if(!isset($_SESSION['user']))
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/stylelivre.css">
    <link rel="stylesheet" href="../styles/admin.css">
    <title>Ajouter livre</title>
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
        <form method="POST" action="traitementlivre.php" enctype="multipart/form-data">
            <h2> Ajoutez un livre </h2>
            <p>Titre :</p> <input type="Text" name="titre">
            <br>
            <p>Auteur :</p> <input type="Text" name="auteur">
            <br>
            <p>Categorie :</p> <input type="Text" name="categorie">
            <br>
            <p>Nombre d'exemplaire :</p> <input type="Text" name="nb_exemp">
            <br>
            <p>Années publication :</p> <input type="Text" name="annee">
            <br>
            <p>Description :</p> <textarea name="description"></textarea>
            <br>
            <div class="image_area">
              <div class="image_input"><img id="output" alt="realisation image" width="50"/></div>
              <span name="err_message"></span>
              <input type="file" name="upload_file" accept="image/*" class="upload_file_create" onchange="loadFile(event)"/>
            </div>
            <input type="submit" name="register_btn" value="Register"/>
        </form>
    </div>

    <script>
      var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
      };
    </script>
</body>
</html>