<h1>INVOICES </h1>
<?php
$invoices = $req -> fetch();
$url_contact = $invoices['cont_id'];
$url_company = $invoices['c_id'];
$numInvoice =  $invoices['number'];    
$name = $invoices['name'];    
$VTA = $invoices['VAT'];    
$type = $invoices['type_companies'];    
$first_name = $invoices['first_name'];    
$last_name = $invoices['last_name'];    
$email = $invoices['email'];    
$phone = $invoices['phone'];
$value_company = "companies";
$value_contact = "contacts";   


echo <<<EOF
<p>Company linked to the invoice :::</p>
<table>
    <tr>
        <th>Name</th>
        <th>Tva</th>
        <th>Company Type</th>
    </tr>
	<tr>
		<td><a href=?id=$url_company&value=$value_company>$name</a></td>
		<td>$VTA</td>
		<td>$type</td>
	</tr>
</table>

<p>Contact person ::::</p>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
	<tr>
		<td><a href=?id=$url_contact&value=$value_contact>$first_name  $last_name</td>
		<td>$email</td>
		<td>$phone</td>
	</tr>
</table>


EOF;

?>