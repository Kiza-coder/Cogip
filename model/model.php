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
    $req = $db -> prepare("SELECT cont.id AS cont_id, cont.first_name, cont.last_name, cont.phone, cont.email, com.name 
                           FROM contacts AS cont 
                           JOIN companies AS com 
                           ON cont.id_companies = com.id");
    $req-> execute();
    return $req;
}

function queryContactDetails($id) {
    $db = dbConnect();
    $req = $db -> prepare ("SELECT cont.id AS cont_id, cont.first_name, cont.last_name, cont.phone, cont.email, com.id AS com_id, com.name, inv.id AS inv_id, inv.date, inv.number 
                            FROM invoices AS inv
                            JOIN companies AS com
                            ON inv.id_companies = com.id
                            JOIN contacts AS cont
                            ON inv.id_contacts = cont.id
                            WHERE cont.id = $id");
    $req -> execute();
    return $req;
}

function queryContactDetailsInvoices($id){
    $db = dbConnect();
    $req = $db -> prepare ("SELECT cont.id AS cont_id, inv.id AS inv_id, number, date FROM invoices AS inv 
                            JOIN contacts AS cont
                            ON inv.id_contacts = cont.id
                            WHERE cont.id = $id");
    $req -> execute();
    return $req;
}
?>