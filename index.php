<?php
session_start();

require 'controller/controller.php';
$_SESSION["id"] = 2;
$_SESSION['rights'] = 3;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=value.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php 
    require "view/headerView.php";
    ?>

    <?php 
       if(isset($_GET['option_create'])){
            if ($_GET['option_create'] == 'invoice'){
                insertInvoice();
            }
            if ($_GET['option_create'] == 'company'){
                insertCompany();
            }
            if($_GET['option_create'] == 'contact'){
                insertContact();
            }
            }
            else{
         if(isset($_GET['value'])){
 #### switch in for different button options in menu ###   
        switch($_GET['value']){
            case 'home':
                include 'view/homeView.php';
                break;
            case 'invoices':
            if(isset($_GET["id"])){
                displayInvoicesDetails($_GET["id"]);
            }
            else{
                 displayInvoices();
            }
                break;
            case 'companies':
            // if user clicks on the link with id equals to row in db redirect to detailled page else stay where you are
            if(isset($_GET['id'])){
            displayCompanyDetail($_GET['id']);
            } else if (isset($_GET['id_type'])){
                if($_GET['id_type'] == 1){
                displayClientsAll();
                } else {
                    displayProvidersAll();
                }
        } else {
            displayCompaniesClientsandProviders();
        }
            break;
            case 'contacts':
                if(isset($_GET['id'])){
                    displayDetailsContact($_GET['id']);
                } else {
                    displayContact();
                }
                break;
            case 'connexion':
                include 'view/connexionView.php';
                break;
            case 'login':
                login();
                break;
        
            case 'user':
                if(isset($_GET['id'])){
                    displayUserDetails($_GET['id']);
                }
                else{
                displayUser();
            }
                break;
}
}   
            }
    require "view/footerView.php";
     ?>

</body>

</html>