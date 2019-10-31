<h1>Cogip : Companies Directory</h1>
<h2>Clients</h2>
<?php 
$company = $req -> fetchAll(PDO::FETCH_ASSOC);
    // loops in each company which is a client
    foreach ($company as $key){
        echo '<pre>';
        echo $key['name'] . '<br/>';
        echo $key['country'] . '<br/>';
        echo $key['VAT'] . '<br/>';
        echo '</pre>';
    }
?>
<h2>Providers</h2>
<?php
$company = $requestp -> fetchAll(PDO::FETCH_ASSOC);
foreach($company as $key){
    echo '<pre>';
    echo $key['name'] . '<br/>';
    echo $key['country'] . '<br/>';
    echo $key['VAT'] . '<br/>';
    echo '</pre>';
}
?>