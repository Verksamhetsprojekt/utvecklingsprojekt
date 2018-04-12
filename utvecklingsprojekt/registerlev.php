<?php
include('template.php');
if(isset($_POST['username']))
{
	$query = <<<END
	INSERT INTO userslev(username,password,email,name)
	VALUES('{$_POST['username']}','{$_POST['password']}', '{$_POST['email']}',            
	'{$_POST['name']}')
END;
$mysqli->query($query);
header('Location:index.php');
}
$content = <<<END
<form method="post" action="register.php">
<input type="text" name="username" placeholder="Användarnamn">
<input type="password" name="password" placeholder="Lösenord">
<input type="text" name="email" placeholder="E-post">
<input type="text" name="name" placeholder="Namn">>
<input type="submit" Value="Registrera">
</form>
END;
echo $navigation;
echo $content;
echo $footer;
?>