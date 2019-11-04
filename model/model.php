<?php
// connect DB
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
####### FUNCTIONS FOR COMPANIES ########
// functions which prepares the query, executes the query and copies the result
function queryCompaniesClients(){
    $db = dbConnect();
    $req = $db -> prepare("SELECT * FROM companies WHERE id_type_companies='1'ORDER BY name ASC");
    $req -> execute();
    return $req;
}
function queryCompaniesProvider(){
    $db = dbConnect();
    $requestp = $db -> prepare("SELECT * FROM companies AS com WHERE id_type_companies='2' ORDER BY name ASC");
    $requestp -> execute();
    return $requestp;
}
// recupere id du click
function queryDetailsCompany($id){
    $db = dbConnect();
    // $req = $db -> prepare("SELECT * FROM companies INNER JOIN type ON companies.id_type_companies = type.id WHERE companies.id=$id");
    // $req -> execute();
    // return $req;
    $req = $db -> prepare("SELECT companies.id AS comp_id , name, VAT, type_companies FROM companies INNER JOIN type ON companies.id_type_companies = type.id WHERE companies.id=$id");
    $req -> execute();
    return $req;
}


?>