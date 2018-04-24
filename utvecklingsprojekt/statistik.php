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
			
<!-- Nedanför är kod för Google Charts-API-->

    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'benamning');
        data.addColumn('number', 'utpris_prislista_a');
        /*data.addRows([
          ['Mushrooms', 3],
          ['Onions', 1],
          ['Olives', 1],
          ['Zucchini', 1],
          ['Pepperoni', 2]

        ]); */

        <?php

        	if($mysqli){
$query = <<<END
SELECT benamning, utpris_prislista_a FROM artikel
GROUP BY utpris_prislista_a
END;

$res = $mysqli->query($query);
if($res->num_rows > 0)
{
	while($row = $res->fetch_object())
	{
		echo 'data.addRow(["'.$row->benamning.'", '.$row->utpris_prislista_a.']);';
	}
				
					/*while( $obj = ( $result )) {
						echo 'data.addRow(["'.$obj->City.'", '.$obj->Profit.']);';
					}
				}
        	}*/
        }
    }
        	?>

        // Set chart options
        var options = {'title':'How Much Pizza I Ate Last Night',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  
    <!-- GoogleCharts-kod slut-->

    		<?php
    		$content = <<<END
    		<h2>Här hittar du statistik</h2><br>
    		<div id="chart_div"></div>
END;
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