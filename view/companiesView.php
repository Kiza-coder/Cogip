<h1>Cogip : Companies Directory</h1>

<h2>
<?php
$typecompany = $requesttype ->fetchAll(PDO::FETCH_ASSOC);
$type = $typecompany[0]['id_type'];
echo <<<EOF
<a href="?id_type=$type&value=companies">Clients</a>
EOF;
?>
</h2>
<table>
<tr>
    <th>Name</th>
    <th>VAT</th>
    <th>Country</th>
</tr>
<?php 
##### table for clients #####
$company =  $req-> fetchAll(PDO::FETCH_ASSOC);
    // loops in each company which is a client
    foreach ($company as $key){
    // variable $url stores the id for le detail de la company so when click, use that id for page detail
    $url = $key['id'];
    $namecomp = $key['name'];
    $countrycomp = $key['country'];
    $VATcountry = $key['VAT'];
    $valueoptions = $_GET['value'];
    $type = $key['id_type_companies'];
    echo <<<EOF
    <tr><td><a href="?id=$url&value=$valueoptions">$namecomp</a></td><td>$VATcountry </td><td> $countrycomp</td></tr>
EOF;
}
?>
</table>

<h2>
<?php
$typecompany = $requesttype ->fetchAll(PDO::FETCH_ASSOC);
$type = $typecompany[0]['id_type'];
echo $type;
echo <<<EOF
<a href="?id_type=$type&value=companies">Providers</a>
EOF;
?>
</h2>
<table>
<tr>
    <th>Name</th>
    <th>VAT</th>
    <th>Country</th>
</tr>
<?php
####### table for providers ######
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
    <tr><td><a href="?id=$url&value=$valueoptions"> $namecomp</a></td><td> $VATcountry</td><td>$countrycomp</td></tr>
EOF;
}
?>
</table>