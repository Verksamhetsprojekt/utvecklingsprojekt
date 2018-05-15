<!doctype html>
<html>
	<?php
	include('head.php');
	include('connection.php');
	include('navigation.php');
	echo $navigation;

	?>

	<body>
	<div class="container">
		<div style="text-align: center;">
    <div style="display: inline-block; text-align: left;">
      <h2>Sökresultat</h2><br>
		<a href="gods.php" class="btn btn-default">Tillbaka</a><hr>
		
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
		Kundnamn: {$row->CustomerName}<br>
		Fakturanummer: {$row->DocumentNumber}<br>
		Beställningsdatum: {$row->OrderDate}<br>
		Leveransdatum: {$row->DeliveryDate}<br>
		Totalt: {$row->Total}<br>
        Utleveransarea: {$row->utlevarea}<br>
        Hämtad: {$row->hamtad}<br>
        <a href="edit_gods.php?DocumentNumber={$row->DocumentNumber}">Redigera order</a>
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
</div>
</div>
<br>
</body>
<footer class="footer container-fluid text-center bg-light">
		<?php
		include('footer.php');
		?>
	</footer>

</html>