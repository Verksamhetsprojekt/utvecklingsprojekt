<!doctype html>
<html>
	<?php
	include('head.php');
	include('connection.php');
	include('navigation.php');
	echo $navigation;

	?>

	<body>
	<div class="container text-center">
      <h2>Sökresultat</h2><br>
		<a href="articles.php" class="btn btn-default">Tillbaka</a><hr>
		
		<?php

		if(!isset($_SESSION['userId'])) { //(!isset) betyder att det INTE är set
header("refresh:0;url=login.php");
 echo '<script type="text/javascript">alert("Du har inte behörighet, vänligen logga in");</script>';

exit;
}

if(!isset($_GET['Search'])) {
		header("Location:gods.php");
	}

$query= <<<END
SELECT * FROM orders WHERE CustomerName LIKE '%{$_GET['Search']}%' OR DocumentNumber LIKE '%{$_GET['Search']}%'
END;

$res = $mysqli->query($query) or die($mysqli->error);
if($res->num_rows > 0) {
	while($row = $res->fetch_object()) {
		$content .= <<<END
		Kundnamn: {$row->ArticleNumber}<br>
		Fakturanummer: {$row->DocumentNumber}<br>
		Beställningsdatum: {$row->Description}<br>
		Leveransdatum: {$row->Description}<br>
		Beställningsdatum: {$row->Description}<br>
		Pris: {$row->SalesPrice}<br>
		<hr>
END;
	}
}



?>
<?php 

/* 
	if(mysql_num_rows($search_query) !=0) {
		do { ?>
			<p><?php echo $search_rs; ?></p>
<?php		} while ($search_rs=mysql_fetch_assoc($search_query));
	}else{
		echo "Inga resultat";
	}*/
?>

	<?php


    		
			echo $content;
			?>
</div>
</body>
<footer class="footer container-fluid text-center bg-light">
		<?php
		include('footer.php');
		?>
	</footer>

</html>