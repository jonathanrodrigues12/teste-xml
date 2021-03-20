<?php
  include '../classes/nota_fiscal.php';
  $xml = $_FILES['xml'];
  $c2 = new NotaFiscal(NULL,NULL,NULL,NULL,NULL,$xml);
  echo $c2->uploadNota();




 ?>
