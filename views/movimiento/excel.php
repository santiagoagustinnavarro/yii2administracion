
<?php
// link: https://www.drupal.org/forum/support/module-development-and-code-questions/2018-08-17/using-phpofficephpspreadsheet
use yii\web\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


$filename = "movimientos.xls";
$fileType = 'Xls';
$file =  '../templates/movimientos.xls';
$templateExcel = IOFactory::load($file);


  $templateExcel->getActiveSheet()->setCellValue('A2', 'Fecha');
	$templateExcel->getActiveSheet()->setCellValue('B2', 'Movimiento');
	$templateExcel->getActiveSheet()->setCellValue('C2', 'Razón social');
	$templateExcel->getActiveSheet()->setCellValue('D2', 'Neto sin IVA');
	$templateExcel->getActiveSheet()->setCellValue('E2', '21% IVA');
	$templateExcel->getActiveSheet()->setCellValue('F2', 'Percepción');




$row = 3;
foreach( $coleccion as  $obj) {


     $templateExcel->getActiveSheet()
		->setCellValue('A'.$row, date('d-m-Y', strtotime($obj->fecha) ) ) 
	  ->setCellValue('B'.$row, $obj->tipo->nombre )
	  ->setCellValue('C'.$row, $obj->razon->nombre )
	  ->setCellValue('D'.$row, $obj->importe )
	  ->setCellValue('E'.$row, $obj->iva )
		->setCellValue('F'.$row, $obj->percepcion_monto);


		 $row = $row + 1;
}



/// guarda el archivo
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter( $templateExcel, $fileType );
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$filename.'"');
ob_end_clean();

$writer->save("php://output");

exit;
