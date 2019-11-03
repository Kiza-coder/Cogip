<h1>Cogip : Companies Directory</h1>
<h2>Clients</h2>
<table>
<tr>
    <th>Name</th>
    <th>Country</th>
    <th>VAT</th>
</tr>
<?php 
##### table for clients #####
$company = $req -> fetchAll(PDO::FETCH_ASSOC);
    // loops in each company which is a client
    foreach ($company as $key){
    // variable $url stores the id for le detail de la company so when click, use that id for page detail
    $url = $key['id'];
    $namecomp = $key['name'];
    $countrycomp = $key['country'];
    $VATcountry = $key['VAT'];
    $valueoptions = $_GET['value'];
    echo <<<EOF
    <tr><td><a href="?id=$url&value=$valueoptions">$namecomp</a></td><td> $countrycomp </td><td> $VATcountry </td></tr>
EOF;
}
?>
</table>

<h2>Providers</h2>
<table>
<tr>
    <th>Name</th>
    <th>Country</th>
    <th>VAT</th>
</tr>
<?php
####### table for clients ######
$company = $requestp -> fetchAll(PDO::FETCH_ASSOC);
// looping to create link
foreach($company as $key){
    // variable $url stores the id for le detail de la company so when click, use that id for page detail
    $url = $key['id'];
    $namecomp = $key['name'];
    $countrycomp = $key['country'];
    $VATcountry = $key['VAT'];
    $valueoptions = $_GET['value'];
    echo <<<EOF
    <tr><td><a href="?id=$url&value=$valueoptions">$namecomp</a></td><td> $countrycomp </td><td> $VATcountry </td></tr>
EOF;
}
?>
</table>