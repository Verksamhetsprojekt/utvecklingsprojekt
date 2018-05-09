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
			$content = <<<END
<br><form action="login.php" method="post">
<input type="text" name="username" placeholder="username"><br>
<input type="password" name="password" placeholder="password"><br><br>
<input type="submit" value="Logga in">
</form>
END;
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