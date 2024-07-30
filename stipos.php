<?php
require("conexion.php");
$sql=mysqli_query($cnx,"select tarifa from tipos where idtipo=".$_POST["idt1"]."");
$row=mysqli_fetch_array($sql);
echo $row[0];
mysqli_close($cnx);
?>
    