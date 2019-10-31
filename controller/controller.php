<?php 
require 'model/model.php';

function displayContact(){ 
    $req = queryContact();
    include 'view/contactsView.php';
}

### companies ###
function displayCompaniesClientsandProviders(){
    $req = queryCompanies();
    $requestp = queryCompaniesProvider();
    include 'view/companiesView.php';
}

?>