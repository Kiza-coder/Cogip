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

		if(isset($_POST['edit'])){
			if(isEmptyForm()==true && isValidateForm($regEx)==true)
			{
				queryContactEdit($id);
				$req = queryContactDetails($id);
			}
		}
		include 'view/contactsDetailsView.php';


}

function insertContact(){
	require "assets/includes/sanitize.php";
	$req = queryCompanie();
    
    if(isset($_POST["send"])){
		if(isEmptyForm()==true && isValidateForm($regEx)==true)
		{
			queryContactInsert();
		}
	}
	include 'view/contactInsertView.php';
}

### functions companies ###
function displayCompaniesClientsandProviders(){
    $req = queryCompaniesClients();
	$requestp = queryCompaniesProviders();
	$requesttype = queryTypeCompany();
    include 'view/companiesView.php';
}
function displayCompanyDetail($id){
    $req = queryDetailsCompany($id);
    $request = queryDetailsContact($id);
	$requestDetailClient = queryDetailsInvoiceForCompany($id);
###################### ADDED BY LALY OK? LOOK MODEL LIGNE 64 ##########################
	$requestDetailContact = queryDetailsContactForCompany($id);
#######################################################
    include 'view/companyDetailsView.php';
}

function displayClientsAll(){
	$req_clients = queryCompaniesClients();
	include 'view/companiesClientsView.php';
}
function displayProvidersAll(){
	$req_providers = queryCompaniesProviders();
	include 'view/companiesProvidersView.php';
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
	include 'assets/includes/sanitize.php';
	$req = queryInvoicesDetails($id);
	$req_companie = queryCompanie();
	if(isset($_POST['companie_name']))	
	{
		$req_contact = queryContactId($_POST["companie_name"]);

	}
	if(isset($_POST['edit'])){
			if(isEmptyForm()==true && isValidateForm($regEx)==true)
			{
				queryInvoiceEdit($id);
			}
	}	
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

##function login
function login(){
	include 'assets/includes/sanitize.php';
	if(isset($_POST["send"]))
	{

		if(isEmptyForm()==true && isValidateForm($regEx)==true)
		{
			$req = queryUserByUsername($_POST['login']);
			include 'view/loginView.php';
			
		}
	}

	else{

			include 'view/loginView.php';
	}
	
}


##user
function displayUser()
{
	$req = queryUser();
	include "view/userView.php";
}


function displayUserDetails($id)
{
	$req = queryUserById($id);
	include 'view/userDetailsView.php';
}

#### FUNCTION DISPLAY LAST 5 ####

function displayLastFive(){
	$reqInvoices = queryLastFiveInvoices();
	$reqContacts = queryLastFiveContacts();
	$reqCompanies = queryLastFiveCompanies();
	include "view/homeView.php";
}


?>