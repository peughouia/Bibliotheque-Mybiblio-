<?php
    session_start();
    if(!isset($_SESSION['user']))
?>

<?php
include ("../Config/Config.php");
if(isset($_POST["btn"])){
    $client = $_SESSION['user_id'];
    $livre = $_POST["livre"];
    $dateD = $_POST["depart"];
    $dateR = $_POST["retour"];

    $req = "INSERT INTO emprunt(id_client,id_livre,dateEmprunt,dateRetour) VALUES(?,?,?,?)";
    $result = $bdd -> prepare($req);
    $result -> execute([$client,$livre,$dateD,$dateR]);
    header("Location:ticket.php?id=$livre");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/stylelivre.css">
    <link rel="stylesheet" href="../styles/admin.css">
    <title>Emprunter Livre</title>
</head>
<body> 
<nav class="navbar">   
          <div class="logo">
            My<span class="log">Biblio</span>
          </div>

                <ul class="list-item">
                    <li class="item"><a href="http://localhost/bibliotheque/connexion/landing.php">Accueil</a></li>
                    <li class="item">@<?php echo $_SESSION['user']; ?></li>
                </ul>
        </nav>
    <div class="container">
        <form method="POST">
            <h2>Emprunter Un livre</h2>
            <p>select Livre :</p> <select name="livre">
                <?php
                    include ("../Config/Config.php");
                    $titreLiv = "SELECT `id_livre`,`titre` FROM `livre`";
                    $req = $bdd -> query($titreLiv);
                    while($row = $req->fetch()){
                ?>
                    <option value="<?php echo $row["id_livre"]?>"><?php echo $row["titre"]?></option>
                <?php
                    }
                ?>
            </select>
            <br>
            <p>Date emprunt:</p> <input type="date" name="depart">
            <br>
            <p>Date retour :</p> <input type="date" name="retour">
            <br><br>
            <button class="btnModif" name="btn">Emprunter</button>
        </form>
    </div>
</body>
</html>