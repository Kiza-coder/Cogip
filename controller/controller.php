<?php
### contact ####
function displayContact(){
    $req = queryContact();
    include 'view/contacts.php';
}

### companies ###
function displayCompaniesClientsandProviders(){
    $req = queryCompanies();
    $requestp = queryCompaniesProvider();
    include 'view/companies.php';
}


?>