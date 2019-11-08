<h3>User Details</h3>
<?php
$users = $req -> fetch(PDO::FETCH_ASSOC); 
$username = $users['username'];	
$rights = $users['rights'];
echo <<<EOF
<button type="submit">Edit</button>
<p>
$username
</p>
<p>
$rights
</p>
EOF;
?>