<h1>INVOICES </h1>
<?php
$invoices = $req -> fetch();
$url = $invoices['in_id'];
$url_contact = $invoices['cont_id'];
$url_company = $invoices['c_id'];
$numInvoice =  $invoices['number'];    
$name = $invoices['name'];
$date = $invoices['date'];    
$VTA = $invoices['VAT'];    
$type = $invoices['type_companies'];    
$first_name = $invoices['first_name'];    
$last_name = $invoices['last_name'];    
$email = $invoices['email'];    
$phone = $invoices['phone'];
$value_company = "companies";
$value_contact = "contacts";   



if(isset($_GET['option_edit']))
{
	$companies = $req_companie -> fetchAll(PDO::FETCH_ASSOC);
	
echo <<<HTML
<div class="card-shadow mt-5 mb-5">
<div class ="card-header h1 text-center"> INVOICE : F-$numInvoice</div>
</div>
<form action="?id=$url&value=invoices&option_edit=1" method="post">
<div class="card ml-auto mr-auto shadow-sm">
<div class="row mb-2 mt-3">
<div class="form-group d-flex flex-column col-4 offset-4">
<label class="h4" for="number_invoice">Number invoice :</label>
<input class ="h5" type="text" name="number_invoice" value="$numInvoice">
</div>
</div>
<div class="row mb-2 mt-1">
<div class="form-group d-flex flex-column col-4 offset-4">
<label class="h4" for="date">Date:</label>
<input class ="h5" type="text" name="date" value="$date">
</div>
</div>
<div class="row mb-2 mt-1">
<div class="form-group d-flex flex-column col-4 offset-4">
<label class="h4" for="companie_name">Date:</label>
<select name="companie_name" value="" onChange="submit();">
HTML;
?>
<option value="<?=$_POST['companie_name'] ?? ""?>">Please choose company</option>
<?php
foreach($companies as $key => $value)
{
    $id_companie =  $value["id"];
	$name_companies = $value['name'];
	echo '<option value="'.$id_companie.'">'.$name_companies.'</option>';					 
}
echo <<<HTML
</select>
</div>
</div>
<div class="row mb-2 mt-1">
<div class="form-group d-flex flex-column col-4 offset-4">
<label class="h4" for="contact_name">Contact</label>
<select name="contact_name" value="">
<option value="">Please choose a contact</option>
HTML;
if(isset($_POST["companie_name"])){
        $contacts = $req_contact -> fetchAll(PDO::FETCH_ASSOC);
                foreach($contacts as $key => $value)
                {
                $id_contact =  $value["cont_id"];
                $name_contact = $value['first_name']." ". $value['last_name'];
                echo '<option value="'.$id_contact.'">'.$name_contact.'</option>';         
                }
}
echo <<<HTML
</select>
</div>
</div>
<div class="row mb-2 mt-1">
<div class="form-group d-flex flex-column col-4 offset-4">
<button type="submit" value="send" name="edit">Send</button>
</div>
</div>
</form>
HTML;  
?>

<?php
}
else
{
echo <<<HTML
<div class="card shadow mt-5 mb-5">
<div class="card-header h1 text-center">INVOICE : F-$numInvoice </div>
<div class="card-body mt-3">

<div class="row d-flex align-items-center mr-auto ml-4">
<div>F-$numInvoice</div>
</div>

<div class="row mr-auto ml-4 ">
$date
</div>
<div class='row ml-4'>
<a href="?id=$url&value=invoices&option_edit=1" class="mr-auto btn btn-primary btn-sm active pt-1 pb-1 mt-2  mb-3" role="button" aria-pressed="true">Edit</a>
</div>




<div class="row d-flex justify-content-around">
<div class="card col-5 p-0">
<div class="card-header pl">
<p>Company linked to the invoice:</p>
</div>

<table class="table">
<thead>
	<tr class="text-center">
		<th>Name</th>
		<th>Tva</th>
		<th>Company Type</th>
	</tr>
	</thead>
	<tbody>
	<tr class='text-center'>
		<td><a href=?id=$url_company&value=$value_company>$name</a></td>
		<td>$VTA</td>
		<td>$type</td>
	</tr>
	</tbody>
</table>
</div>



<div class="card col-5 p-0">
<div class="card-header pl-3">
<p>Contact person</p>
</div>
<table class='table'>
<thead>
	<tr class="text-center">
		<th>Name</th>
		<th>Email</th>
		<th>Phone</th>
	</tr>
	</thead>
	<tbody>
	<tr class="text-center">
		<td><a href=?id=$url_contact&value=$value_contact>$first_name  $last_name</td>
		<td>$email</td>
		<td>$phone</td>
	</tr>
	</tbody>
</table>
</div>
</div>
</div>



</div>
</div>


HTML;
}
?>