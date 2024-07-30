<div id="encabezado" style="padding-top:3px;">
<form autocomplete="off" id="form1">
&nbsp;Periodo: <input type="datetime-local" id="inicio" name="inicio" style="height:25px;" onchange="limpiar()"> - <input type="datetime-local" id="fin" name="fin" style="height:25px;" onchange="limpiar()"> <input type="button" value="Buscar" style="height:29px; width:100px;" onclick="Busqueda()" /> <input type="button" value="Exportar" style="height:29px; width:100px;" onclick="Exportar()" />
</form>
</div>

<div id="reporte" style="position:absolute; top:35px; width:100%; height: calc(100% - 38px);">
	<div id="conetnedor0">    
    <table id="tabla1" align="center" width="100%" cellpadding="2" cellspacing="0" border="0">
    <tr style="background-color:#CCC;">
    <td class="obj0"><div id="c0"></div></td> 
    <td class="obj0"><div id="c150">Placas</div></td>   
    <td class="obj0"><div id="c150">Tipo</div></td>
    <td class="obj0"><div id="c150">Tarifa x minuto</div></td>
    <td class="obj0"><div id="c200">Ingreso</div></td>
    <td class="obj0"><div id="c200">Salida</div></td>
    <td class="obj0"><div id="c150">Tiempo (min)</div></td>
    <td class="obj0"><div id="c150">Topal a pagar</div></td>
    <td class="obj0"><div id="c3">&nbsp;</div></td>
    </tr>
    </table>
    </div>
          
    <div id="conetnedor1f" class="scbarra" style="position:absolute; overflow:scroll; width:100%; height: calc(100% - 23px); overflow-x:hidden; ">

    </div>
</div>