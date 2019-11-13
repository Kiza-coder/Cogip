<?php
if(isset($_POST['send'])){
	$users = $req -> fetch(PDO::FETCH_ASSOC);
	if(!empty($users))
	{	
        echo 'ok';
        echo $_POST['password'];
        echo $users['password'];
		if(checkLogin($users["password"]))
		{

			$_SESSION['rights'] = $users['rights'];
            var_dump($_SESSION['rights']);
			header('Location: ./?value=home');
		}
	}
    else{
        echo "no query";
    }
}
?>
<div class="card mt-5 shadow">
    <div class="card-header h3 text-center">LOGIN</div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group col-4 d-flex flex-column offset-4">
                <label class="h4" for="login">Your login :</label>
                <input class="h5" type="text" name="login">
            </div>

            <div class="form-group col-4 d-flex flex-column offset-4">
                <label class="h4" for="password">Password :</label>
                <input class="h5" type="password" name="password">
            </div>
            <div class="row">
                <button class="btn btn-primary text-center ml-auto mr-auto mt-3 mb-2" type="submit" name="send"
                    value="send">Login</button>
            </div>
        </form>
    </div>
</div>
</div>