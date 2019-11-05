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
function displayCompanyDetail($id){
    $req = queryDetailsCompany($id);
    $request = queryDetailsContact($id);
    $requestDetailClient = queryDetailsInvoiceForCompany($id);
    include 'view/clientDetailsView.php';
}
function insertCompany(){
    $req_type_company = queryType();
    if(isset($_GET['send'])){
        queryCompanyInsert();
    }
    include 'view/companiesInsertView.php';
}

### functions contact ###
function displayDetailsContact($id) {
    $req = queryContactDetails($id);
    $request = queryContactDetailsInvoices($id);
    include 'view/contactsDetailsView.php';
    $req = queryContact();
    include 'view/contactsView.php';
}

### functions invoices ###
function displayInvoices(){
	$req = queryInvoices();
	include 'view/invoicesView.php';
}

function displayInvoicesDetails($id){
	$req = queryInvoicesDetails($id);
	include 'view/invoicesDetailsView.php';
}

function insertInvoice(){
	$req_companie = queryCompanie();
	if(isset($array["companie_name"])){
	$req_contact = queryContactName($array["companie_name"]);
	
}
	include 'view/invoiceInsertView.php';
		
	
}
?>