<div id="encabezado">
    <font class="fn" onclick="NuevoTp();" style="position:absolute; left:100%; margin-left:-200px;">+ Nuevo tipo</font>    
</div>

<div id="conetnedor0">    
<table id="tabla1" align="center" width="100%" cellpadding="2" cellspacing="0" border="0">
<tr style="background-color:#CCC;">
<td class="obj0"><div id="c0"></div></td>    
<td class="obj0"><div id="c250">Tipo</div></td>
<td class="obj0"><div id="c200">Tarifa x minuto</div></td>
<td class="obj0"><div id="c3">&nbsp;</div></td>
</tr>
</table>
</div>
      
<div id="conetnedor1f" class="scbarra" style=" position:absolute; overflow:scroll; width:100%; height: calc(100% - 55px); overflow-x:hidden; top:55px; ">
<table align="center" width="100%" cellpadding="2" cellspacing="0" border="0">
<?php
$color="tr2";

require("conexion.php");


$sql="select idtipo,tipo,tarifa from tipos order by tipo";
$buscar=mysqli_query($cnx,$sql);
$cnt=1;
while($row=mysqli_fetch_array($buscar)){
?>
    <tr class="<?php echo $color; ?>" onclick="EditarTp('<?php echo $row[0]; ?>')" title="Editar">
    <td class="obj1"><div id="c0"><?php echo $cnt; ?></div></td>
            
    <td class="obj1"><div id="c250"><?php echo $row[1]; ?></td>
    
    <td class="obj1"><div id="c200"><?php echo $row[2]; ?></div></td>
                   
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
</div>