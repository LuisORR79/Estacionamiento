<div id="inputC" style="border:1px solid #000; background-color:#FFF; box-shadow: 3px 3px 3px #888888; height:240px;">       
    <?php
	require("conexion.php");
	$sql=mysqli_query($cnx,"select tipo,tarifa from tipos where idtipo=".$_POST["idt1"]."");
	$row=mysqli_fetch_array($sql);
	?>
    <form autocomplete="off" id="form1">
    <table width="100%" border="0">
    <tr>
    <td width="100%" align="center" style="font-size:18px; color:#FFF; font-weight:bold;">
    <br />
    </td>
    </tr>
	        
    <tr>
    <td width="100%"  style="padding:8px;">Tipo de veh&iacute;culo:<br />
    <input type="text" id="tipo" name="tipo" maxlength="48" value="<?php echo $row[0]; ?>" style="width:300px; height:25px;"  />
    </td>
    </tr> 
    
    
    <tr>
    <td width="100%" style="padding:8px;">Tarifa x minuto:<br />
    <input type="text" id="tarifa" name="tarifa" value="<?php echo $row[1]; ?>" style="width:100px; height:25px; text-align:right;"  />
    </td>
    </tr>          
    
    <tr>
    <td align="right" >
    <br />
    <input type="button" value="Cerrar"  onclick="cerrard();" style="width:100px; height:30px; font-size:15px;"/>&nbsp;&nbsp;
    
    <input type="button" value="Guardar"  onclick="ActualizarTp(<?php echo $_POST["idt1"]; ?>);" style="width:100px; height:30px; font-size:15px;"/>&nbsp;&nbsp;

    </td>
    </tr>
    </table>
    </form>
    <?php
	mysqli_close($cnx);
	?>
</div>