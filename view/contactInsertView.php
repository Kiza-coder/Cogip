<?php
    $req_companies = $req -> fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Ajouter nouveau contact :</h1>

<form action="" method="post">
    <input type='text' name="option_create" value='contact'>
    <p>
        <label for="lastname">Nom</label>
        <input type="text" name="lastname">
    </p>

    <p>
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname">
    </p>

    <p>
        <label for="phone">Phone</label>
        <input type="text" name="phone">
    </p>

    <p>
        <label for="email">Email</label>
        <input type="text" name="email">
    </p>

    <p>
        <label for="company">Société</label>
        <select name="company">
            <option value="">Please choose company</option>
            <?php 
                foreach($req_companies as $key => $value){
                    $company_name = $value['name'];
                    echo '<option value="'.$value['id'].'" name="company_id">' .$company_name.'</option>';
                }
            ?>

        </select>
    </p>
    <p>
        <input type="submit" value="send" name="send">
    </p>

</form>