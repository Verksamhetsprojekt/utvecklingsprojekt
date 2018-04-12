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
<<<<<<< HEAD
header('Location:index.php');

=======
echo '<span style="color:Green">En ny användare har lagts till</span>';
}
>>>>>>> f56872792e36a5fba7d9f5de21885ed8e66579a3
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
}
else
	{  
		echo '<span style="color:Red">Du har inte behörighet. Vänligen logga in.</span>'; 
	}
echo $navigation;
echo $content;
echo $footer;
?>