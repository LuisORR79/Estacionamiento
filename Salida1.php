<?php
require("conexion.php");
mysqli_autocommit($cnx, FALSE);

$ins=mysqli_query($cnx,"update estancias set salida='".$_POST["fh1"]."',monto=".$_POST["total"].",estatus='1' where idestancia=".$_POST["id1"]."") or die("Error: ".mysqli_error($cnx));

mysqli_commit($cnx);	
mysqli_close($cnx);

?>