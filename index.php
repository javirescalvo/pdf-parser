<?php

require "vendor/autoload.php";

// Parse pdf file and build necessary objects.
$parser = new \Smalot\PdfParser\Parser();
$pdf    = $parser->parseFile('2.pdf');
 
$text = $pdf->getText();
$txt = str_split($text);
$captura = false;
$capturado = array();
$palabra = 0;
foreach($txt as &$t){
	if($t=='('){
		$captura = true;
		$palabra++;
		$capturado[$palabra] = "$t";
	}elseif($captura && $t!=')'){
		$capturado[$palabra] .= $t;
	}elseif($t==')'){
		$capturado[$palabra] .=")<br>";
		$captura=false;
	}else{
		$t='';
	}
		
}

var_dump($capturado);