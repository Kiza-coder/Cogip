<?php
    $invoices = $req -> fetchAll(PDO::FETCH_ASSOC);
?>
	<div class="card shadow mt-5">
    <div class="card-header text-center h3">
    	INVOICES     
    	</div>	
    	<div class="card-body">
<table class="table">
	<thead>
    <tr class="text-center">
        <th>INVOICE NUMBER</th>
        <th>DATE</th>
        <th>COMPANIES</th>
        <th>TYPE</th>
    </tr>
</thead>
<tbody>
    <?php
  	

foreach($invoices as $key){
$url = $key['inv_id'];
$numInvoice = $key['number'];
$name = $key["name"];
$date = $key['date'];
$type_companies = $key['type_companies'];
$value = "invoices";

echo <<<EOF
<tr class="text-center"><td><a href="?id=$url&value=$value">$numInvoice</a></td>
<td>$date</td>
<td>$name </td>
<td>$type_companies</td>


</tr>
EOF;
}
?>
</tbody>
</table>
</div>