<?php
require('../clases/clase.General.php');
for ($i=1; $i <= 1 ; $i++) { //carreras 
// for ($i=41; $i <= 80 ; $i++) { //carreras 
// for ($i=81; $i <= 116 ; $i++) { //carreras 
  for ($j=1; $j <=1 ; $j++) { //cursos 
    $titulos = General::getForUpdate(Conexion::getInstancia(), $i, $j);
    if (!$titulos === false) {
      foreach ($titulos as $valor) {
        $id = $valor['IdTituloAsignatura'];
        $de = $valor['DET'];
        //echo $valor['IdTituloAsignatura'].' - '.$valor['DET'].' <hr>';
        $re = General::UpdateTitulo(Conexion::getInstancia(), $id, $de);
        if ($re == 1) { echo "UPDATED $re<br>"; }
        else { echo "NOOOO UPDATED $id<br>"; }
      }
    }
  }
  }
?>