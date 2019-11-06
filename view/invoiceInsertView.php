<h3>CREATE INVOICES<h3>
    <?php
    $regEx = array(
    "number_invoice" => "#^F{1}[0-9]{8}-{1}[0-9]{3}$#",
    "date" => "#^[0-9]{4}-{1}[0-9]{2}-{1}[0-9]{2}$#",
    "contact_name" => "#^[0-9]{1,4}$#",
    "companie_name" => "#^[0-9a-zA-Z]{1,20}$#",
    "option_create" => "#^[a-z]{1,20}#"
);


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
                <select name="companie_name" value="" onChange="submit();">
                        <option value="<?=$_GET['companie_name'] ?? ""?>">Please choose company</option>
                        <?php foreach($companies as $key => $value)
				{
                     $id_companie =  $value["id"];
						$name_companies = $value['name'];
						echo <<<EOF
						<option value="$id_companie">$name_companies</option>
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
                        $id_contact =  $value["cont_id"];
                        $name_contact = $value['first_name']." ". $value['last_name'];
                        echo <<<EOF
                        <option value="$id_contact">$name_contact</option>
                        EOF; 
                }
            } 
        ?>
        </p>
            <input type="submit" value="send" name="send">
        </form>
