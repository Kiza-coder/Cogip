<?php
### contact ####
function displayContact(){
    $req = queryContact();
    include 'view/contacts.php';
}

### companies ###
function displayCompaniesClients(){
    include 'view/companies.php';
    $req = queryCompanies();
}

function displayCompaniesProvider(){
    $req = queryCompaniesProvider();
}

?>