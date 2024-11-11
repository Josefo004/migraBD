<?php
// Para migrar temas que no estan en enfermeria o medicina
set_time_limit(300);
require('../clases/clase.General.php');
require('./prb5de.php');

// $unidades = [  ['UnidadAntigua' => 708, 'IdNuevo' => 1], ...] 

foreach ($unidades as $valor) {
  $UnidadAntigua = $valor['UnidadAntigua'];
  $IdNuevo = $valor['IdNuevo'];

  $temas = General::getTemasFromUnidadesA(Conexion::getInstancia(), $UnidadAntigua);
  $kk = 0;
  if ($temas !== false) {
    foreach ($temas as $value) {
      $IdContenido = $value['IdContenido'];
      $tema = General::getTemasByID(Conexion::getInstancia(), $IdContenido);
      echo '<pre>'.var_export($value,true).'</pre>'; 
      echo '<pre>'.var_export($tema,true).'</pre>'; exit;
    }
  }
}



  // $temas = General::getTemasFromUnidadesA(Conexion::getInstancia(), $UnidadAntigua);
  // $kk = 0;
  // if ($unidades !== false) {
  //   foreach ($unidades as $value) {
  //     $IdUnidad = $value['IdUnidad'];
  //     $kk++;
  //     $NUnidad = General::InsertNuevaUnidad(Conexion::getInstancia(), $value, $IdTituloAsignatura, $kk);
  //     if ($NUnidad > 0) { echo "Unidad Migrada IdUnidadANTIGUA:$IdUnidad - NUnidad:$NUnidad <br>"; }
  //     else { echo "Unidad NOOOOO Migrada! IdUnidadANTIGUA:$IdUnidad <br>"; }
  //   }
  //   // echo '<pre>'.var_export($unidades,true).'</pre>';
  // }
?>