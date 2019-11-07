<h2>Clients</h2>
<table>
<tr>
    <th>Name</th>
    <th>VAT</th>
    <th>Country</th>
</tr>
<?php
$companies_clients =  $req_clients-> fetchAll(PDO::FETCH_ASSOC);
foreach ($companies_clients as $key){
    $type = $key['id_type'];
    $url = $key['id'];
    $namecomp = $key['name'];
    $countrycomp = $key['country'];
    $VATcountry = $key['VAT'];
    echo <<<EOF
    <tr><td><a href="?id=$url&value=companies">$namecomp</a></td><td>$VATcountry </td><td> $countrycomp</td></tr>
EOF;
}
?>
</table>