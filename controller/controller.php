<?php 
require 'model/model.php';
### functions contact page ###
function displayContact(){ 
    $req = queryContact();
    include 'view/contactsView.php';
}

### functions companies ###
function displayCompaniesClientsandProviders(){
    $req = queryCompaniesClients();
    $requestp = queryCompaniesProvider();
    include 'view/companiesView.php';
}

function displayDetailsContact($id) {
    $req = queryContactDetails($id);
    $request = queryContactDetailsInvoices($id);
    include 'view/contactsDetailsView.php';
    $req = queryContact();
    include 'view/contactsView.php';
}

function displayInvoices(){
	$req = queryInvoices();
	include 'view/invoicesView.php';
}
    function displayCompanyDetail($id){
    $req = queryDetailsCompany($id);
    include 'view/clientDetailsView.php';
}

function displayInvoicesDetails($id){
	$req = queryInvoicesDetails($id);
	include 'view/invoicesDetailsView.php';
}

function insertInvoice($name){
	$req_companie = queryCompanie();
	if(isset($_GET["companie_name"])){
	$req_contact = queryContactName($name);
	
}
	include 'view/invoiceInsertView.php';
		
	
}
?>