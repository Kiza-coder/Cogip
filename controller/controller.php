<?php 
require 'model/model.php';

function displayContact(){
    $req = queryContact();
    include 'view/contactsView.php';
}

function displayInvoices(){
	$req = queryInvoices();
	include 'view/invoicesView.php';
}

function displayInvoicesDetails($id){
	$req = queryInvoicesDetails($id);
	include 'view/invoicesDetailsView.php';
}

function insertInvoice($array){
	$req_companie = queryCompanie();
	if(isset($_POST['contact_select']))
	{
		$req_companie = queryCompanie();
		include 'view/invoiceInsertView.php';
	}
	include 'view/invoiceInsertView.php';
	
}
?>