<h3>CREATE INVOICES<h3>
	<?php
	$invoices = $req_companie -> fetchAll(PDO::FETCH_ASSOC);
	var_dump($invoices);
	?>
 		
	<form action="" method="POST">
		<p>
		<label for="number_invoice">Number Invoice</label>
		<input type="text" name="number_invoice">
	</p>
	<p>
		<label for="date">Date</label>
		<input type="text" name="date">
	</p>
	<p>
		<form action="" method="POST">
		<label for ="company_name">Commany name</label>
		<select name ="company_name">
			<option value="">Please choose company</option>
			<?php foreach($invoices as $key => $value)
				{
						$name_companie = $value['name'];
						echo <<<EOF
						<option value="$name_companie">$name_companie</option>
						EOF; 
				} 
			
				
			?>

		</select>
		</form>
	</p>
	<p>
		<label for="contact_name">Contact Name</label>
		<input type="text" name="contact_name">
	</p>
		<input type="submit" value="Send">
	</form>
