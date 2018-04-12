<?php
include('template.php');
if(isset($_POST['username'])&&isset($_SESSION['userId']))
{
	$query = <<<END
	INSERT INTO users(username,password,email,fname,lname)
	VALUES('{$_POST['username']}','{$_POST['password']}', '{$_POST['email']}',            
	'{$_POST['fname']}', '{$_POST['lname']}')

END;
$mysqli->query($query);
echo '<span style="color:Green">En ny användare har lagts till</span>';
}

$content = <<<END
<form method="post" action="register.php">
<input type="text" name="username" placeholder="Användarnamn">
<input type="password" name="password" placeholder="Lösenord">
<input type="text" name="email" placeholder="E-post">
<input type="text" name="fname" placeholder="Förnamn">
<input type="text" name="lname" placeholder="Efternamn">
<input type="submit" Value="Registrera">
</form>
END;

<<<<<<< HEAD
=======


>>>>>>> e6a6c17516d3172acebd15d83adfc25547d2b561
echo $navigation;
echo $content;
echo $footer;
?>