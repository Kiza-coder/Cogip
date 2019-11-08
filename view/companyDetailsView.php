<?php
#### HEADER COMPANY NAME + VAT + TYPE ####
$company = $req -> fetch(PDO::FETCH_ASSOC);
// echo "<pre>";
// var_dump($company);
// echo "</pre>";
$name = $company['name'];
$VAT = $company['VAT'];
$type = $company['type_companies'];
?>
<div class="card shadow mt-5">
    <div class="card-header h3 text-center h3"><?php echo $name?></div>
    <div class="card-body">
    <div class="row d-flex justify-content-around">
    <h3 class="mr-5">VAT:<?php echo $VAT ?></h3>
    <h3 class="ml-5"><?php echo $type?></h3>    
    </div>

<!-- CONTACT RELATED TO COMPANIES -->
<div class="card">
    <div class="card-header">Contact Persons</div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            <?php
$copyDetailContact = $requestDetailContact -> fetchAll(PDO::FETCH_ASSOC);
// var_dump($copyDetailContact);
foreach($copyDetailContact as $key){
    $firstname = $key['first_name'];
    $lastname = $key['last_name'];
    $phone = $key['ph'];
    $email = $key['email'];
    echo '<tr class="text-center"><td>'. $firstname . $lastname . '</td><td>' . $phone . '</td><td>' . $email . '</td></tr>' ;
}
?>
            </tbody>
        </table>
    </div>
</div>


<?php
### CONTACT PERSONS ###
$contact = $request -> fetchAll(PDO::FETCH_ASSOC);
// var_dump($contact);

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
// var_dump($invoice);
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
</div>
</div>