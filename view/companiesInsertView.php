<h3>CREATE COMPANY</h3>
<?php

$createcompany = $req_type_company -> fetchAll(PDO::FETCH_ASSOC);
require "assets/includes/sanitize.php";

// var_dump($createcompany);

?>
<form action="" method="post">
    <input type='hidden' name="option_create" value='company'>
    <p>
        <label for="name_comp">Company Name</label>
        <input type="text" name="name_comp">
    </p>
    <p>
        <label for="tva_comp">TVA Number</label>
        <input type="text" name="tva_comp">
    </p>
    <p>
        <label for="phone_comp">Phone</label>
        <input type="text" name="phone_comp">
    </p>
    <p>
        <label for="type_comp">Company type</label>
        <select type="text" name="type_comp">
            <?php
                foreach ($createcompany as $key => $value){
                    $type_companies = $value['type_companies'];
                    echo '<option value="'.$value['id'].'">'. $type_companies.'</option>';
                }
            ?>
        </select>
    </p>
    <input type="submit" name="send" value="send">
</form>