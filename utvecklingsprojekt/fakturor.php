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
			include('config.php');




$supplierinvoices = json_decode(apiCall('GET', 'supplierinvoices'), true);

//var_dump($supplierinvoices["SupplierInvoices"]);

//var_dump($supplierinvoices[0]["Balance"]);

if(count($supplierinvoices["SupplierInvoices"]) > 0)
{
	$query = <<<END
	DELETE FROM supplierinvoices
END;
$mysqli->query($query);

//FUNGERAR INTE HÄRIFRÅN, SKA FIXA SEN

foreach($supplierinvoices["SupplierInvoices"] as $supplierinvoices)
{
	$query = <<<END
INSERT INTO supplierinvoices(Balance,Booked,Cancel,Currency,DueDate,GivenNumber,InvoiceDate,InvoiceNumber,SupplierNumber,SupplierName,
		Total,AuthorizerName)
	VALUES('{$supplierinvoices["Balance"]}','{$supplierinvoices["Booked"]}','{$supplierinvoices["Cancel"]}','{$supplierinvoices["Currency"]}','{$supplierinvoices["DueDate"]}','{$supplierinvoices["GivenNumber"]}','{$supplierinvoices["InvoiceDate"]}','{$supplierinvoices["InvoiceNumber"]}','{$supplierinvoices["SupplierNumber"]}','{$supplierinvoices["SupplierName"]}','{$supplierinvoices["Total"]}','{$supplierinvoices["AuthorizerName"]}')

END;
$mysqli->query($query) or die($mysqli->error);
}
}

     $content = ' ';
     $query = <<<END
     SELECT * FROM supplierinvoices
     ORDER BY SupplierName ASC
END;

$res = $mysqli->query($query);
if($res->num_rows > 0)
{
			$content .= <<<END
	<table class="table">
	<tr>
	    <th>Leverantör</th>
	    <th>Förfallodatum</th>
	    <th>Totalt</th>
	</tr>
END;
	while($row = $res->fetch_object())
	{

			$content .= <<<END
	<tr>
	    <td>{$row->SupplierName}</td>
	    <td>{$row->DueDate}</td>
	    <td>{$row->Total}</td>
	    <th><a href="fakturaspec.php?SupplierNumber={$row->SupplierNumber}">Läs mer</a></th>
END;
}
}

$content .= '</table>';
echo $content;

			/*$content = <<<END
<h1>Välkommen till HFAB</h1>
<p>Här hittar du statistik för leverantörer samt ett internt lagerhanteringssystem</p>
END;
			echo $content;*/
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