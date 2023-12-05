<?php
    session_start();
    if(!isset($_SESSION['user']))
        header('Location:Indexx.php');
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/INDEX.css">
    <link rel="stylesheet" href="../styles/styleindex.css">
    <title>MyBiblio</title>
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
        <div  id="accueil"></div>
        <section class="container-home">
            <div class="text-content">
                <div class="text-item">
                    <p><span class="title">
                         <span class="title-home">
                            Empruntez vos livres 
                         </span><br> 
                         la lecture sur <br> 
                        <span class="mot">My </span> <span class="pass">Biblio</span> 
                      </span>
                    </p>
                </div>                                  
            </div>
            <div class="img-content">
                    <img src="../img/phote1.jpg" alt="">  
           </div>            
    </section>

    <div class="titre"><p>Nos Livres</p></div>
          <div class="gcard">
            <?php
    include "../Config/Config.php";

    //$requete = "SELECT titre, auteurs, annee_publication, url_image, description, cat.nom_Categorie FROM livre liv JOIN categorie cat ON (liv.categorie = cat.id_cat)";
    $requete = "SELECT id_livre,titre, auteurs, annee_publication, url_image,description from livre";
    $res = $bdd -> query($requete);

    $target_dir = "../img/";

    while($row = $res -> fetch()){

        $target_file = $target_dir . $row["url_image"];   
        echo" <div class=\"card\">
        <button class=\"btnconsulter\"><a href=\"./detailLiv.php?id=" . $row["id_livre"] . ";\">Consulter</a></button>
        <img src=$target_file alt='Livre image'>
        <div class=\"card-content\">
          <h2>Titre: ". $row["titre"] . "</h2>
          <span> Auteur: </span>" . $row["auteurs"] . "<br>
          <span> Année Pub: </span>" . $row["annee_publication"] . "<br>
          <span>Description: </span>" . $row["description"] . "
        </div>
      </div>";   
    }
    ?>
          </div> 

    <section class=" conpte">
       <div class="pop">
        <div class=" font pop1">
            <span>+200 livre</span>
            <p>MyBiblio possede de nombreux livre</p>
        </div>
        <div class=" font pop2">
          <img src="../img/icone1.ico" alt="">
          <img src="../img/icone1.ico" alt="">
          <img src="../img/icone3.ico" alt="">
          <p>bien noté sur la richesse de nos</p>
          <h3>livres basee sur 200 avis</h3>
        </div>
        <div class=" font pop3">
            <span>500 +</span>
            <p>Emprunte sur MyBiblio</p>
        </div>
      </div>
    </section>
    <section class="finfin">
    <footer>
    <div  id="apropos"></div>
      <h1>CONTACTS</h1>
      <br>
      <br>
       <div class="services">
           <div class="service">
               <h1>Facebook</h1>
               <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores in possimus perferendis quod, magnam veniam. Modi libero, beatae officia quisquam excepturi ducimus velit ratione vero et qui, nostrum, voluptatibus rerum?</p>
           </div>
           <div class="service">
              <h1>Instagram</h1>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores in possimus perferendis quod, magnam veniam. Modi libero, beatae officia quisquam excepturi ducimus velit ratione vero et qui, nostrum, voluptatibus rerum?</p>
           </div>
           <div class="service">
               <h1>Twitter</h1>
               <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores in possimus perferendis quod, magnam veniam. Modi libero, beatae officia quisquam excepturi ducimus velit ratione vero et qui, nostrum, voluptatibus rerum?</p>
           </div>
       </div>
       <p id="CONTACTS">contact:692 30 23 82|| ©2022,MyBiblio</p>
    </footer>
  </section>

</body></html>
