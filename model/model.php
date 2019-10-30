<?php


function queryContact(){
    $db = dbConnect();
    $req = $db -> prepare('SELECT * FROM contacts WHERE last_name="bou"');
    $req-> execute();
    $contact = $req -> fetch(PDO::FETCH_ASSOC);
    var_dump($contact);
}

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