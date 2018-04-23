<?php

include('template.php');

$_SESSION = array();
session_destroy();

//header("Location:index.php");
header("refresh:0;url=index.php");
 echo '<script type="text/javascript">alert("Du loggas nu ut, välkommen åter");</script>';

  

?>


