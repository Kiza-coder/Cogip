<?php
include 'model/model.php';
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
    <form action="" method="get">
        <button type='submit' value='home' name='1'>home</button>
        <button type='submit' value='invoices' name='1'>invoices</button>
        <button type='submit' value='companies' name='1'>companies</button>
        <button type='submit' value='contacts' name='1'>contacts</button>
        <button type='submit' value='connexion' name='1'>connexion</button>
    </form>

    <?php 

        switch($_GET['1']){
            case 'home':
                include 'view/home.php';
                break;
            case 'invoices':
                include 'view/invoices.php';
                break;
            case 'companies':
                include 'view/companies.php';
                break;
            case 'contacts':
                include 'view/contacts.php';
                break;
            case 'connexion':
                include 'view/connexion.php';
                break;
        }
     ?>
</body>

</html>
