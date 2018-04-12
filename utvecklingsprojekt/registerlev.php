<?php
include('template.php');
if(isset($_POST['levname']))
{
	$query = <<<END
	INSERT INTO userslev(levname,password,email,name)
	VALUES('{$_POST['levname']}','{$_POST['password']}', '{$_POST['email']}',            
	'{$_POST['name']}')
END;
$mysqli->query($query);
header('Location:index.php');
}
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