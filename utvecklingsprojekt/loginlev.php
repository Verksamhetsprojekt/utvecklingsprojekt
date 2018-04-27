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
			// databasen har en tabell "users" med värdena "id", "username", och "password"
if(isset($_POST['levname']))
{
	$query = <<<END
	SELECT levname, password, id FROM userslev
	WHERE levname = '{$_POST['levname']}'
	AND password = '{$_POST['password']}'
END;
$res = $mysqli->query($query);
	if($res->num_rows > 0)
	{
		$row = $res->fetch_object();
		$_SESSION["levname"] = $row->levname;
		$_SESSION["levId"] = $row->id;
		header("Location:index.php");
	} 
	else
	{
		echo '<span style="color:Red">Fel användarnamn eller lösenord.</span>';
	}
}
$content = <<<END
<form action="loginlev.php" method="post">
<input type="text" name="levname" placeholder="username">
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