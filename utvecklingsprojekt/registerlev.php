<!doctype html>
<html>
	<?php
	include('head.php');
	include('connection.php');
	include('navigation.php');
	echo $navigation;
	?>

<!-- Här börjar Body - här lägger du in kod som ska visas i $content -->
	<body>
		<div class="container text-center">
			<?php
			if(isset($_POST['levname'])&&isset($_SESSION['userId']))
{
	$query = <<<END
	INSERT INTO userslev(levname,password,email,name)
	VALUES('{$_POST["levname"]}','{$_POST["password"]}', '{$_POST["email"]}',            
	'{$_POST["name"]}')
END;
$mysqli->query($query);
echo '<span style="color:Green">En ny användare har lagts till</span>';
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

if(!isset($_SESSION['userId'])) {
	//sleep(1);
header("refresh:0;url=login.php");

//header('Location: http://localhost/login.php/php-forcing-https-over-http/');
 echo '<script type="text/javascript">alert("Du har inte behörighet, vänligen logga in");</script>';

exit;


//header("refresh: 5; url=login.php");
//echo '<span style="color:Red">Du har inte behörighet, vänligen logga in</span>';


	//header('Refresh:5; url=login.php');
//echo 'Please Log In First';  //Funkar men visar registrera grej

//header("refresh:0;url=login.php"); //funkar men visar jävla registrera grej i 0.5 sek blinkar till (popup med meddelande) tas till login
//echo '<script type="text/javascript">alert("Du har inte behörighet, vänligen logga in");</script>';

	//header("Location:login.php");  (FUNKAR för att endast föras till login)
   //die("Du har inte behörighet. Vänligen logga in");
}
			echo $content;
			?>
		</div>
	</body>
<!-- Här slutar Body-->

	<footer class="footer container-fluid text-center bg-light">
		<?php
		include('footer.php');
		?>
	</footer>

</html>