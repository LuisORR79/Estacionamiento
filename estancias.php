<div style="width:100%; height:140px; text-align:center; padding-top:20px;">
<input type="button" value="Ingreso" onClick="Ingreso()" style="font-size:50px; width:300px; height:100px;" />
</div>

<div style="position:absolute; top:140px; width:100%; height: calc(100% - 140px);">
	<div id="conetnedor0">    
    <table id="tabla1" align="center" width="100%" cellpadding="2" cellspacing="0" border="0">
    <tr style="background-color:#CCC;">
    <td class="obj0"><div id="c0"></div></td> 
    <td class="obj0"><div id="c250">Placas</div></td>   
    <td class="obj0"><div id="c250">Tipo</div></td>
    <td class="obj0"><div id="c200">Tarifa x minuto</div></td>
    <td class="obj0"><div id="c250">Ingreso</div></td>
    <td class="obj0"><div id="c3">&nbsp;</div></td>
    </tr>
    </table>
    </div>
          
    <div id="conetnedor1f" class="scbarra" style=" position:absolute; overflow:scroll; width:100%; height: calc(100% - 30px); overflow-x:hidden; top:25px; ">
    <table align="center" width="100%" cellpadding="2" cellspacing="0" border="0">
	<?php
    $color="tr2";
  	require("conexion.php");
	$sql="select a.idestancia,a.placas,b.tipo,a.tarifa,DATE_FORMAT(a.ingreso, '%d/%m/%Y %H:%i:%s') from estancias a inner join tipos b on(a.idtipo=b.idtipo) where a.estatus='0' order by a.ingreso";
	$buscar=mysqli_query($cnx,$sql);
	$cnt=1;
    while($row=mysqli_fetch_array($buscar)){
    ?>
        <tr class="<?php echo $color; ?>" onclick="Salida('<?php echo $row[0]; ?>')" title="Cobrar" >
        <td class="obj1"><div id="c0"><?php echo $cnt; ?></div></td>
                
        <td class="obj1"><div id="c250"><?php echo $row[1]; ?></td>
        <td class="obj1"><div id="c250"><?php echo $row[2]; ?></td>
        
        <td class="obj1"><div id="c200"><?php echo $row[3]; ?></div></td>
        <td class="obj1"><div id="c250"><?php echo $row[4]; ?></td>
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
</div>