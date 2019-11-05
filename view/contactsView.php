<h1>CONTACTS </h1>

<?php
    $contact = $req -> fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Company</th>
    </tr>
    <?php

foreach($contact as $key){
    $urlContact = $key['cont_id'];
    $urlCompany = $key['com_id'];
    $firstname = $key['first_name'];
    $lastname = $key['last_name'];
    $phone = $key['phone'];
    $email = $key['email'];
    $name = $key['name'];
    $valueContact = 'contacts';
    $valueCompany = 'companies';
echo <<<EOF
<tr><td><a href="?id=$urlContact&value=$valueContact">$firstname $lastname</a></td><td>$phone</td><td>$email</td><td><a href="?id=$urlCompany&value=$valueCompany">$name</a></td></tr>
EOF;
}
?>
</table>