    <?php
    $contactDetails = $req -> fetch(PDO::FETCH_ASSOC);
    $firstname = $contactDetails['first_name'];
    $lastname = $contactDetails['last_name'];
    $name = $contactDetails['name'];
    $email = $contactDetails['email'];
    $phone = $contactDetails['phone'];
    $number = $contactDetails['number'];
    $date = $contactDetails['date'];
?>

<h1>Contact : <?php echo $firstname . " " . $lastname ?></h1>

<h4>Contact : <?php echo $firstname . " " . $lastname ?></h4>
<p></p>
<h4>Société : <?php echo $name ?></h4>
<p></p>
<h4>Email : <?php echo $email ?></h4>
<p></p>
<h4>Phone : <?php echo $phone ?></h4>
<p></p>

<h2>Contact pour les factures :</h2>

<table>
    <tr>
        <th>Nº facture </th>
        <th>Date</th>
    </tr>
    <?php 
        $contactInvoices = $request -> fetchAll(PDO::FETCH_ASSOC);
        foreach($contactInvoices as $key){
            $url = $key['inv_id'];
            $number = $key['number'];
            $date = $key['date'];
            $value = 'invoices';
echo <<<EOF
<tr><td><a href="?id=$url&value=$value">$number</a></td><td>$date</td></tr>
EOF;
        }
     ?>


</table>