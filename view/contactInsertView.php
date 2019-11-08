<?php
    $req_companies = $req -> fetchAll(PDO::FETCH_ASSOC);
    $value = 'contacts';
?>

<div class="card shadow mt-5 mb-5">
    <div class="card-header h1 text-center">New contact</div>
    <div class="card-body mt-4">
        <form action="" method="post">
            <div class="card ml-auto mr-auto shadow-sm">
                <div class="row mb-2 mt-3">
                    <div class="form-group col-8 offset-4">
                        <label class="h4" for="lastname">Lastname :</label>
                        <input class="h5" type="text" name="lastname">
                    </div>
                </div>
                <div class="row mb-2 mt-1">
                    <div class="form-group col-8 offset-4">
                        <label class="h4" for="firstname">Firstname :</label>
                        <input class="h5" type="text" name="firstname">
                    </div>
                </div>
                <div class="row mb-2 mt-1">
                    <div class="form-group col-8 offset-4">
                        <label class="h4" for="company">Company :</label>
                        <select class="h5" type="text" name="company" value="$name">
                            <option value="">Please choose company</option>
                            <?php 
                                foreach($req_companies as $key => $value){
                                    $company_name = $value['name'];
                                    echo '<option value="'.$value['id'].'" name="company_id">' .$company_name.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-2 mt-1">
                    <div class="form-group col-6 offset-4">
                        <label class="h4" for="email">Email :</label>
                        <input class="h5" type="text" name="email">
                    </div>
                </div>
                <div class="row mb-2 mt-1">
                    <div class="form-group col-8 offset-4">
                        <label class="h4" for="phone">Phone :</label>
                        <input class="h5" type="text" name="phone">
                    </div>
                </div>
            </div>
            <div class="row">
                <button class="btn btn-primary text-center ml-auto mr-auto mt-3 mb-2" type="submit" name="send"
                    value="send">Submit</button>
            </div>
        </form>
    </div>