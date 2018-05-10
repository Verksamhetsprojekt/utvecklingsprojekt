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
		<a href="fakturor.php" class="btn btn-default">Tillbaka</a><hr>
		
		<?php
if(isset($_SESSION['userId'])||(isset($_SESSION['levId'])))	{

if(!isset($_GET['Search'])) {
		header("Location:fakturor.php");
	}

$query= <<<END
SELECT * FROM supplierinvoices WHERE SupplierName LIKE '%{$_GET['Search']}%' OR GivenNumber LIKE '%{$_GET['Search']}%'
END;

$res = $mysqli->query($query) or die($mysqli->error);
if($res->num_rows > 0) {
	while($row = $res->fetch_object()) {
		$content .= <<<END
		Leverantörsnamn: {$row->SupplierName}<br>
		Fakturanummer: {$row->GivenNumber}<br>
		Totalsumma: {$row->Total}<br>
		Beställningsdatum: {$row->InvoiceDate}<br>
		Leveransdatum: {$row->DueDate}<br>
		Betaldatum <small><i>(0000-00-00 = OBETALD)</i></small>:  {$row->PaidInFull}<br>
		<a href="fakturaspec.php?GivenNumber={$row->GivenNumber}">Läs mer</a>
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