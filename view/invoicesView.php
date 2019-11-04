<h1>INVOICES </h1>
<?php
    $invoices = $req -> fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <tr>
        <th>INVOICE NUMBER</th>
        <th>DATE</th>
        <th>COMPANIES</th>
        <th>TYPE</th>
    </tr>
    <?php
  	

foreach($invoices as $key){
$url = $key['id'];
$numInvoice = $key['number'];
$name = $key["name"];
$date = $key['date'];
$last_name = $key["last_name"];
$type_companies = $key['type_companies'];
$value = "invoices";

echo <<<EOF
<tr><td><a href="?id=$url&value=$value">$numInvoice</a></td>
<td>$date</td>
<td>$name </td>
<td>$type_companies</td>


</tr>
EOF;
}
?>
</table>