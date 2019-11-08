<?php
// connect DB
function dbConnect()
{
    try{

        $db = new PDO ('mysql:host=localhost;dbname=Cogip','root','');
    
        return $db;
    }

    catch(Exeption $e)
    {
        die('Erreur: '.$e->getMessage());
    }
}
####### FUNCTIONS FOR COMPANIES ########
// functions which prepares the query, executes the query and copies the result


// functions which prepares the query, executes the query
function queryCompaniesClients(){
    $db = dbConnect();
    $req = $db -> prepare("SELECT * FROM companies WHERE id_type_companies='1'ORDER BY name ASC");
    $req -> execute();
    return $req;
}

function queryCompaniesProviders(){
    $db = dbConnect();
    $req = $db -> prepare("SELECT * FROM companies WHERE id_type_companies='2'ORDER BY name ASC");
    $req -> execute();
    return $req;
}


function queryTypeCompany(){
    $db = dbConnect();
    $reqtype = $db -> prepare("SELECT id AS id_type FROM type");
    $reqtype -> execute();
    return $reqtype;
}
// COMPANIES DETAIL //
function queryDetailsCompany($id){
    $db = dbConnect();
    $req = $db -> prepare("SELECT companies.id AS comp_id , name, VAT, type_companies 
                        FROM companies 
                        INNER JOIN type ON companies.id_type_companies = type.id 
                        WHERE companies.id=$id");
    $req -> execute();
    return $req;
}

function queryDetailsInvoiceForCompany($id){
    $db = dbConnect();
    $requestInv = $db -> prepare("SELECT invoices.id AS inv_id, number AS n, date AS d, email AS e 
                                FROM invoices
                                INNER JOIN companies ON invoices.id_companies = companies.id
                                INNER JOIN contacts ON invoices.id_contacts = contacts.id
                                WHERE companies.id=$id");
    $requestInv -> execute();
    return $requestInv;
}

function queryDetailsContactForCompany($id){
    $db = dbConnect();
    $requestContact = $db -> prepare("SELECT first_name, last_name, contacts.phone AS ph, email 
                                    FROM contacts
                                    INNER JOIN companies ON id_companies = companies.id
                                    WHERE companies.id=$id");
    $requestContact -> execute();
    return $requestContact;
}

// insert company //
function queryType(){
    $db = dbConnect();
    $req = $db -> prepare('SELECT * FROM type');
    $req-> execute();
    return $req;
}
function queryCompanyInsert(){
    $companyname = $_POST['name_comp'];
    $comptva = $_POST['tva_comp'];
    $compphone = $_POST['phone_comp'];
    $type = $_POST['type_comp'];
    $country = "belgique";

    $db = dbConnect();
    
    $req = $db -> prepare("INSERT INTO `companies` (`name`, `country`, `VAT`, `id_type_companies`, `phone`) 
    VALUES (:new_company, :country, :new_VAT, :id_type_comp, :new_phone )");
    $req->execute(array(
        'new_company' => $companyname,
        'country' => $country,
        'new_VAT' => $comptva,
        'id_type_comp' => $type,
        'new_phone'=> $compphone
));
}

##### CONTACTS #####
function queryDetailsContact($id){
    $db = dbConnect();
    $req = $db -> prepare("SELECT contacts.id AS cont_id, first_name, last_name, phone, email 
                        FROM contacts 
                        INNER JOIN companies 
                        ON contacts.id_companies = companies.id
                        WHERE companies.id=$id");
    $req -> execute();
    return $req;
}

function queryContact(){
    $db = dbConnect();
    $req = $db -> prepare("SELECT cont.id AS cont_id, cont.first_name, cont.last_name, cont.phone, cont.email, com.id AS com_id, com.name AS name
                           FROM contacts AS cont 
                           JOIN companies AS com 
                           ON cont.id_companies = com.id");
    $req-> execute();
    return $req;
}


function queryContactDetails($id) {
    $db = dbConnect();
    $req = $db -> prepare ("SELECT cont.id AS cont_id, cont.first_name, cont.last_name, cont.phone, cont.email, com.id AS com_id, com.name, inv.id AS inv_id, inv.date, inv.number 
                            FROM contacts AS cont
                            JOIN companies AS com
                            ON cont.id_companies = com.id
                            JOIN invoices AS inv
                            ON inv.id_companies = com.id
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
function queryContactName($name){
    $db = dbConnect();
    $req = $db -> prepare("SELECT cont.id AS cont_id, cont.first_name, cont.last_name, cont.phone, cont.email, com.name
    FROM contacts AS cont
    JOIN companies AS com
    ON cont.id_companies = com.id
    WHERE com.name = '$name' ");
    $req-> execute();
    return $req;
    }
#####INVOICES#####

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
        $req = $db -> prepare("SELECT i.number, c.id AS c_id, cont.id AS cont_id, c.name, c.VAT, t.type_companies,cont.first_name, cont.last_name, cont.email, cont.phone, i.date, i.id AS in_id   FROM invoices AS i
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
        $number = $_POST['number_invoice'];
        $id_companie = $_POST['companie_name'];
        $id_contact = $_POST['contact_name'];
        $db = dbConnect();
        $req = $db -> prepare("INSERT INTO `invoices` (`date`, `number`, `id_companies`, `id_contacts`) VALUES (:new_date, :new_number, :new_id_compagnie, :new_id_contact)");
        $req->execute(array(
                'new_date' => $date,
                'new_number' => $number,
                'new_id_compagnie' => $id_companie,
                'new_id_contact' => $id_contact
        ));

}


function queryInvoiceEdit($id)
{
    $db = dbConnect();
    $req = $db -> prepare("UPDATE `invoices` SET `number` = :new_number, `date` = :new_date , `id_companies` = :new_id_companies, `id_contacts` = :new_id_companies WHERE invoices.id = $id");
    $req ->execute(array(
        'new_number' => $_POST['date'],
        'new_date' => $_POST['number_invoice'],
        'new_id_companies' => $_POST['companie_name'],
        'new_id_contacts' => $_POST['contact_name']
    ));
}

##query contact
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



function queryContactInsert(){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];

    $db = dbConnect();

    $req = $db -> prepare("INSERT INTO `contacts` (`first_name`, `last_name`, `email`, `phone`, `id_companies`) 
                           VALUES (:new_firstname, :new_lastname, :new_email, :new_phone, :new_id_company)");

    $req -> execute(array(
        'new_firstname' => $firstname,
        'new_lastname' => $lastname,
        'new_email' => $email,
        'new_phone' => $phone,
        'new_id_company' => $company    
    ));
}

function queryContactEdit($id) {
    $db = dbConnect();

    $req = $db -> prepare("UPDATE `contacts` SET `first_name` = :new_firstname, `last_name` = :new_lastname, `email` = :new_email , `phone` = :new_phone, `id_companies` = :new_id_companies
                           WHERE contacts.id = $id");
    $req -> execute(array(
        'new_firstname' => $_POST['firstname'],
        'new_lastname' => $_POST['lastname'],
        'new_email' => $_POST['email'],
        'new_phone' => $_POST['phone'],
        'new_id_companies' => $_POST['company']
    ));
}



#query user
function queryUserByUsername($username){
    $db = dbConnect();
    $req = $db -> prepare("SELECT * FROM users WHERE username = '$username'");
    $req -> execute();
    return $req;
}

function queryUser(){
    $db = dbConnect();
    $req = $db -> prepare("SELECT username, acces.rights, users.id AS id_user  FROM users
        INNER JOIN acces ON
        id_acces = acces.id ");
    $req -> execute();
    return $req;
}


function queryUserById($id){
    $id = $_GET['id'];
    $db = dbConnect();
    $req = $db -> prepare("SELECT username, acces.rights, users.id AS id_user, password FROM users
        INNER JOIN acces ON
        id_acces = acces.id 
        WHERE users.id = $id" );
    $req -> execute();
    return $req;
}




?>