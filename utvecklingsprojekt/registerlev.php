<?php
include('template.php');
if(isset($_POST['levname'])&&isset($_SESSION['userId']))
{
	$query = <<<END
	INSERT INTO userslev(levname,password,email,name)
	VALUES('{$_POST["levname"]}','{$_POST["password"]}', '{$_POST["email"]}',            
	'{$_POST["name"]}')
END;
$mysqli->query($query);
<<<<<<< HEAD
header('Location:index.php');

=======
echo '<span style="color:Green">En ny användare har lagts till</span>';
}
>>>>>>> f56872792e36a5fba7d9f5de21885ed8e66579a3
$content = <<<END
<form method="post" action="registerlev.php">
<input type="text" name="levname" placeholder="Användarnamn">
<input type="password" name="password" placeholder="Lösenord">
<input type="text" name="email" placeholder="E-post">
<input type="text" name="name" placeholder="Namn">
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