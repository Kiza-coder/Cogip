<?php

function dbConnect()
{
    try{
        $db = new PDO ('mysql:host=localhost;dbname=cogip','root','');
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
    return $req;
}

function queryInvoices(){
         $db = dbConnect();
        $req = $db -> prepare("SELECT * FROM invoices AS i
         INNER JOIN companies AS c
          ON i.id_companies = c.id
         INNER JOIN type AS t
          ON c.id_type_companies = t.id
          INNER JOIN contacts AS cont
          ON i.id_contacts = cont.id");
        $req-> execute();
        return $req;
}

function queryInvoicesDetails($id){
        $db = dbConnect();
        $req = $db -> prepare("SELECT i.number, c.id AS c_id, cont.id AS cont_id, c.name, c.VAT, t.type_companies,cont.first_name, cont.last_name, cont.email, cont.phone   FROM invoices AS i
         INNER JOIN companies AS c
          ON i.id_companies = c.id
         INNER JOIN type AS t
          ON c.id_type_companies = t.id
          INNER JOIN contacts AS cont
          ON i.id_contacts = cont.id
          WHERE i.id = $id");
        $req-> execute();
        return $req;
}


?>