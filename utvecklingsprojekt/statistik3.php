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
      <h3>Statistik</h3><br>
      <h5><i>Antal artiklar i lager</i></h5>


<a href="statistik.php" class="btn btn-primary">Försäljning över tid</a>
<a href="statistik2.php" class="btn btn-primary">Försäljning per leverantör</a>
<a href="statistik3.php" class="btn btn-primary">Antal artiklar i lager</a><br>

<!-- Sökruta -->

<br><form method="GET" action="searchStatistik.php">
      <input  type="text" name="Search" pattern="([A-Öa-ö0-9]+){1,32}"
        title="Sök på artikelnamn eller artikelnummer, endast vanliga bokstäver och siffror, och sökningen får inte bestå av mer än 32 tecken." placeholder="Sök här...">
      <input  type="submit" name="Submit" placeholder="Submit">
    </form><br>

<!-- Sökruta -->

           <?php
            if(isset($_SESSION['levId'])) {
            $content = " ";
          if($mysqli){
$query = <<<END
SELECT ArticleNumber, Description, QuantityInStock FROM article GROUP BY ArticleNumber
END;
}
$res = $mysqli->query($query);
if($res->num_rows > 0)
{
      $content .= <<<END
  <table class="table table-bordered">
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
    $content .= '</table>';
  }
          ?>
    		<?php


    		
			echo $content;
			?>
      <br>
		</div>
	</body>
<!-- Här slutar Body-->

	<footer class="footer container-fluid text-center bg-light">
		<?php
		include('footer.php');
		?>
	</footer>

</html>