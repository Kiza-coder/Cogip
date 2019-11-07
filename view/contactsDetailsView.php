<?php

    $contactDetails = $req -> fetch(PDO::FETCH_ASSOC);
    $url = $contactDetails['cont_id'];
    $firstname = $contactDetails['first_name'];
    $lastname = $contactDetails['last_name'];
    $name = $contactDetails['name'];
    $email = $contactDetails['email'];
    $phone = $contactDetails['phone'];
    $number = $contactDetails['number'];
    $date = $contactDetails['date'];
    $value = 'contacts';
?>

<h1>Contact : <?= $firstname . " " . $lastname ?></h1>

<?php 

if(isset($_GET['option_edit'])){
echo <<<EOF
<form action="?id=$url&value=$value" method="post">
<h4>Nom: <input type="text" name="lastname" value="$lastname"></h4>
<p></p>
<h4>Prénom : <input type="text" name="firstname" value="$firstname"></h4>
<p></p>
<h4>Société : <input type="text" name="company" value="$name"></h4>
<p></p>
<h4>Email : <input type="text" name="email" value="$email"></h4>
<p></p>
<h4>Phone : <input type="text" name="phone" value="$phone"></h4>    
<p></p>
<button type="submit" name="edit" value="edit">Submit</button>
</form>
EOF;
} else {
echo <<<EOF
<a href="?id=$url&value=$value&option_edit=1">Edit</a>
<h4>Contact : $firstname $lastname</h4>
<p></p>
<h4>Société : $name</h4>
<p></p>
<h4>Email : $email</h4>
<p></p>
<h4>Phone : $phone</h4>
<p></p>
EOF;
}
?>


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