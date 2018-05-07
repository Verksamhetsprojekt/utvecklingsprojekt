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
echo'<script type="text/javascript">alert("Har du fyllt i alla uppgifter?");</script>';
echo '<span style="color:Green">En ny användare har lagts till</span>';
}

$content = <<<END
<form method="post" action="registerlev.php">
  <input
  type="text"
        name="levname" required
        placeholder="Användarnamn"
        pattern="[a-z]{1,10}"
        title="Användarnamnet ska endast bestå av små bokstäver och högst 10 tecken sammanlagt exempelvis: john123">
  <input
  type="text"
        name="password" required
        placeholder="Lösenord"
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}"
        title="Lösenordet behöver bestå av minst 5 tecken, varav minst en siffra och både stora och små bokstäver">
  <input
  type="text"
        name="email" required
        placeholder="E-post"
        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
        title="Ogiltigt e-mail format, exempel på email you@example.com">
  <input
  type="text"
        name="name" required
        placeholder="Namn"
        pattern="[A-Za-z]{1,30}"
        title="Namn krävs, endast bokstäver och inga andra tecken. Namnet får inte bestå av mer än 30 bokstäver">
        
<input type="submit" value="Registrera"></input>
</form>



END;

if(!isset($_SESSION['userId'])) {
	
header("refresh:0;url=login.php");

 echo '<script type="text/javascript">alert("Du har inte behörighet, vänligen logga in");</script>';

exit;



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