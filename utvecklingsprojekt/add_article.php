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
			<a href="articles.php" class="btn btn-default">Tillbaka</a><hr>
			<?php

			include('config.php');

/*$query = <<<END
SELECT * FROM article
END;
$result = $mysqli->query($query);
if($result->num_rows > 0);
{
	while($row = $result->fetch_object())
{
		$body = '{"Article":{"Description":"'.$row->Description.'","StockPlace":"'.$row->StockPlace.'"}}';
        echo apiCall('POST', 'articles', $body);
    }
}*/
			if(isset($_POST['Description'])&&isset($_SESSION['userId']))
{

		$body = '{"Article":{"Description":"'.$_POST['Description'].'","StockPlace":"'.$_POST['StockPlace'].'"}}';
        apiCall('POST', 'articles', $body);
        echo '<span style="color:Green">Artikel har lagts till</span>';
    }

{

	$query = <<<END
	INSERT INTO article(Description,StockPlace,SupplierName)
	VALUES('{$_POST['Description']}','{$_POST['StockPlace']}','{$_POST['SupplierName']}')
END;

}
$mysqli->query($query);



$content = '
<form method="post" action="add_article.php">
<input 
type="text"
        name="Description" required
        placeholder="Benämning"
        pattern="([A-Za-z0-9]+){1,32}"
        title="Benämning krävs, endast vanliga bokstäver och siffror, och beskrivningen får inte bestå av mer än 32 tecken. Inga ÅÄÖ.">
       

<input
  type="text"
        name="StockPlace" required
        placeholder="Lagerplats"
        pattern="([A-Za-z0-9]+){1,32}"
        title="Lagerplats krävs, får endast bestå av vanliga bokstäver och siffror och får inte ha mer än 32 tecken. Inga ÅÄÖ.">
<input 
type="text"
        name="SupplierName" required
        placeholder="Leverantör"
        pattern="[A-Za-z]{1,32}"
        title="Leverantör krävs, endast vanliga bokstäver och beskrivningen får inte bestå av mer än 32 bokstäver. Inga ÅÄÖ.">
       

        
<input type="submit" Value="Lägg till artikel">
</form>';

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
		//include('footer.php');
		?>
	</footer>

</html>