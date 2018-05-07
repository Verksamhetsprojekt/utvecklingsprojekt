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
      <h2>Statistik</h2><br>
      <h4><i>Antal artiklar i lager</i></h4>


		<a href="statistik.php" class="btn btn-primary">Försäljning över tid</a>
		<a href="statistik2.php" class="btn btn-primary">Försäljning per leverantör</a>
		<a href="statistik3.php" class="btn btn-primary">Antal artiklar i lager</a><hr>


		<?php
           /* $content = <<<END
            <p>Sökresultat</p><br>
END;
          if($mysqli){
				$query = <<<END
				SELECT ArticleNumber, Description, QuantityInStock FROM article
				WHERE ArticleNumber LIKE '%".$_POST['Search']."%' OR Description LIKE '%".$_POST['Search']."%'"
END;

				$res = $mysqli->query($query);
				if($res->num_rows > 0)
				{
				      $content .= <<<END
				  <table class="table">
				  <tr>
				      <th>Artikelnummer</th>
				      <th>Artikelnamn</th>
				      <th>Antal i lager</th>
				  </tr>
END;
					  while($row = $res->fetch_object())
					  {

					      $content .= <<<END
					  <tr>
					      <td>{$row->ArticleNumber}</td>
					      <td>{$row->Description}</td>
					      <td>{$row->QuantityInStock}</td>
					      </tr>
					     
END;
}
}
}
    $content .= '</table>';*/

if(!isset($_GET['Search'])) {
		header("Location:statistik3.php");
	}



$query= <<<END
SELECT * FROM article WHERE Description LIKE '%{$_GET['Search']}%'
END;

$res = $mysqli->query($query) or die($mysqli->error);
if($res->num_rows > 0) {
	while($row = $res->fetch_object()) {
		$content .= <<<END
		{$row->ArticleNumber}<br>
		{$row->Description}<br>
		{$row->QuantityInStock}
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