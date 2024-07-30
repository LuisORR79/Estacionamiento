<?php
require("conexion.php");
mysqli_autocommit($cnx, FALSE);

$ins=mysqli_query($cnx,"update tipos set tipo=UCASE('".$_POST["tipo"]."'),tarifa=".$_POST["tarifa"]." where idtipo=".$_POST["idt1"]."") or die("Error: ".mysqli_error($cnx));

mysqli_commit($cnx);	
mysqli_close($cnx);

?>