<?php 
    $reqInv = $reqInvoices -> fetchAll(PDO::FETCH_ASSOC);
     

    $reqCont = $reqContacts -> fetchAll(PDO::FETCH_ASSOC);


    $reqComp = $reqCompanies -> fetchAll(PDO::FETCH_ASSOC);
?>
<!-- LAST 5 INVOICES -->
<div class="card shadow mt-5 text-center">
    <div class="card-header h3">
        LAST 5 INVOICES
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Invoice</th>
                    <th>Dates</th>
                    <th>Company</th>
                </tr>
            </thead>
            <tbody>
                <?php

    foreach($reqInv as $key){
        $number = $key['number'];
        $date = $key['date'];
        $company = $key['name']; 
        $value = 'invoices';
        $url = $key['inv_id'];
echo <<<HTML
<tr><td><a href="?id=$url&value=$value">$number</a></td>
<td>$date</td>
<td>$company </td>
HTML;
}
?>
            </tbody>
        </table>
    </div>
</div>

<!-- LAST 5 CONTACTS -->
<div class="card shadow mt-5 mb-5 text-center">
    <div class="card-header h3">
        LAST 5 CONTACTS
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Company</th>
                </tr>
            </thead>
            <tbody>
                <?php

    foreach($reqCont as $key){
        $firstname = $key['first_name'];
        $lastname = $key['last_name'];
        $phone = $key['phone'];
        $email = $key['email'];
        $company = $key['name']; 
        $value = 'contacts';
        $url = $key['cont_id'];
echo <<<HTML
<tr><td><a href="?id=$url&value=$value">$firstname $lastname</a></td>
<td>$phone</td>
<td>$email</td>
<td>$company </td>
HTML;
}
?>
            </tbody>
        </table>
    </div>
</div>

<!-- LAST 5 COMPANIES -->
<div class="card shadow mt-5 mb-5 text-center">
    <div class="card-header h3">
        LAST 5 COMPANIES
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>VAT</th>
                    <th>COUNTRY</th>
                    <th>TYPE</th>
                </tr>
            </thead>
            <tbody>
                <?php

    foreach($reqComp as $key){
        $country = $key['country'];
        $vat = $key['VAT'];
        $company = $key['name']; 
        $type = $key['type_companies'];
        $value = 'companies';
        $url = $key['com_id'];
echo <<<HTML
<tr><td><a href="?id=$url&value=$value">$company</a></td>
<td>$vat</td>
<td>$country</td>
<td>$type</td>
HTML;
}
?>
            </tbody>
        </table>
    </div>
</div>