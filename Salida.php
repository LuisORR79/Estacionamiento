<div id="inputC" style="border:1px solid #000; background-color:#FFF; box-shadow: 3px 3px 3px #888888; height:500px;">       
    <form autocomplete="off" id="form1">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td width="100%" align="center" style="font-size:24px;">
    <br />
    </td>
    </tr>
	
    <?php
    require("conexion.php");	
	$sql="select a.placas,b.tipo,a.tarifa,DATE_FORMAT(a.ingreso, '%d/%m/%Y %H:%i:%s'),DATE_FORMAT(now(), '%d/%m/%Y %H:%i:%s'),TIMESTAMPDIFF(MINUTE,a.ingreso,now()),(a.tarifa*TIMESTAMPDIFF(MINUTE,a.ingreso,now())) as tot,now() from estancias a inner join tipos b on(a.idtipo=b.idtipo) where a.idestancia=".$_POST["idi1"]."";
	$buscar=mysqli_query($cnx,$sql);
	$row=mysqli_fetch_array($buscar);
	mysqli_close($cnx);
	?> 
          
    <tr>
    <td width="100%"  style="padding:4px;">Placas:<br />
    <input type="text" id="placas" name="placas" maxlength="12" readonly="readonly" value="<?php echo $row[0]; ?>" style="width:200px; height:25px;"  />
    </td>
    </tr> 
    
    
    <tr>
    <td width="100%"  style="padding:4px;">Tipo de veh&iacute;culo:<br />
    <input type="text" id="tipo" name="tipo" maxlength="48" readonly="readonly" value="<?php echo $row[1]; ?>" style="width:300px; height:25px;"  />
    </td>
    </tr>
    
    <tr>
    <td width="100%" style="padding:4px;">Tarifa x minuto:<br />
    <input type="text" id="tarifa" name="tarifa" readonly="readonly" value="<?php echo $row[2]; ?>" style="width:100px; height:25px; text-align:right;"  />
    </td>
    </tr>          
    
    <tr>
    <td width="100%" style="padding:4px;">Ingreso:<br />
    <input type="text" id="ingreso" name="ingreso" readonly="readonly" value="<?php echo $row[3]; ?>" style="width:200px; height:25px;"  />
    </td>
    </tr> 
    
    <tr>
    <td width="100%" style="padding:4px;">Salida:<br />
    <input type="text" id="salida" name="salida" readonly="readonly" value="<?php echo $row[4]; ?>" style="width:200px; height:25px;"  />
    </td>
    </tr> 
    
    <tr>
    <td width="100%" style="padding:4px;">Minutos transcurridos:<br />
    <input type="text" id="minutos" name="minutos" readonly="readonly" value="<?php echo $row[5]; ?>" style="width:100px; height:25px; text-align:right;"  />
    </td>
    </tr> 
    
    <tr>
    <td width="100%" style="padding:4px;">Total a pagar $:<br />
    <input type="text" id="total" name="total" readonly="readonly" value="<?php echo $row[6]; ?>" style="width:100px; height:25px; text-align:right;"  />
    </td>
    </tr> 
    
    
    <tr>
    <td align="right" >
    <br />
    <input type="button" value="Cerrar"  onclick="cerrard();" style="width:100px; height:30px; font-size:15px;"/>&nbsp;&nbsp;
    
    <input type="button" id="cobrar" value="Cobrar"  onclick="GuardarSl(<?php echo $_POST["idi1"]; ?>,'<?php echo $row[7]; ?>');" style="width:100px; height:30px; font-size:15px;"/>&nbsp;&nbsp;

    </td>
    </tr>
    </table>
    </form>
</div>