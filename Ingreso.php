<div id="inputC" style="border:1px solid #000; background-color:#FFF; box-shadow: 3px 3px 3px #888888; height:300px;">       
    <form autocomplete="off" id="form1">
    <table width="100%" border="0">
    <tr>
    <td width="100%" align="center" style="font-size:18px; color:#FFF; font-weight:bold;">
    <br />
    </td>
    </tr>
	 
          
    <tr>
    <td width="100%"  style="padding:8px;">Placas:<br />
    <input type="text" id="placas" name="placas" maxlength="12" style="width:200px; height:25px;"  />
    </td>
    </tr> 
    
    
    <tr>
    <td width="100%"  style="padding:8px;">Tipo de veh&iacute;culo:<br />
    <select id="tipo" name="tipo" style="width:300px; height:30px;" onchange="stipo(this.value)" >
    <option selected="selected" value=""></option>
    <?php
    require("conexion.php");
	$sql="select idtipo,tipo from tipos order by tipo";
	$buscar=mysqli_query($cnx,$sql);
	while($row=mysqli_fetch_array($buscar)){
		?>
        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
        <?php
	}
	mysqli_close($cnx);
	?>
    </select>
    </td>
    </tr>
    
    <tr>
    <td width="100%" style="padding:8px;">Tarifa x minuto:<br />
    <input type="text" id="tarifa" name="tarifa" readonly="readonly" style="width:100px; height:25px; text-align:right;"  />
    </td>
    </tr>          
    
    <tr>
    <td align="right" >
    <br />
    <input type="button" value="Cerrar"  onclick="cerrard();" style="width:100px; height:30px; font-size:15px;"/>&nbsp;&nbsp;
    
    <input type="button" value="Guardar"  onclick="GuardarIn();" style="width:100px; height:30px; font-size:15px;"/>&nbsp;&nbsp;

    </td>
    </tr>
    </table>
    </form>
</div>