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

			<br><form method="GET" action="searchFakturor.php">
      <input  type="text" name="Search" pattern="([A-Öa-ö0-9]+){1,32}"
        title="Sök på Leverantör eller fakturanummer, endast vanliga bokstäver och siffror, och sökningen får inte bestå av mer än 32 tecken." placeholder="Sök här...">
      <input  type="submit" name="Submit" placeholder="Submit">
    </form><br>
			<?php
			include('config.php');
if(isset($_SESSION['userId'])||(isset($_SESSION['levId'])))	{			
	




$supplierinvoices = json_decode(apiCall('GET', 'supplierinvoices'), true);

//var_dump($supplierinvoices["SupplierInvoices"][0]["Balance"]["PaidInFull"]);

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
		Total,AuthorizerName,PaidInFull)
	VALUES('{$supplierinvoices["Balance"]}','{$supplierinvoices["Booked"]}','{$supplierinvoices["Cancel"]}','{$supplierinvoices["Currency"]}','{$supplierinvoices["DueDate"]}','{$supplierinvoices["GivenNumber"]}','{$supplierinvoices["InvoiceDate"]}','{$supplierinvoices["InvoiceNumber"]}','{$supplierinvoices["SupplierNumber"]}','{$supplierinvoices["SupplierName"]}','{$supplierinvoices["Total"]}','{$supplierinvoices["AuthorizerName"]}','{$supplierinvoices["PaidInFull"]}')

END;
$mysqli->query($query) or die($mysqli->error);
}
}
		
     $content = ' ';
     $query = <<<END
     SELECT * FROM supplierinvoices
     ORDER BY GivenNumber ASC
END;


$res = $mysqli->query($query);
if($res->num_rows > 0)
{
			$content .= <<<END
	<table class="table table-bordered">
	<tr>
	    <th>Fakturanr</th>
	    <th>Leverantör</th>
	    <th>Totalsumma</th>
	    <th>Fakturadatum</th>
	    <th>Förfallodatum</th>
	    <th>Betaldatum: <small><i>(0000-00-00 = OBETALD)</i></small></th>
	</tr>
END;
	while($row = $res->fetch_object())
	{

			$content .= <<<END
	<tr>
	    <td>{$row->GivenNumber}</td>
	    <td>{$row->SupplierName}</td>
	    <td>{$row->Total}</td>
	    <td>{$row->InvoiceDate}</td>
	    <td>{$row->DueDate}</td>
	    <td>{$row->PaidInFull}</td>
	   
END;



if(isset($_SESSION['userId'])) {
	$content .= <<<END
	 <th><a href="fakturaspec.php?GivenNumber={$row->GivenNumber}">Läs mer</a></th>
	 </tr> 


END;
}
}

$content .= '</table>';
}
}

//if(!isset($_SESSION['userId'])||(!isset($_SESSION['levId'])))
else {
	
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