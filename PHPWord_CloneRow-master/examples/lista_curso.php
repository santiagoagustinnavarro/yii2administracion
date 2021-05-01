<?php
	// examples

	header ("Content-type: text/html; charset=utf-8");

	require_once '../PHPWord.php';

	$PHPWord = new PHPWord();
	$document_path = "lista_curso.docx";
	$document = $PHPWord->loadTemplate(	$document_path );

	// simple parsing

	$coleccion []= array('apellido' => 'benitez','nombre' =>'carlos','cuil' =>'20-28484792-2');
	$coleccion []= array('apellido' => 'Martinez','nombre' =>'Alejandro','cuil' =>'20-24484742-1');


	foreach ($coleccion as $persona) {
			$nombre[] = $persona['nombre'];
			$apellido[] =$persona['apellido'];
			$cuil[] = $persona['cuil'];
	}

	$data1 = array('apellido' => $apellido,'nombre' =>$nombre,'cuil' =>$cuil);

	$document->cloneRow('TBL1', $data1);

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


?>
