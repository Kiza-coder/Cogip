<?php 
require 'model/model.php';



### functions contact page ###
function displayContact(){ 
    $req = queryContact();
    include 'view/contactsView.php';
}

function displayDetailsContact($id) {
    $req = queryContactDetails($id);
    $request = queryContactDetailsInvoices($id);
    include 'view/contactsDetailsView.php';
    $req = queryContact();

}

function insertContact(){
    $req = queryCompanie();
    if(isset($_POST['send'])){
        queryContactInsert();
    }
    include 'view/contactInsertView.php';

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
	if(isset($_GET["companie_name"]))
	{
		$req_contact = queryContactId($_GET["companie_name"]);

	}	
	include 'view/invoiceInsertView.php';
	if(isset($_GET["send"])){
		if(isEmptyForm()==true && isValidateForm($regEx)==true)
		{
			queryInvoiceInsert();
		}
	}
	
	
}




?>