<?php
    session_start();
    if(!isset($_SESSION['user']))
    include('../Config/Config.php');
   
//preparation de la requete de selection
    
//execution de la requette
//stocker le resultat dans la varible data
   
?>

<?php
    include('../Config/Config.php');
    $id_client = $_SESSION["user_id"];
    $reqe =  "SELECT nom, email, numeroTel FROM client WHERE id_client = $id_client";
    $rese = $bdd -> query($reqe);
    $datacli = $rese -> fetch();
//recuperation de l'id
    $id_livre = $_GET["id"];
    $req =  "SELECT id_livre,titre,auteurs,categorie FROM livre WHERE id_livre = $id_livre";
    $res = $bdd -> query($req);
    $data = $res -> fetch();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/stylelivre.css">
    <link rel="stylesheet" href="../styles/styleticket.css">
    <title>membre MyBiblio</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            My<span class="log">Biblio</span>
        </div>
        <p>Detail sur l'emprunt</p>
        <label class="em">livre</label><br>
        <span>Num Livre: </span><label>N00<?php echo  $data["id_livre"]; ?></label><br><br>
        <span>Livre: </span><label><?php echo  $data["titre"]; ?></label><br><br>
        <span>Auteur: </span><label><?php echo  $data["auteurs"]; ?></label><br><br>
        <span>Categorie: </span><label><?php echo  $data["categorie"]; ?></label><br><br>
        <label class="em">Emprunteur</label><br>
        <span>Nom: </span><label><?php echo  $datacli["nom"]; ?></label><br><br>
        <span>Telephone: </span><label><?php echo  $datacli["numeroTel"]; ?></label><br><br>
        <span>Email: </span><label><?php echo  $datacli["email"]; ?></label><br><br>
        <a href="http://localhost/bibliotheque/connexion/landing.php">OK</a>
    </div>
</body>
</html>