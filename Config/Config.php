<?php
    try
    {
        $bdd=new PDO('mysql:host=127.0.0.1;dbname=bibliotheque;charset=utf8','root','');
    }
    catch(Exception $e)
    {
        die('erreur'.$e->getMessage());
    }