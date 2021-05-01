<?php
	// examples

	header ("Content-type: text/html; charset=utf-8");

	require_once '../PHPWord.php';

	$PHPWord = new PHPWord();
	$document = $PHPWord->loadTemplate('source.docx');

	// simple parsing
	$document->setValue('{var1}', 'value');
	$document->setValue('{var2}', 'Personas');
	$document->setValue('{var3}', 'ONE', 1);

	//* prepare data for tables
	//*	$data1 = array(
	//*		'num' => array(1,2,3,4,5),
	//*		'color' => array('chino', 'japones', 'arabe','chino','aleman'),
	//*		'code' => array('ff0000','0000ff','00ff00','ff0000','')
	//*	);

	$coleccion []= array('apellido' => 'benitez','nombre' =>'carlos','cuil' =>'20-28484792-2');
	$coleccion []= array('apellido' => 'Martinez','nombre' =>'Alejandro','cuil' =>'20-24484742-1');


	foreach ($coleccion as $persona) {
			$nombre[] = $persona['nombre'];
			$apellido[] =$persona['apellido'];
			$cuil[] = $persona['cuil'];
	}

	$data1 = array('apellido' => $apellido,'nombre' =>$nombre,'cuil' =>$cuil);
	$document->cloneRow('TBL1', $data1);


	$data2 = array(
		'val1' => array(4,5,6),
		'val2' => array('red', 'blue', 'green'),
		'val3' => array('a','b','c')
	);
	$data3 = array(
		'day' => array('Mon','Tue','Wed','Thu','Fri'),
		'dt' => array(12,14,13,11,10),
		'nt' => array(0,2,1,2,-1),
		'dw' => array('SSE at 3 mph', 'SE at 2 mph', 'S at 3 mph', 'S at 1 mph', 'Calm'),
		'nw' => array('SSE at 1 mph', 'SE at 1 mph', 'S at 1 mph', 'Calm', 'Calm')
	);
	$data4 = array(
		'val1' => array('blue 1', 'blue 2', 'blue 3'),
		'val2' => array('green 1', 'green 2', 'green 3'),
		'val3' => array('red 1', 'red 2', 'red 3')
	);

	// clone rows

	$document->cloneRow('TBL2', $data2);
	$document->cloneRow('DATA3', $data3);
	$document->cloneRow('T4', $data4);
	$document->cloneRow('DinamicTable', $data4);

	// save file


	$filename = 'result.docx';
	$document->save($filename);




	header('Content-Description: File Transfer');
	header('Content-type: application/force-download');
	header('Content-Disposition: attachment; filename='.basename($filename));
	header('Content-Transfer-Encoding: binary');
	header('Content-Length: '.filesize($filename));

	readfile( $filename);
	unlink($filename);



	print date("Y-m-d H:i:s") . " <br>";
	print "source.docx &rarr; result.docx <br>";
	print "complete.";
?>
