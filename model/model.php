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
    $req = $db -> prepare('SELECT * FROM contacts');
    $req-> execute();
 
    return $contact;
}
?>