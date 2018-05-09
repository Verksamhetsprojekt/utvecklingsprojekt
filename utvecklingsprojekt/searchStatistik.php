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
			<h2>Sökresultat</h2><br>
      <h4><i>Antal artiklar i lager</i></h4>
      <a href="statistik.php" class="btn btn-primary">Försäljning över tid</a>
		<a href="statistik2.php" class="btn btn-primary">Försäljning och totala leveranser per leverantör</a>
		<a href="statistik3.php" class="btn btn-primary">Antal artiklar i lager</a><br><br>
		<a href="statistik3.php" class="btn btn-default">Tillbaka</a><hr>
    <div style="display: inline-block; text-align: left;">
      


		


		<?php
          
          if(isset($_SESSION['userId'])||(isset($_SESSION['levId'])))	{	

if(!isset($_GET['Search'])) {
		header("Location:statistik3.php");
	}



$query= <<<END
SELECT * FROM article WHERE Description LIKE '%{$_GET['Search']}%' OR ArticleNumber LIKE '%{$_GET['Search']}%'
END;

$res = $mysqli->query($query) or die($mysqli->error);
if($res->num_rows > 0) {
	while($row = $res->fetch_object()) {
		$content .= <<<END
		Artikelnummer: {$row->ArticleNumber}<br>
		Beskrivning: {$row->Description}<br>
		Antal i lager: {$row->QuantityInStock}
		<hr>
END;
	}
}


}else {
	
header("refresh:0;url=login.php");

 echo '<script type="text/javascript">alert("Du har inte behörighet, vänligen logga in");</script>';

exit;
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
</body>
<footer class="footer container-fluid text-center bg-light">
		<?php
		include('footer.php');
		?>
	</footer>

</html>