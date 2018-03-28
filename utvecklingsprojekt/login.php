<?php

include('template.php');

// databasen har en tabell "users" med värdena "id", "username", och "password"
if(isset($_POST['username']))
{
	$query = <<<END
	SELECT username, password, id FROM users
	WHERE username = '{$_POST['username']}'
	AND password = '{$_POST['password']}'
END;
$res = $mysqli->query($query);
	if($res->num_rows > 0)
	{
		$row = $res->fetch_object();
		$_SESSION["username"] = $row->username;
		$_SESSION["userId"] = $row->id;
		header("Location:index.php");
	} 
	else
	{
		echo "Fel användarnamn eller lösenord.";
	}
}
$content = <<<END
<form action="login.php" method="post">
<input type="text" name="username" placeholder="username">
<input type="password" name="password" placeholder="password">
<input type="submit" value="Logga in">
</form>
END;

echo $navigation;
echo $content;

?>