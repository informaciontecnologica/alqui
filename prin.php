<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include ('src/Cezpdf.php');
$pdf = new Cezpdf();
$pdf->selectFont('Helvetica');
$pdf->ezText('Hello World!',15);
$pdf->ezNewPage();
$pdf->ezText("hola segunda pagina",50);

$pdf->ezStream();
?>
