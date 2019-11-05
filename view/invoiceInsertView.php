<h3>CREATE INVOICES<h3>
    <?php
	$companies = $req_companie -> fetchAll(PDO::FETCH_ASSOC);
	?>
    <form action="" method="get">

            <input type='text' name="option_create" value='invoice'>
            <p>
                <label for="number_invoice">Number Invoice</label>
                <input type="text" name="number_invoice">
            </p>

            <p>
                <label for="date">Date</label>
                <input type="text" name="date">
            </p>

            <p>
                
                <label for="companie_name">Commany name</label>
                <select name="companie_name" onChange="submit();">
                        <option value="">Please choose company</option>
                        <?php foreach($companies as $key => $value)
				{
						$name_companies = $value['name'];
						echo <<<EOF
						<option value="$name_companies">$name_companies</option>
						EOF; 
				} 
			?>

                 </select>
            </p>

            <p>
                <label for="contact_name">Contact Name</label>
                <select name="contact_name">
                <option value="">Please choose a contact</option>
        <?php
        if(isset($_GET["companie_name"])){
        $contacts = $req_contact -> fetchAll(PDO::FETCH_ASSOC);
                            foreach($contacts as $key => $value)
                {
                        $name_contact = $value['first_name']." ". $value['lastname'];
                        echo <<<EOF
                        <option value="$name_contact">$name_contact</option>
                        EOF; 
                }
                } 
        ?>
        </p>
            <input type="submit" value="Send">
        </form>
