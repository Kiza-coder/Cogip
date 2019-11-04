<?php
session_start();
require 'controller/controller.php';

$_SESSION['id'] = 2;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                echo "<button type='submit' value='connexion' name='1'>connexion</button>";
            } else {
                echo "<button type='submit' value='login' name='1'>Admin</button>";
            }
            ?>

        </form>

    </header>

    <?php 

     if(isset($_GET['value'])){
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
                include 'view/companiesView.php';
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
     ?>
</body>

</html>