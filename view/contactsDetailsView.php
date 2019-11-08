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

if(isset($_GET['option_edit'])){
    $req_companies = $reqCompany -> fetchAll(PDO::FETCH_ASSOC);
    
echo <<<HTML

<div class="card shadow mt-5 mb-5">
<div class="card-header h1 text-center">$firstname $lastname</div>
<div class="card-body mt-4">
<form action="?id=$url&value=$value" method="post">
<div class="card ml-auto mr-auto shadow-sm">

<div class="row mb-2 mt-4 d-flex justify-content-around">
<div class="form-group col-4 d-flex flex-column ml-5">
<label class="h4" for="lastname">Lastname :</label>
<input class ="h5" type="text" name="lastname" value="$lastname">
</div>
<div class="form-group col-4 d-flex flex-column mr-5">
<label class="h4" for="firstname">Firstname :</label>
<input class ="h5" type="text" name="firstname" value="$firstname">
</div>
</div>

<div class="row mb-2 mt-1 d-flex justify-content-around">
<div class="form-group col-4 d-flex flex-column ml-5">
<label class="h4" for="email">Email :</label>
<input class ="h5" type="text" name="email" value="$email">
</div>
<div class="form-group col-4 d-flex flex-column mr-5">
<label class="h4" for="phone">Phone :</label>
<input class ="h5" type="text" name="phone" value="$phone">
</div>
</div>

<div class="row mb-2 mt-1">
<div class="form-group col-4 d-flex flex-column offset-4">
<label class="h4" for="company">Company :</label>
<select class ="h5" type="text" name="company" value="$name">
HTML;

                foreach($req_companies as $key => $value){
                    $company_name = $value['name'];
                    echo '<option value="'.$value['id'].'" name="company_id">' .$company_name.'</option>';
                }
echo <<<HTML
</select>
</div>
</div>


<button class="btn btn-primary ml-auto mr-auto mb-3" type="submit" name="edit" value="edit">Button</button>
</form>
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

HTML;

$contactInvoices = $request -> fetchAll(PDO::FETCH_ASSOC);
foreach($contactInvoices as $key){
    $url = $key['inv_id'];
    $number = $key['number'];
    $date = $key['date'];
    $value = 'invoices';
echo <<<HTML
<tr class="text-center"><td><a href="?id=$url&value=$value">$number</a></td><td>$date</td></tr>
HTML;
}
echo '</tbody></table></div></div></div>';


} else {



echo <<<HTML
<div class="card shadow mt-5 mb-5">
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
HTML;
if($_SESSION['rights'] == 1) {
echo <<<HTML
<a href="?id=$url&value=$value&option_edit=1" class="btn btn-primary btn-lg active pt-1 pb-1 mt-2 ml-auto mr-auto mb-3" role="button" aria-pressed="true">Edit</a>
HTML;
}
echo <<<HTML
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
HTML;
        $contactInvoices = $request -> fetchAll(PDO::FETCH_ASSOC);
        foreach($contactInvoices as $key){
            $url = $key['inv_id'];
            $number = $key['number'];
            $date = $key['date'];
            $value = 'invoices';
echo <<<HTML
<tr class="text-center"><td><a href="?id=$url&value=$value">$number</a></td><td>$date</td></tr>
HTML;
        }
echo '</tbody></table></div></div></div>';

}
?>