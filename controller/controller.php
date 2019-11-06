<?php 
require 'model/model.php';
$regEx = array(
    "number_invoice" => "#^F{1}[0-9]{8}-{1}[0-9]{3}$#",
    "date" => "#^[0-9]{4}-{1}[0-9]{2}-{1}[0-9]{2}$#",
    "contact_name" => "#^[0-9]{1,4}$#",
    "companie_name" => "#^[0-9]{1,4}$#",
    "option_create" => "#^[a-z]{1,20}#"
);

function isEmptyForm()
{
	$isEmpty = true;
	if(isset($_GET))
	{
		foreach($_GET as $key => $value)
		{
			
			if(empty($_GET[$key]))
			{
				$isEmpty = false;
			}
		}
	}
	return $isEmpty;
}


function isValidateForm($regEx)
{
	$isValidate = true ;
	foreach($_GET as $key => $value)
	{
		if(!preg_match($regEx[$key],$_GET[$key]))
		{
			echo "ok" ;
			$isValidate = false;
		}
	}
	return $isValidate;
}



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

}

### functions invoices ###
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

function insertInvoice(){
	$req_companie = queryCompanie();
	if(isset($_GET["companie_name"]))
	{
		$req_contact = queryContactId($_GET["companie_name"]);

	}	
	
	if(isset($_GET["send"])){
	queryInvoiceInsert();
}
	include 'view/invoiceInsertView.php';
	
}


?>