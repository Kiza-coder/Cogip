<h3>CREATE INVOICES<h3>
        <?php
    require "assets/includes/sanitize.php";


	$companies = $req_companie -> fetchAll(PDO::FETCH_ASSOC);
    

	?>
        <form action="" method="post">

            <input type='hidden' name="option_create" value='invoice'>
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
                <select name="companie_name" value="<?= $_POST['companie_name'] ?? ""?>" onChange="submit();">
                    <option value="">Please choose company</option>
                    <?php foreach($companies as $key => $value)
				{
                     $id_companie =  $value["id"];
						$name_companies = $value['name'];
						echo '<option value="'.$id_companie.'">'.$name_companies.'</option>';
						
						 
				} 
			?>

                </select>
            </p>

            <p>
                <label for="contact_name">Contact Name</label>
                <select name="contact_name">
                    <option value="">Please choose a contact</option>
                    <?php
        if(isset($_POST["companie_name"])){
        $contacts = $req_contact -> fetchAll(PDO::FETCH_ASSOC);
                            foreach($contacts as $key => $value)
                {
                        $id_contact =  $value["cont_id"];
                        $name_contact = $value['first_name']." ". $value['last_name'];
                        echo '<option value="'.$id_contact.'">'.$name_contact.'</option>';
                         
                }
            } 
        ?>
            </p>
            <input type="submit" value="send" name="send">
        </form>