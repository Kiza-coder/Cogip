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
<div class="card shadow mt-5">
<div class="card-header h1 text-center">$firstname $lastname</div>
<div class="card-body text-center mt-4">
<div class="card ml-auto mr-auto shadow-sm">
<div class="row mb-3 mt-3">
<div class="h4 ml-auto">Contact : </div><div class="h5 mr-auto mt-1 ml-2">$firstname $lastname</div>
</div>
<div class="row mb-3">
<div class="h4 ml-auto">Company : </div><div class="h5 mr-auto mt-1 ml-2">$name</div>
</div>
<div class="row mb-3">
<div class="h4 ml-auto">Email : </div><div class="h5 mr-auto mt-1 ml-2">$email</div>
</div>
<div class="row mb-3">
<div class="h4 ml-auto">Phone : </div><div class="h5 mr-auto mt-1 ml-2">$phone</div>
</div>
</div>
</div>
<div class="card-body">
<div class="card shadow-sm">
<table class="table">
<div class="text-center h4 card-header">Contact for invoices :</div>
<thead>
<tr class="text-center">
<th>Nº invoice</th>
<th>Date</th>
</tr>
</thead>
<tbody>
EOF;
        $contactInvoices = $request -> fetchAll(PDO::FETCH_ASSOC);
        foreach($contactInvoices as $key){
            $url = $key['inv_id'];
            $number = $key['number'];
            $date = $key['date'];
            $value = 'invoices';
echo <<<EOF
<tr class="text-center"><td><a href="?id=$url&value=$value">$number</a></td><td>$date</td></tr>
EOF;
        }
echo '</tbody></table></div></div></div>';

}
?>