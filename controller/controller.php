<?php 
require 'model/model.php';

function displayContact(){
    
    queryContact();
    include 'view/contactsView.php';
}

?>