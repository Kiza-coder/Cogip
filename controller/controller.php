<?php 
require 'model/model.php';



### functions contact page ###
function displayContact(){ 
    $req = queryContact();
    include 'view/contactsView.php';
}

function displayDetailsContact($id) {
	include 'assets/includes/sanitize.php';
	$req = queryContactDetails($id);
	$request = queryContactDetailsInvoices($id);
	$reqCompany = queryCompanie();
	$req = queryContact();
	

		if(isset($_POST['edit'])){
			if(isEmptyForm()==true && isValidateForm($regEx)==true)
			{
				queryContactEdit($id);
				$req = queryContact();
			}
		}
		include 'view/contactsDetailsView.php';


}

function insertContact(){
    $req = queryCompanie();
    
    include 'view/contactInsertView.php';
    
    if(isset($_POST["send"])){
		if(isEmptyForm()==true && isValidateForm($regEx)==true)
		{
			queryContactInsert();
		}
	}
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
    
    include 'view/companiesInsertView.php';
    
    if(isset($_POST["send"])){
		if(isEmptyForm()==true && isValidateForm($regEx)==true)
		{
			queryCompanyInsert();
		}
	}

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
	if(isset($_POST["companie_name"]))
	{
		$req_contact = queryContactId($_POST["companie_name"]);

	}	
	include 'view/invoiceInsertView.php';
	if(isset($_POST["send"])){
		if(isEmptyForm()==true && isValidateForm($regEx)==true)
		{
			queryInvoiceInsert();
		}
	}
	
	
}




?>