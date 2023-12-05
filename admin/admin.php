<?php
    session_start();
    if(!isset($_SESSION['user']))
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/admin.css">
    <title>MyBiblio</title>
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
                    <li class="item"><a href="http://localhost/bibliotheque/connexion/connexion.php?">déconnexion</a></li>
                    <li class="item">@<?php echo $_SESSION['user']; ?></li>
                </ul>
        </nav> 
        <div  id="accueil"></div>
        <section class="container-home">
            <div class="text-content">
                <div class="text-item">
                    <p><span class="title">
                         <span class="title-home">
                            Gerer Vos Livres  
                         </span><br> 
                         la lecture sur <br> 
                        <span class="mot">My </span> <span class="pass">Biblio</span> 
                      </span>
                    </p>
                </div>                                  
            </div>
            <div class="img-content">
                    <img src="../img/password.png" alt="">  
           </div>            
    </section>
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
