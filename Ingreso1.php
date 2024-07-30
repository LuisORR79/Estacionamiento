<?php
require("conexion.php");
mysqli_autocommit($cnx, FALSE);

$ins=mysqli_query($cnx,"insert into estancias(idtipo,tarifa,placas,ingreso) values('".$_POST["tipo"]."',".$_POST["tarifa"].",UCASE('".$_POST["placas"]."'),Now())") or die("Error: ".mysqli_error($cnx));

mysqli_commit($cnx);	
mysqli_close($cnx);

?>