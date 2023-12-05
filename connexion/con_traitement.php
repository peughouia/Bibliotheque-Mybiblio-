<?php 
    session_start();
    require_once '../Config/Config.php';

    if(isset($_POST['email']) && isset($_POST['password']))
    {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
        $check = $bdd->prepare("SELECT id_client,nom, email,password,numeroTel FROM client WHERE email = ?");
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 1)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                //$password = hash('sha256',$password);
                if($data['password'] === $password)
                {
                    if($password === "Admin"){
                        $_SESSION['user'] = $data['nom'];
                        header('Location:../admin/admin.php');
                    }else{
                        $_SESSION['user'] = $data['nom'];
                        $_SESSION['user_id'] = $data['id_client'];
                        header('Location:landing.php');
                    }
                }
                else header('Location:connexion.php?login_err=password');
            }else header('Location:connexion.php?login_err=email');
        }else header('Location:connexion.php?login_err=already');
    }else header('Location:connexion.php');
?>