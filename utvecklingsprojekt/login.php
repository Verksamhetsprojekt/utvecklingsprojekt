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
			// databasen har en tabell "users" med värdena "id", "username", och "password"
if(isset($_POST['username']))
{
	$query = <<<END
	SELECT username, password, id FROM users
	WHERE username = '{$_POST['username']}'
	AND password = '{$_POST['password']}'
END;
$res = $mysqli->query($query);
	if($res->num_rows > 0)
	{
		$row = $res->fetch_object();
		$_SESSION["username"] = $row->username;
		$_SESSION["userId"] = $row->id;
		header("Location:index.php");
	} 
	else
	{
		echo '<span style="color:Red">Fel användarnamn eller lösenord.</span>';
	}
}
$content = <<<END
<form action="login.php" method="post">
<input type="text" name="username" placeholder="username">
<input type="password" name="password" placeholder="password">
<input type="submit" value="Logga in">
</form>
END;
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