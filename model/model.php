<?php

function dbConnect()
{
    try{
        $db = new PDO ('mysql:host=database;dbname=Cogip','root','root');
        return $db;
    }
    catch(Exeption $e){
        die('Erreur: '.$e->getMessage());

    }
}

function queryContact(){
    $db = dbConnect();
    $req = $db -> prepare('SELECT * FROM contacts AS cont JOIN companies AS com ON cont.companies_id = com.id');
    $req-> execute();
 
    return $req;
}
?>