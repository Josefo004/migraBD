<?php
// colocar tipos de programa a los programas generales
// para llenar la tabla pProgramaAsignatura
// select * from pProgramaAsignatura
require('../clases/clase.General.php');
$tr = []; // materias y cursos
// for ($i=1; $i <= 40 ; $i++) { //carreras 
// for ($i=41; $i <= 80 ; $i++) { //carreras 
for ($i=81; $i <= 116 ; $i++) { //carreras 
  for ($j=1; $j <=1 ; $j++) { //cursos 
    $asignaturas = General::getAsignaturasByPrograma(Conexion::getInstancia(), '2023', $i, $j);
    if (!$asignaturas === false) {
      foreach ($asignaturas as &$value) {
        unset($value[0]);
        unset($value[1]);
        $value['Curso'] = $j;
        array_push($tr, $value);
      }
    }
  }
}
foreach ($tr as $valor) {
  $ca = $valor['Carrera'];
  $si = $valor['SiglaMateria'];
  $cu = $valor['Curso']; 
  $asig = General::getIdAsignatura(Conexion::getInstancia(), $ca, $si, $cu);
  if (!$asig === false) 
  {
    $ida = $asig[0]['IdAsignatura'];
    $car = $asig[0]['CodigoCarrera'];
    $tipo = 1;
    if (in_array($car, ['4', '63', '70', '85', '87', '95'])) { $tipo = 2; }
    if ($car === '1') { $tipo = 3; }
    $sql = "INSERT INTO pProgramaAsignatura (IdAsignatura, IdTipoProgAsig) VALUES ('$ida', '$tipo'); <br>";
    echo $sql;
    // echo '<pre>'.var_export($asig,true).'</pre>'; exit;
  }
  // echo $valor['Carrera'].', '.$valor['SiglaMateria'].', '.$valor['Curso'].'<br>';
}
// echo '<pre>'.var_export($tr,true).'</pre>';
// foreach ($asignaturas as $valor) {
//   echo $valor['SiglaMateria'].'<br>';
// }

?>