<h3>CREATE COMPANY</h3>
<?php

$createcompany = $req_type_company -> fetchAll(PDO::FETCH_ASSOC);

// var_dump($createcompany);

?>
<form action="" method="get">
    <input type='text' name="option_create" value='company'>
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
                    echo '<option value='."$type_companies".'>'."$type_companies".'</option>';
                }
            ?>
    </p>
    <input type="submit" value="Send">
</form>
