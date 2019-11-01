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
?>