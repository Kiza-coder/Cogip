<?php 
require 'model/model.php';

function displayContact(){
    
    $req = queryContact();
    include 'view/contactsView.php';
}

function displayDetailsContact($id) {
    $req = queryContactDetails($id);
    $request = queryContactDetailsInvoices($id);
    include 'view/contactsDetailsView.php';
}

?>