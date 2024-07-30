<?php
//nm="+nom+"&f1="+f1+"&f2
if($_GET["f1"]){
	$mes=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);
	date_default_timezone_set('Europe/London');

	if (PHP_SAPI == 'cli')
		die('Error al intentar cargar la informaci&oacute;n');

	/** Include PHPExcel */
	require_once('PHPExcel/Classes/PHPExcel.php');
	require("conexion.php");
	
	// Create new PHPExcel object
	$objPHPExcel = new PHPExcel();

	// Set document properties
	$objPHPExcel->getProperties()->setCreator("")
							 ->setLastModifiedBy("")
							 ->setTitle("Office 2007 XLSX")
							 ->setSubject("Office 2007 XLSX")
							 ->setDescription("Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("ffice 2007 XLSX");

	

	$negro = new PHPExcel_Style();
	$blanco = new PHPExcel_Style();
	$gris = new PHPExcel_Style();
	$centrado = new PHPExcel_Style();

	$negro->applyFromArray(
		array('fill' 	=> array(
								'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
								'color'		=> array('argb' => 'FF474748')
							),
		  'borders' => array(
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'color'		=> array('argb' => 'FF000000')
							)
		 ));

	$blanco->applyFromArray(
		array(
		  'fill' 	=> array(
								'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
								'color'		=> array('argb' => 'FFFFFFFF')
							),
		 'borders' => array(
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'color'		=> array('argb' => 'FFCDDDAC')
							)
		 ));

	$centrado->applyFromArray(
		array('alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
							),
		 'fill' 	=> array(
								'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
								'color'		=> array('argb' => 'FF474748')
							),
		  'borders' => array(
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'color'		=> array('argb' => 'FF000000')
							)							
		 ));
		 
	$gris->applyFromArray(
		array('fill' 	=> array(
								'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
								'color'		=> array('argb' => 'FFE2E2E2')
							),
		  'borders' => array(
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'color'		=> array('argb' => 'FFCDDDAC')
							)
		 ));

	$blanca = array(
    	'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => 'FFFFFF'),
        'size'  => 11,
        'name'  => 'Arial'
    ));
	
	
	$d1 = new DateTime($_GET["f1"]);
	$d1a=$d1->format('d/m/Y H:i:s');
	$d2 = new DateTime($_GET["f2"]);
	$d2a=$d2->format('d/m/Y H:i:s');	
	
	
		
	$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'ESTANCIAS');
	$objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
		

	$per=$d1a." al ".$d2a;
	$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A2', 'PERIODO: '.$per);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:H2');
	
	$p=3;
	
	$d11=$d1->format('Y-m-d H:i:s');
	$d22=$d2->format('Y-m-d H:i:s');		
		
	$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A3', '#')		
            ->setCellValue('B3', 'Placas')		
            ->setCellValue('C3', 'Tipo')		
			->setCellValue('D3', 'Tarifa x minuto')		
            ->setCellValue('E3', 'Ingreso')		
            ->setCellValue('F3', 'Salida')		
            ->setCellValue('G3', 'Tiempo (min)')		
            ->setCellValue('H3', 'Topal a pagar');					

	$objPHPExcel->getActiveSheet()->setSharedStyle($negro, "A3:H3");
	$objPHPExcel->getActiveSheet()->getStyle("A3:H3")->applyFromArray($blanca);
	
	$sql="select a.placas,b.tipo,a.tarifa,DATE_FORMAT(a.ingreso, '%d/%m/%Y %H:%i:%s'),DATE_FORMAT(a.salida, '%d/%m/%Y %H:%i:%s'),TIMESTAMPDIFF(MINUTE,a.ingreso,a.salida),a.monto,a.estatus from estancias a inner join tipos b on(a.idtipo=b.idtipo) where a.ingreso between '".$_GET["f1"]."' and '".$_GET["f2"]."' order by a.ingreso";
		
	$buscar=mysqli_query($cnx,$sql);
	
	$clr=$gris;
	$p=4;
	$c=1;
	
    while($row=mysqli_fetch_array($buscar)){
	
		$salida="";
		$tiempo="";
		$total="";
		
		if($row[7]>0){ 
			$salida=$row[4];
			$tiempo=$row[5];
			$total=$row[6];
		}

		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A'.$p, $c)
        ->setCellValue('B'.$p, $row[0])
		->setCellValue('C'.$p, $row[1])
        ->setCellValue('D'.$p, $row[2])
        ->setCellValue('E'.$p, $row[3])
        ->setCellValue('F'.$p, $salida)
        ->setCellValue('G'.$p, $tiempo)
        ->setCellValue('H'.$p, $total);
		$objPHPExcel->getActiveSheet()->setSharedStyle($clr, "A".$p.":H".$p);

		if($clr==$gris)
			$clr=$blanco;
		else
			$clr=$gris;		
			
		$p++;
		$c++;
	}
	
	
	
	
	
	mysqli_close($cnx);
	
	$d11=$d1->format('Y-m-d H i s');
	$d22=$d2->format('Y-m-d H i s');
		
	$titulos="Estancias_".$d11."_".$d22.".xlsx";
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header("Content-Disposition: attachment;filename=".$titulos);
	
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
	
	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0
	
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');
	exit;
}
?>