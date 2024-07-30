// JavaScript Document
function estancias(){
	
	formData = new FormData();
	
    $.ajax({
        url: "estancias.php",
        type: "POST",
        data: formData,
		cache: false,
		contentType: false,
        processData: false,
			beforeSend: function(){
				document.getElementById('respuestaB').style.visibility="visible";
				document.getElementById('respuestaB').style.display="block";						
			},
			success: function(res){  
				document.getElementById('contenedor').innerHTML = res; 
				document.getElementById("f1").className = "fs";
				document.getElementById("f2").className = "fn";
				document.getElementById("f3").className = "fn";
				document.getElementById('respuestaB').style.visibility="hidden";
				document.getElementById('respuestaB').style.display="none";
			},
			error: function(){
				document.getElementById('respuestaB').style.visibility="hidden";
				document.getElementById('respuestaB').style.display="none";				
			}									        
	});
}

function tipos(){
	
	formData = new FormData();
	
    $.ajax({
        url: "tipos.php",
        type: "POST",
        data: formData,
		cache: false,
		contentType: false,
        processData: false,
			beforeSend: function(){
				document.getElementById('respuestaB').style.visibility="visible";
				document.getElementById('respuestaB').style.display="block";						
			},
			success: function(res){  
				document.getElementById('contenedor').innerHTML = res; 
				document.getElementById("f2").className = "fs";
				document.getElementById("f1").className = "fn";
				document.getElementById("f3").className = "fn";
				document.getElementById('respuestaB').style.visibility="hidden";
				document.getElementById('respuestaB').style.display="none";
			},
			error: function(){
				document.getElementById('respuestaB').style.visibility="hidden";
				document.getElementById('respuestaB').style.display="none";				
			}								        
	});
}


function reporte(){
	
	formData = new FormData();
	
    $.ajax({
        url: "reporte.php",
        type: "POST",
        data: formData,
		cache: false,
		contentType: false,
        processData: false,
			beforeSend: function(){
				document.getElementById('respuestaB').style.visibility="visible";
				document.getElementById('respuestaB').style.display="block";						
			},
			success: function(res){  
				document.getElementById('contenedor').innerHTML = res; 
				document.getElementById("f3").className = "fs";
				document.getElementById("f1").className = "fn";
				document.getElementById("f2").className = "fn";
				document.getElementById('respuestaB').style.visibility="hidden";
				document.getElementById('respuestaB').style.display="none";
			},
			error: function(){
				document.getElementById('respuestaB').style.visibility="hidden";
				document.getElementById('respuestaB').style.display="none";				
			}								        
	});
}


function NuevoTp(){
	formDataC = new FormData();
					
    $.ajax({
        url: "NuevoTp.php",
        type: "POST",
        data: formDataC,
		cache: false,
		contentType: false,
        processData: false,
			beforeSend: function(){ 
				var ancho = window.innerWidth;
				var alto = window.innerHeight;

				document.getElementById('detalle').style.width=500+"px";
				document.getElementById('detalle').style.height=300+"px";
				document.getElementById('imagen110').style.width=498+"px";
				
				document.getElementById('detalle').style.left=(parseInt(ancho/2)-250)+"px";
				document.getElementById('imagen110').style.left=(parseInt(ancho/2)-250)+"px";
	
				
				
				document.getElementById('imagen120').style.left=((parseInt(document.getElementById('imagen110').style.left)+parseInt(document.getElementById('imagen110').style.width))-26)+"px";
				
				
				document.getElementById('detalle').style.top=100+"px";
				document.getElementById('imagen110').style.top=100+"px";
				document.getElementById('imagen120').style.top=101+"px";
				
				document.getElementById('imagen110').innerHTML="&nbsp;Nuevo tipo de vehículo";
				
            },
            success: function(res){	 
				document.getElementById('respuestaOS').style.visibility="visible";
				document.getElementById('respuestaOS').style.display="block";
						
				document.getElementById('detalle').innerHTML = res; 	
				document.getElementById('tipo').focus();								
            },
            error: function(){                
					
            }							        
	});
}


function GuardarTp(){
	if(ValidarTp()){
		var formData = new FormData(document.getElementById("form1"));
		formData.append('num', '1');						
		
			
		var ruta = "NuevoTp1.php";
	
		$.ajax({
			url: ruta,
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
				beforeSend: function(){
					document.getElementById('respuestaB').style.visibility="visible";
					document.getElementById('respuestaB').style.display="block";						
				},
				//una vez finalizado correctamente
				success: function(res){                
					document.getElementById('respuestaB').style.visibility="hidden";
					document.getElementById('respuestaB').style.display="none";
					if(res==""){
						cerrard();
						alert("Nuevo tipo de vehiculo agregado correctamente");
						tipos();											
					}
					else						
						alert(res);
				},
				//si ha ocurrido un error
				error: function(){
					document.getElementById('respuestaB').style.visibility="hidden";
					document.getElementById('respuestaB').style.display="none";				
				}						        
		});
	}
}


function EditarTp(idt){
	formDataC = new FormData();
	
	formDataC.append('idt1', idt);
					
    $.ajax({
        url: "EditarTp.php",
        type: "POST",
        data: formDataC,
		cache: false,
		contentType: false,
        processData: false,
			beforeSend: function(){ 
				var ancho = window.innerWidth;
				var alto = window.innerHeight;

				document.getElementById('detalle').style.width=500+"px";
				document.getElementById('detalle').style.height=300+"px";
				document.getElementById('imagen110').style.width=498+"px";
				
				document.getElementById('detalle').style.left=(parseInt(ancho/2)-250)+"px";
				document.getElementById('imagen110').style.left=(parseInt(ancho/2)-250)+"px";
	
				
				
				document.getElementById('imagen120').style.left=((parseInt(document.getElementById('imagen110').style.left)+parseInt(document.getElementById('imagen110').style.width))-26)+"px";
				
				
				document.getElementById('detalle').style.top=100+"px";
				document.getElementById('imagen110').style.top=100+"px";
				document.getElementById('imagen120').style.top=101+"px";
				
				document.getElementById('imagen110').innerHTML="&nbsp;Editar tipo de vehículo";
				
            },
            success: function(res){	 
				document.getElementById('respuestaOS').style.visibility="visible";
				document.getElementById('respuestaOS').style.display="block";
						
				document.getElementById('detalle').innerHTML = res; 	
				document.getElementById('tipo').focus();								
            },
            error: function(){                
					
            }							        
	});
}


function ActualizarTp(idt){
	if(ValidarTp()){
		var formData = new FormData(document.getElementById("form1"));
		formData.append('idt1', idt);						
		
			
		var ruta = "EditarTp1.php";
	
		$.ajax({
			url: ruta,
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
				beforeSend: function(){
					document.getElementById('respuestaB').style.visibility="visible";
					document.getElementById('respuestaB').style.display="block";						
				},
				//una vez finalizado correctamente
				success: function(res){                
					document.getElementById('respuestaB').style.visibility="hidden";
					document.getElementById('respuestaB').style.display="none";
					if(res==""){
						cerrard();
						alert("Tipo de vehiculo actualizado correctamente");
						tipos();											
					}
					else						
						alert(res);
				},
				//si ha ocurrido un error
				error: function(){
					document.getElementById('respuestaB').style.visibility="hidden";
					document.getElementById('respuestaB').style.display="none";				
				}						        
		});
	}
}



function ValidarTp(){

	var er_float = /^[0-9]+(\.[\d]{1,2})?$/;
	
	if(document.getElementById('tipo').value==""){
		validatePrompt (document.getElementById('tipo'), "Error en la descripción del tipo de vehículo")
		return false;
	}
	
	if(document.getElementById('tarifa').value=="" || !er_float.test(document.getElementById('tarifa').value)){
		validatePrompt (document.getElementById('tarifa'), "Error en el monto de la tarifa x minuto")
		return (false);
	}
	
	return true;
}





function Ingreso(){
	formDataC = new FormData();
					
    $.ajax({
        url: "Ingreso.php",
        type: "POST",
        data: formDataC,
		cache: false,
		contentType: false,
        processData: false,
			beforeSend: function(){ 
				var ancho = window.innerWidth;
				var alto = window.innerHeight;

				document.getElementById('detalle').style.width=500+"px";
				document.getElementById('detalle').style.height=300+"px";
				document.getElementById('imagen110').style.width=498+"px";
				
				document.getElementById('detalle').style.left=(parseInt(ancho/2)-250)+"px";
				document.getElementById('imagen110').style.left=(parseInt(ancho/2)-250)+"px";
	
				
				
				document.getElementById('imagen120').style.left=((parseInt(document.getElementById('imagen110').style.left)+parseInt(document.getElementById('imagen110').style.width))-26)+"px";
				
				
				document.getElementById('detalle').style.top=100+"px";
				document.getElementById('imagen110').style.top=100+"px";
				document.getElementById('imagen120').style.top=101+"px";
				
				document.getElementById('imagen110').innerHTML="&nbsp;Ingreso de vehículo";
				
            },
            success: function(res){	 
				document.getElementById('respuestaOS').style.visibility="visible";
				document.getElementById('respuestaOS').style.display="block";
						
				document.getElementById('detalle').innerHTML = res; 	
				document.getElementById('placas').focus();								
            },
            error: function(){                
					
            }							        
	});
}

function GuardarIn(){
	if(document.getElementById("placas").value==""){
		validatePrompt (document.getElementById('placas'), "Error ingrese las placas del vehículo")
		return false;
	}
	
	if(document.getElementById("tipo").value==""){
		validatePrompt (document.getElementById('tipo'), "Error seleccione el tipo del vehículo")
		return false;
	}
	
	var formData = new FormData(document.getElementById("form1"));
	formData.append('num', '1');						
	
		
	var ruta = "Ingreso1.php";

	$.ajax({
		url: ruta,
		type: "POST",
		data: formData,
		cache: false,
		contentType: false,
		processData: false,
			beforeSend: function(){
				document.getElementById('respuestaB').style.visibility="visible";
				document.getElementById('respuestaB').style.display="block";						
			},
			//una vez finalizado correctamente
			success: function(res){                
				document.getElementById('respuestaB').style.visibility="hidden";
				document.getElementById('respuestaB').style.display="none";
				if(res==""){
					cerrard();
					alert("Ingreso agregado correctamente");
					estancias();;											
				}
				else						
					alert(res);
			},
			//si ha ocurrido un error
			error: function(){
				document.getElementById('respuestaB').style.visibility="hidden";
				document.getElementById('respuestaB').style.display="none";				
			}						        
	});
}


function Salida(idi){
	formDataC = new FormData();
	
	formDataC.append('idi1', idi);
					
    $.ajax({
        url: "Salida.php",
        type: "POST",
        data: formDataC,
		cache: false,
		contentType: false,
        processData: false,
			beforeSend: function(){ 
				var ancho = window.innerWidth;
				var alto = window.innerHeight;

				document.getElementById('detalle').style.width=500+"px";
				document.getElementById('detalle').style.height=300+"px";
				document.getElementById('imagen110').style.width=498+"px";
				
				document.getElementById('detalle').style.left=(parseInt(ancho/2)-250)+"px";
				document.getElementById('imagen110').style.left=(parseInt(ancho/2)-250)+"px";
	
				
				
				document.getElementById('imagen120').style.left=((parseInt(document.getElementById('imagen110').style.left)+parseInt(document.getElementById('imagen110').style.width))-26)+"px";
				
				
				document.getElementById('detalle').style.top=50+"px";
				document.getElementById('imagen110').style.top=50+"px";
				document.getElementById('imagen120').style.top=51+"px";
				
				document.getElementById('imagen110').innerHTML="&nbsp;Salida de vehículo";
				
            },
            success: function(res){	 
				document.getElementById('respuestaOS').style.visibility="visible";
				document.getElementById('respuestaOS').style.display="block";
						
				document.getElementById('detalle').innerHTML = res; 	
				document.getElementById('cobrar').focus();								
            },
            error: function(){                
					
            }							        
	});	
}

function GuardarSl(id,fh){
	formDataC = new FormData(document.getElementById("form1"));
	
	formDataC.append('id1', id);
	formDataC.append('fh1', fh);
					
    $.ajax({
        url: "Salida1.php",
        type: "POST",
        data: formDataC,
		cache: false,
		contentType: false,
        processData: false,
			beforeSend: function(){
				document.getElementById('respuestaB').style.visibility="visible";
				document.getElementById('respuestaB').style.display="block";						
			},
			//una vez finalizado correctamente
			success: function(res){                
				document.getElementById('respuestaB').style.visibility="hidden";
				document.getElementById('respuestaB').style.display="none";
				if(res==""){
					cerrard();
					alert("Salida registrada correctamente");
					estancias();;											
				}
				else						
					alert(res);
			},
			//si ha ocurrido un error
			error: function(){
				document.getElementById('respuestaB').style.visibility="hidden";
				document.getElementById('respuestaB').style.display="none";				
			}							        
	});	
}


function stipo(idt){
	formData = new FormData();
	formData.append('idt1', idt);
    $.ajax({
        url: "stipos.php",
        type: "POST",
        data: formData,
		cache: false,
		contentType: false,
        processData: false,
			beforeSend: function(){
				document.getElementById('respuestaB').style.visibility="visible";
				document.getElementById('respuestaB').style.display="block";						
			},
			success: function(res){  
				document.getElementById('respuestaB').style.visibility="hidden";
				document.getElementById('respuestaB').style.display="none";	
				document.getElementById('tarifa').value = res; 
			},
			error: function(){
				document.getElementById('respuestaB').style.visibility="hidden";
				document.getElementById('respuestaB').style.display="none";				
			}								        
	});
}


function Busqueda(){
	if(ValidarBs()){
		formDataC = new FormData(document.getElementById("form1"));
		$.ajax({
			url: "reporte1.php",
			type: "POST",
			data: formDataC,
			cache: false,
			contentType: false,
			processData: false,
				beforeSend: function(){
					document.getElementById('respuestaB').style.visibility="visible";
					document.getElementById('respuestaB').style.display="block";						
				},
				success: function(res){  
					document.getElementById('respuestaB').style.visibility="hidden";
					document.getElementById('respuestaB').style.display="none";	
					document.getElementById('conetnedor1f').innerHTML = res; 
				},
				error: function(){
					document.getElementById('respuestaB').style.visibility="hidden";
					document.getElementById('respuestaB').style.display="none";				
				}								        
		});
	}
}


function Exportar(){
	if(ValidarBs()){
		var f1=document.getElementById('inicio').value;
		var f2=document.getElementById('fin').value;
		
		var url="exportar.php?f1="+f1+"&f2="+f2;
		window.open(url,'download_window');
	}
}



function ValidarBs(){
	if(document.getElementById("inicio").value==""){
		validatePrompt (document.getElementById('inicio'), "Error seleccione el inicio del periodo")
		return false;
	}
	
	if(document.getElementById("fin").value==""){
		validatePrompt (document.getElementById('fin'), "Error seleccione el final del periodo")
		return false;
	}
	
	if(document.getElementById("fin").value<document.getElementById("inicio").value){
		validatePrompt (document.getElementById('fin'), "Error en el periodo seleccionado")
		return false;
	}
	
	return true;
}

function limpiar(){
	document.getElementById('conetnedor1f').innerHTML = ""; 
}


function validatePrompt (Ctrl, PromptStr) {
	alert (PromptStr)
	Ctrl.focus();
	return;
}

movimiento=function(div,div1,div2)
	{		
		difX=0;
		difY=0;
	 
		div.addEventListener('mousedown',inicio,false);
	 
		function inicio(e)
		{		
			var eX=e.pageX;
			var eY=e.pageY;
	
			var oX=parseInt(div.style.left);
			var oY=parseInt(div.style.top);
			
			difX=oX-eX;
			difY=oY-eY;
	 
			document.addEventListener('mousemove',mover,false);
			document.addEventListener('mouseup',soltar,false);
		}
	 
		function mover(e)
		{
			var tY=e.pageY+difY+'px';
			var tX=e.pageX+difX+'px'
			var wd=div.style.width;
			/*div.style.top=tY;
			div.style.left=tX;*/
		
			var top1=parseInt(tY);	
			var left1=parseInt(tX);
			
			if(top1>1){				
				div.style.top=tY;
				div1.style.top=tY;
				div2.style.top=(parseInt(tY)+1)+"px";	
			}
			
			if(left1>1){
				div.style.left=tX;
				div1.style.left=tX;		
				div2.style.left=((parseInt(tX)+parseInt(wd))-26)+"px";
			}
			
		}
	
		function soltar(e)
		{
			document.removeEventListener('mousemove',mover,false);
			document.removeEventListener('mouseup',soltar,false);
		}
	}

function Cambia(refer,nueva) {
	document.getElementById(refer).src=nueva;
}

function cerrard(){		
	document.getElementById('respuestaOS').style.visibility="hidden";	
	document.getElementById('respuestaOS').style.display="none";	
	document.getElementById('detalle').innerHTML="";
}

function mueveReloj(){
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()

	var mediodia = hora >= 12 ? 'p.m.' : 'a.m.';
	hora = hora % 12;
	hora = hora ? hora : 12;

	str_hora = new String (hora)
    if (str_hora.length == 1)
       hora = "0" + hora
	   	
	str_minuto = new String (minuto)
    if (str_minuto.length == 1)
       minuto = "0" + minuto

	str_segundo = new String (segundo)
    if (str_segundo.length == 1)
       segundo = "0" + segundo
		
    horaImprimible = hora + " : " + minuto + " : " + segundo + " " + mediodia;

    document.getElementById('hora').innerHTML = horaImprimible

    setTimeout("mueveReloj()",1000);
}

window.onload=function()
{
	estancias();
	mueveReloj()
}