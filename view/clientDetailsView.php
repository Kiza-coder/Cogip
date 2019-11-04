<?php
$company = $req -> fetch(PDO::FETCH_ASSOC);
// echo "<pre>";
// var_dump($company);
// echo "</pre>";
$name = $company['name'];
$VAT = $company['VAT'];
$type = $company['type_companies'];
?>
<h1>Company : <?php echo $name?></h1>
<h3>VAT:<?php echo $VAT ?></h3>
<h3>Type:<?php echo $type?></h3>

<!-- CONTACT RELATED TO COMPANIES -->
<h3>Contact Persons</h3>
<table>
<tr>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
</tr>
<?php
### CONTACT PERSONS ###
$contact = $request -> fetchAll(PDO::FETCH_ASSOC);
var_dump($contact);

foreach ($contact as $key){
    $url = $key['cont_id'];
    $lastname = $key['last_name'];
    $firstname = $key['first_name'];
    $phone = $key['phone'];
    $email = $key['email'];
    $valueoptions = "contacts";
echo <<<EOF
<tr><td><a href="?id=$url&value=$valueoptions">$firstname$lastname</a></td><td>$phone</td><td>$email</td></tr>
EOF;
}
?>
</table>
<!-- INVOICES RELATED TO COMPANIES -->
<h3>Invoices</h3>
<table>
<tr>
    <th>Invoice number</th>
    <th>Date</th>
    <th>Contact Person</th>
</tr>
<?php
### INVOICES RELATED TO COMPANIES###
$invoice = $requestDetailClient -> fetchAll(PDO::FETCH_ASSOC);
var_dump($invoice);
foreach($invoice as $key){
    $url = $key['inv_id'];
    $numberinv = $key['n'];
    $dateinv = $key['d'];
    $contactinv = $key['e'];
    $valueoptions = "invoices";
echo <<<EOF
<tr><td><a href="?id=$url&value=$valueoptions">$numberinv</td><td>$dateinv</td><td>$contactinv</td></tr>
EOF;
}
?>
</table>
<?php
// echo "<pre>";
// var_dump($contact);
// echo "</pre>";
?>