<?php 
require 'model/model.php';
### functions contact page ###
function displayContact(){ 
    $req = queryContact();
    include 'view/contactsView.php';
}

### functions companies ###
function displayCompaniesClientsandProviders(){
    $req = queryCompanies();
    $requestp = queryCompaniesProvider();
    include 'view/companiesView.php';
}

?>