<?php
$company = $req -> fetch(PDO::FETCH_ASSOC);
echo "<pre>";
var_dump($company);
echo "</pre>";
$name = $company['name'];
$VAT = $company['VAT'];
$type = $company['type_companies'];
?>
<h1>Company : <?php echo $name?></h1>
<h3>VAT:<?php echo $VAT ?></h3>
<h3>Type:<?php echo $type?></h3>

<!-- CONTACT RELATED TO COMPANIES -->
<h3>Contact Persons</h3>
<?php
$contact = $req -> fetch(PDO::FETCH_ASSOC);
echo "<pre>";
var_dump($contact);
echo "</pre>";
?>