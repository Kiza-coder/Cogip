<?php
// connect DB
function dbConnect()
{
    try{

        $db = new PDO ('mysql:host=database;dbname=Cogip','root','root');
    
        return $db;
    }

    catch(Exeption $e)
    {
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
    $req = $db -> prepare("SELECT * FROM companies WHERE id_type_companies='2'ORDER BY name ASC");
    $req-> execute();
    return $req;
}

function queryContact(){
    $db = dbConnect();
    $req = $db -> prepare("SELECT cont.id AS cont_id, cont.first_name, cont.last_name, cont.phone, cont.email, com.id AS com_id, com.name 
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
    $requestp = $db -> prepare("SELECT * FROM companies AS com WHERE id_type_companies='2' ORDER BY name ASC");
    $requestp -> execute();
    return $requestp;
}

function queryCompanie(){
    $db = dbConnect();
    $req = $db -> prepare('SELECT * FROM companies');
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

function queryInvoiceInsert()
{
        $date = date("m.d.y");
        $number = $_GET['number_invoice'];
        $id_companie = $_GET['companie_name'];
        $id_contact = $_GET['contact_name'];
        $db = dbConnect();
        $req = $db -> prepare("INSERT INTO `invoices` (`date`, `number`, `id_companies`, `id_contacts`) VALUES (:new_date, :new_number, :new_id_compagnie, :new_id_contact)");
        $req->execute(array(
                'new_date' => $date,
                'new_number' => $number,
                'new_id_compagnie' => $id_companie,
                'new_id_contact' => $id_contact
        ));

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

function queryContact(){
$db = dbConnect();
$req = $db -> prepare("SELECT cont.id AS cont_id, cont.first_name, cont.last_name, cont.phone, cont.email, com.name
FROM contacts AS cont
JOIN companies AS com
ON cont.id_companies = com.id");
$req-> execute();
return $req;
}


function queryContactId($id){
$db = dbConnect();
$req = $db -> prepare("SELECT cont.id AS cont_id, cont.first_name, cont.last_name, cont.phone, cont.email, com.name
FROM contacts AS cont
JOIN companies AS com
ON cont.id_companies = com.id
WHERE com.id = '$id' ");
$req-> execute();
return $req;
}


?>