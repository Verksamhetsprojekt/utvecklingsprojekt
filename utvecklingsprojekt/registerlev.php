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
echo '<span style="color:Green">En ny användare har lagts till</span>';
<<<<<<< HEAD
}
=======
>>>>>>> e6a6c17516d3172acebd15d83adfc25547d2b561

$content = <<<END
<form method="post" action="registerlev.php">
<input type="text" name="levname" placeholder="Användarnamn">
<input type="password" name="password" placeholder="Lösenord">
<input type="text" name="email" placeholder="E-post">
<input type="text" name="name" placeholder="Namn">
<input type="submit" Value="Registrera">
</form>
END;


echo $navigation;
echo $content;
echo $footer;
?>