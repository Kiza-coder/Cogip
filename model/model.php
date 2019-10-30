<?php
#### functions for companies page#####
// function which prepares the query, executes the query and copies the result
function queryCompanies(){
    $db = dbConnect();
    $req = $db -> prepare("SELECT name, country, VAT FROM companies WHERE id_type_companies='1'");
    $req -> execute();
    $company = $req -> fetch(PDO::FETCH_ASSOC);
    echo '<pre>';
    print_r($company);
    echo '</pre>';
}

function queryCompaniesProvider(){
    $db = dbConnect();
    $req = $db -> prepare("SELECT name, country, VAT FROM companies WHERE id_type_companies='2'");
    $req -> execute();
    $company = $req -> fetch(PDO::FETCH_ASSOC);
    echo '<pre>';
    print_r($company);
    echo '</pre>';
}

function queryContact(){
    $db = dbConnect();
    $req = $db -> prepare('SELECT * FROM contacts WHERE last_name="bou"');
    //lance sql query
    $req-> execute();
    $contact = $req -> fetch(PDO::FETCH_ASSOC);
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