<!doctype html>
<html>
	<?php
	include('head.php');
	include('connection.php');
	include('navigation.php');
	?>

	<header>
  		<div class="container-fluid text-center">	
			<h1>Välkommen till Hellströms Fordonsteknik AB</h1>
			<h6><i>Din specialistpartner sedan 1967</i></h6><hr>
		</div>
		<?php
		echo $navigation;
		?>
	</header>

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
	header("Location:login.php");
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