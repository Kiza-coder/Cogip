<?php

if(isset($_POST['send'])){
	$users = $req -> fetch(PDO::FETCH_ASSOC);
	if(!empty($users))
	{	
		if(checkLogin($users["password"]))
		{
			$_SESSION['rights']= $users['rights'];
			header('Location: ./');
		}
	}
}

?>

<form action="" method="POST">
    <p>
        <label for="login">Your login : </label>
        <input type="text" name="login">
    </p>

    <p>
        <label for="password">Your password : </label>
        <input type="text" name="password">
   </p>

 <input type="submit" value="send" name="send">
</form>
