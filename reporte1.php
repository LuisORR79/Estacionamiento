<table align="center" width="100%" cellpadding="2" cellspacing="0" border="0">
<?php
$color="tr2";
require("conexion.php");
$sql="select a.placas,b.tipo,a.tarifa,DATE_FORMAT(a.ingreso, '%d/%m/%Y %H:%i:%s'),DATE_FORMAT(a.salida, '%d/%m/%Y %H:%i:%s'),TIMESTAMPDIFF(MINUTE,a.ingreso,a.salida),a.monto,a.estatus from estancias a inner join tipos b on(a.idtipo=b.idtipo) where a.ingreso between '".$_POST["inicio"]."' and '".$_POST["fin"]."' order by a.ingreso";

$buscar=mysqli_query($cnx,$sql);
$cnt=1;

while($row=mysqli_fetch_array($buscar)){
?>
    <tr class="<?php echo $color; ?>">
    <td class="obj1"><div id="c0"><?php echo $cnt; ?></div></td> 
    <td class="obj1"><div id="c150"><?php echo $row[0]; ?></div></td>   
    <td class="obj1"><div id="c150"><?php echo $row[1]; ?></div></td>
    <td class="obj1"><div id="c150"><?php echo $row[2]; ?></div></td>
    <td class="obj1"><div id="c200"><?php echo $row[3]; ?></div></td>
    <td class="obj1"><div id="c200"><?php if($row[7]>0){ echo $row[4]; } ?></div></td>
    <td class="obj1"><div id="c150"><?php if($row[7]>0){ echo $row[5]; } ?></div></td>
    <td class="obj1"><div id="c150"><?php if($row[7]>0){ echo $row[6]; } ?></div></td>
    <td class="obj1"><div id="c3">&nbsp;</div></td>
    </tr>
<?php
if($color=="tr1") $color="tr2";
else $color="tr1";
$cnt++;
}
mysqli_close($cnx);
?>
</table>