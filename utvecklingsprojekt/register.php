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

if(!isset($_SESSION['userId'])) { //(!isset) betyder att det INTE är set
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