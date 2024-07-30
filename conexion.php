<?php
$cnx = mysqli_connect("127.0.0.1", "root", "", "estancia") or die ('Error a fallado la conexion:'.mysqli_error());
$tilde = $cnx->query("SET NAMES 'utf8'");
?>