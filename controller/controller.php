<?php 

function displayContact(){
    $req = queryContact();
    include 'view/contacts.php';
}

?>