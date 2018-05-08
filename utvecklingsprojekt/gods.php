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

if(!isset($_SESSION['userId'])) {
	
header("refresh:0;url=login.php");

 echo '<script type="text/javascript">alert("Du har inte behörighet, vänligen logga in");</script>';

exit;

}
?>

<form method="GET" action="searchGods.php">
      <input  type="text" name="Search" placeholder="Sök här...">
      <input  type="submit" name="Submit" placeholder="Submit">
    </form>

<?php
$order = json_decode(apiCall('GET', 'orders'), true);

//var_dump($order);

if(count($order) > 0)
{

	$query = <<<END
	DELETE FROM orders
END;
	/*$query = <<<END
    UPDATE orders
    SET Cancelled = null, Currency = null, CustomerName = null, CustomerNumber = null, DeliveryDate = null, DocumentNumber = null, ExternalInvoiceReference = null, OrderDate = null, Project = null, Sent = null, Total = null
END;*/
$mysqli->query($query);

foreach($order['Orders'] as $orders)
{
	$query = <<<END
	INSERT INTO orders(Cancelled,Currency,CustomerName,CustomerNumber,DeliveryDate,DocumentNumber,ExternalInvoiceReference,OrderDate,Project,Sent,Total)
	VALUES('{$orders["Cancelled"]}','{$orders["Currency"]}','{$orders["CustomerName"]}','{$orders["CustomerNumber"]}','{$orders["DeliveryDate"]}','{$orders["DocumentNumber"]}','{$orders["ExternalInvoiceReference"]}','{$orders["OrderDate"]}','{$orders["Project"]}','{$orders["Sent"]}','{$orders["Total"]}')
END;
$mysqli->query($query);
}
}


			$content = ' ';
if(isset($_POST['utlevarea']))
{
$query = <<<END
INSERT INTO orders(utlevarea,hamtad)
VALUES('{$_POST['utlevarea']}','{$_POST['hamtad']}')
END;
}

$query = <<<END
SELECT * FROM orders
ORDER BY CustomerName ASC
END;

$res = $mysqli->query($query);
if($res->num_rows > 0)
{
	$content .= <<<END

	<table class="table">
	<tr>
	    <th>Kundnamn</th>
	    <th>Fakturanummer</th>
	    <th>Beställningsdatum</th>
	    <th>Leveransdatum</th>
	    <th>Totalt</th>
	    <th>Utleveransarea</th>
	    <th>Hämtad</th>
	</tr>
END;
	while($row = $res->fetch_object())
	{

 
$content .= <<<END

<tr>
	   
         <td>{$row->CustomerName}</td>
         <td>{$row->DocumentNumber}</td>
         <td>{$row->OrderDate}</td>
         <td>{$row->DeliveryDate}</td>
         <td>{$row->Total}</td>
         <td>{$row->utlevarea}</td>
         <td>{$row->hamtad}</td>
         <th><a href="edit_gods.php?DocumentNumber={$row->DocumentNumber}">Redigera order</a></th>
  </tr>


END;

}
}


$content .= '</table>';
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