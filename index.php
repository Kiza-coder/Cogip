<?php
session_start();
require 'controller/controller.php';

$_SESSION['id'] = 2;
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
    <header>
        <form action="" method="get">
            <button type='submit' value='home' name='value'>home</button>
            <button type='submit' value='invoices' name='value'>invoices</button>
            <button type='submit' value='companies' name='value'>companies</button>
            <button type='submit' value='contacts' name='value'>contacts</button>
            <?php if ($_SESSION['id'] == 3){
                echo "<button type='submit' value='connexion' name='value'>connexion</button>";
            } else {
                echo "<button type='submit' value='login' name='value'>Admin</button>";
            }
            ?>

        </form>



        <form action="" method="GET">
            <button type='submit' value='invoice' name='option_create'>create_invoice</button>

            <button type='submit' value='contact' name='option_create'>create_contact</button>

            <button type='submit' value='company' name='option_create'>create_company</button>
        </form>

    </header>

    <?php 

       if(isset($_GET['option_create']))
       {
           if(($_GET['option_create']) == "invoice"){
               insertInvoice($_GET);
           } else if(($_GET['option_create']) == "contact"){
               insertContact(); 
           } else if(($_GET['option_create']) == "company"){
               
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
        }
    

}   
}
     ?>
</body>

</html>