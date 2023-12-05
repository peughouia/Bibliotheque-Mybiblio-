<?php
    require_once '../Config/Config.php';
    if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['telephone']) 
    && isset($_POST['password']) && isset($_POST['password_retype']))
    {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $password = $_POST['password'];
        $password_retype = $_POST['password_retype'];

            $check = $bdd->prepare("SELECT nom, email,password,numeroTel FROM client WHERE email = ?");
            $check->execute(array($email));
            $data = $check->fetch();
            $row = $check->rowCount();
                if($row==0)
                    {
                        if(strlen($nom) <= 100)
                        {                           
                             if(strlen($telephone) <= 30)
                             {    
                                if(strlen($email) <= 100)
                                 {
                                     if(filter_var($email, FILTER_VALIDATE_EMAIL))
                                     {
                                         if($password == $password_retype)
                                         {
                                            //$password = hash('sh256', $password);
                                            $insert = $bdd->prepare("INSERT INTO client(nom, email, password, numeroTel) VALUES (?, ?, ?, ?)");
                                            $insert->execute(array(
                                            $nom,
                                            $email, 
                                            $password,
                                            $telephone                                       
                                          ));
                                          header('Location: inscription.php?reg_err=success');
                                          header('Location:../connexion/connexion.php');
                                         }else header('Location: inscription.php?reg_err=password');
                                     }else header('Location: inscription.php?reg_err=email');
                                 }else header('Location: inscription.php?reg_err=email_length');
                             }else header('Location: inscription.php?reg_err=prenom_length');
                        }else header('Location: inscription.php?reg_err=nom_length');
                    }else header('Location: inscription.php?reg_err=already');
                                echo "Enregistrer avec success";
                            }
                        