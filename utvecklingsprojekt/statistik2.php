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
      <h2>Statistik</h2><br>
      <h4><i>Försäljning och totala leveranser per leverantör</i></h4>
      
<!-- Nedanför är kod för Google Charts-API-->

<a href="statistik.php" class="btn btn-primary">Försäljning över tid</a>
<a href="statistik2.php" class="btn btn-primary">Försäljning och totala leveranser per leverantör</a>
<a href="statistik3.php" class="btn btn-primary">Antal artiklar i lager</a><hr>
    <button onclick="drawChart('ColumnChart')" class="btn btn-default">Column chart</button>
<button onclick="drawChart('PieChart')" class="btn btn-default">Pie Chart</button>
<button onclick="drawChart('BarChart')" class="btn btn-default">Bar chart</button>
<button onclick="drawChart('Table')" class="btn btn-default">Table</button>
<br>&nbsp;<br>
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
      function drawChart(type) {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'SupplierName');
        data.addColumn('number', 'Total');
        /*data.addRows([
          ['Mushrooms', 3],
          ['Onions', 1],
          ['Olives', 1],
          ['Zucchini', 1],
          ['Pepperoni', 2]

        ]); */

        <?php 
        if(isset($_SESSION['levId'])) {

          if($mysqli){
$query = <<<END
SELECT SupplierName, Total FROM supplierinvoices
GROUP BY SupplierName
END;

$res = $mysqli->query($query);
if($res->num_rows > 0)
{
  while($row = $res->fetch_object())
  {
    echo 'data.addRow(["'.$row->SupplierName.'",'.$row->Total.']);';
  }
        
          /*while( $obj = ( $result )) {
            echo 'data.addRow(["'.$obj->City.'", '.$obj->Profit.']);';
          }
        }
          }*/
        }
    }
  }
          ?>

        // Set chart options
        var options = {'title':'Försäljningsstatistik',
                       'width':1000,
                       'height':600,
                       'bar': {groupWidth: "95%"},
        'legend': { position: "none" }};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ChartWrapper({containerId:'chart_div'});
        chart.setOptions(options);
        chart.setChartType(type);
        chart.setDataTable(data);
        chart.draw();
      }
    </script>
    <!-- GoogleCharts-kod slut-->

        <?php

        

         if(isset($_SESSION['levId'])) {

        $content = <<<END
        
        <div id="chart_div"></div>
END;



}
/*if(!isset($_SESSION['levId'])) { //(!isset) betyder att det INTE är set
header("refresh:0;url=login.php");
echo '<script type="text/javascript">alert("Du har inte behörighet, vänligen logga in");</script>';

exit;
} */

  
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