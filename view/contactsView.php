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
    $url = $key['cont_id'];
    $firstname = $key['first_name'];
    $lastname = $key['last_name'];
    $phone = $key['phone'];
    $email = $key['email'];
    $name = $key['name'];
    $value = $_GET['value'];
echo <<<EOF
<tr><td><a href="?id=$url&value=$value">$firstname $lastname</a></td><td>$phone</td><td>$email</td><td>$name</td></tr>
EOF;
}
?>
</table>