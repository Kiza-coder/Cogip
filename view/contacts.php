<h1>CONTACTS </h1>

<?php
    $contact = $req -> fetchAll(PDO::FETCH_ASSOC);
    print_r($contact);

?>