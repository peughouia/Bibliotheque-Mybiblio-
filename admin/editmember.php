<?php
include('../Config/Config.php');
//recuperation de l'id
    $id_client = $_GET["id"];
//preparation de la requete de selection
    $req =  "SELECT nom, email, numeroTel FROM client WHERE id_client = $id_client";
//execution de la requette
    $res = $bdd -> query($req);
//stocker le resultat dans la varible data
    $data = $res -> fetch();
if(isset($_POST["btn"])
){
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];

    $statement = $bdd -> prepare("UPDATE client SET nom='$nom', email='$email', numeroTel='$telephone' WHERE id_client = $id_client");
    $resultat = $statement -> execute();
    header('location:list_membre.php');  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/stylelivre.css">
    <link rel="stylesheet" href="../styles/admin.css">
    <title>update</title>
</head>
<body> 
    <div class="container">
        <form method="POST">
            <h2>Mettre a jour</h2>
            <p>Nom :</p> <input type="Text" name="nom" value="<?php echo  $data["nom"]; ?>">
            <br>
            <p>Email:</p> <input type="Text" name="email" value="<?php echo  $data["email"]; ?>">
            <br>
            <p>Telephone :</p> <input type="Text" name="telephone" value="<?php echo  $data["numeroTel"]; ?>">
            <br><br>
            <button class="btnModif" name="btn">Modifier</button>
        </form>
    </div>
</body>
</html>