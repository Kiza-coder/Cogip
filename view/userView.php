<h3>UserList</h3>
<?php
$users = $req -> fetchALL(PDO::FETCH_ASSOC);
?>
<table>
	<tr>
		<th>Username</th>
		<th>Rights</th>
	</tr>
<?php
foreach ($users as $key => $value)
{
	$id = $value['id_user']; 
	$username = $value['username'];	
	$rights = $value['rights'];
	echo <<<EOF
	<tr><td><a href="./?id=$id&value=user">$username</td><td>$rights</td></tr>
	EOF;
	
}
?>
