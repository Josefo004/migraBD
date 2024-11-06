<?php
set_time_limit(300);
require('../clases/clase.General.php');
$ii = 0;
// for ($i=1; $i <= 40 ; $i++) { //carreras 
// for ($i=41; $i <= 80 ; $i++) { //carreras 
for ($i=81; $i <= 116 ; $i++) { //carreras 
  for ($j=1; $j <=12 ; $j++) { //cursos 
    $titulos = General::getForUpdate(Conexion::getInstancia(), $i, $j);
    if (!$titulos === false) {
      foreach ($titulos as $valor) {
        $id = $valor['IdTituloAsignatura'];
        $de = $valor['DET'];
        $ii ++;
        //echo $valor['IdTituloAsignatura'].' - '.$valor['DET'].' <hr>';
        $re = General::UpdateTitulo(Conexion::getInstancia(), $id, $de);
        if ($re > 0) { echo "$ii ACTUALIZADO ID: $id :<br>"; }
        else { echo "$ii NOOOO!! UPDATED ID: $id : ".$valor['Titulo']."<br>"; }
      }
    }
  }
}
?>