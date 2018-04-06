<?php
include('template.php');

$sql = "SELECT artikelnr, benamning, utpris_prislista_a FROM artikel";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "artikelnr: " . $row["artikelnr"]. " - Benämning: " . $row["benamning"]. " - Pris " . $row["utpris_prislista_a"]. "<br>";
    }
} else {
    echo "0 results";
}
?>