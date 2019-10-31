<?php 
require 'model/model.php';

function displayContact(){
    
    $req = queryContact();
    include 'view/contactsView.php';
}

?>