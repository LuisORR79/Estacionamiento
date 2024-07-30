<?php
require("conexion.php");
mysqli_autocommit($cnx, FALSE);

$ins=mysqli_query($cnx,"insert into tipos(tipo,tarifa) values(UCASE('".$_POST["tipo"]."'),".$_POST["tarifa"].")") or die("Error: ".mysqli_error($cnx));

mysqli_commit($cnx);	
mysqli_close($cnx);

?>