<?php
            include ("../Config/config.php");

            $err_message = "";

            if( isset($_POST["register_btn"]) &&
                isset($_FILES["upload_file"])
            ){

                $titre = $_POST["titre"];
                $auteur = $_POST["auteur"];
                $categorie = $_POST["categorie"];
                $nb_exemp = $_POST["nb_exemp"];
                $annee = $_POST["annee"];
                $description = $_POST["description"];


                $target_dir = "../img/";
                $filename = basename($_FILES["upload_file"]["name"]);
                $target_file = $target_dir . $filename;
                $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                $allowed_extention = array("jpg", "png", "jfif", "gif");
                //$request = "INSERT INTO realisations(title, price, image_url, id_artist, registed_date) VALUES(?, ?, ?, 1, CURRENT_DATE)";
                if(!in_array($imageFileType, $allowed_extention)) {
                    $_POST["err_message"] = "Seuls les fichiers JPG, JFIF, PNG et GIF sont acceptés";
                } else {
                    $statement =  $bdd -> prepare("INSERT INTO livre(titre, auteurs,categorie,nb_exemplaire, annee_publication, url_image,description) 
                                                VALUES(?, ?, ?, ?, ?, ?, ?)");

                    $res = $statement -> execute([$titre, $auteur,$categorie,$nb_exemp,$annee,$filename,$description]);

                    if($res && !file_exists($target_file)){
                        move_uploaded_file(
                            $_FILES["upload_file"]["tmp_name"], 
                            $target_file
                        );
                    } 
                }
            }
    header("location:admin.php");
?>