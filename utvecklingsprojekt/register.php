<?php
include('template.php');
if(isset($_POST['username']))
{
	$query = <<<END
	INSERT INTO users(username,password,email,fname,lname)
	VALUES('{$_POST['username']}','{$_POST['password']}', '{$_POST['email']}',            
	'{$_POST['fname']}', '{$_POST['lname']}')
END;
$mysqli->query($query);
header('Location:index.php');
}
$content = <<<END
<form method="post" action="register.php">
<input type="text" name="username" placeholder="Användarnamn">
<input type="password" name="password" placeholder="Lösenord">
<input type="text" name="email" placeholder="E-post">
<input type="text" name="fname" placeholder="Förnamn">
<input type="text" name="lname" placeholder="Efternamn">
<input type="submit" Value="Registrera dig">
</form>
END;
echo $navigation;
echo $content;
?>