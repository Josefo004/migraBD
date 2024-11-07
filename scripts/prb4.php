<?php
// para insertar temas de cada modulo
set_time_limit(300);
require('../clases/clase.General.php');
$medicina = [
  ['IdAsignatura' => 56084, 'IdPersona' => '5489259', 'ID2' => 1, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'LIN401', 'Curso' => 1, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 8],
  ['IdAsignatura' => 53831, 'IdPersona' => '1085809', 'ID2' => 3, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'MOR403', 'Curso' => 1, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 34],
  ['IdAsignatura' => 53703, 'IdPersona' => '1036790', 'ID2' => 2, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'MOR401', 'Curso' => 1, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 21],
  ['IdAsignatura' => 53966, 'IdPersona' => '3617821', 'ID2' => 5, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'SLP404', 'Curso' => 1, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 60],
  ['IdAsignatura' => 53088, 'IdPersona' => '1145077', 'ID2' => 4, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'MOR407', 'Curso' => 1, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 47],
  ['IdAsignatura' => 53265, 'IdPersona' => '1034503', 'ID2' => 11, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'SLP505', 'Curso' => 2, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 138],
  ['IdAsignatura' => 52991, 'IdPersona' => '1324690', 'ID2' => 6, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'FSL500', 'Curso' => 2, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 73],
  ['IdAsignatura' => 54568, 'IdPersona' => '1034140', 'ID2' => 7, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'FSL505', 'Curso' => 2, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 86],
  ['IdAsignatura' => 56068, 'IdPersona' => '3587158', 'ID2' => 8, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'LIN502', 'Curso' => 2, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 99],
  ['IdAsignatura' => 53006, 'IdPersona' => '1060775', 'ID2' => 9, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'PAT502', 'Curso' => 2, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 112],
  ['IdAsignatura' => 53202, 'IdPersona' => '1034130', 'ID2' => 10, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'PAT505', 'Curso' => 2, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 125],
  ['IdAsignatura' => 53386, 'IdPersona' => '1069647', 'ID2' => 12, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'CIR605', 'Curso' => 3, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 151],
  ['IdAsignatura' => 51601, 'IdPersona' => '1432489', 'ID2' => 17, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'PAT615', 'Curso' => 3, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 216],
  ['IdAsignatura' => 53047, 'IdPersona' => '1000342', 'ID2' => 14, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'MED600', 'Curso' => 3, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 177],
  ['IdAsignatura' => 52993, 'IdPersona' => '5698119', 'ID2' => 16, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'PAT614', 'Curso' => 3, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 203],
  ['IdAsignatura' => 53890, 'IdPersona' => '1033235', 'ID2' => 18, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'SLM601', 'Curso' => 3, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 229],
  ['IdAsignatura' => 52670, 'IdPersona' => '1146000', 'ID2' => 13, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'FSL611', 'Curso' => 3, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 164],
  ['IdAsignatura' => 53045, 'IdPersona' => '1008712', 'ID2' => 15, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'MED614', 'Curso' => 3, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 190],
  ['IdAsignatura' => 55022, 'IdPersona' => '1147833', 'ID2' => 30, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'SLP705', 'Curso' => 4, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 385],
  ['IdAsignatura' => 53546, 'IdPersona' => '1078746', 'ID2' => 29, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'MED809', 'Curso' => 4, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 372],
  ['IdAsignatura' => 52927, 'IdPersona' => '1031331', 'ID2' => 21, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'CIR710', 'Curso' => 4, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 268],
  ['IdAsignatura' => 54711, 'IdPersona' => '1078309', 'ID2' => 22, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'CIR711', 'Curso' => 4, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 281],
  ['IdAsignatura' => 53889, 'IdPersona' => '1033235', 'ID2' => 25, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'MED703', 'Curso' => 4, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 320],
  ['IdAsignatura' => 53702, 'IdPersona' => '1036790', 'ID2' => 23, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'CIR715', 'Curso' => 4, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 294],
  ['IdAsignatura' => 54074, 'IdPersona' => '1034145', 'ID2' => 24, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'MED700', 'Curso' => 4, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 307],
  ['IdAsignatura' => 53559, 'IdPersona' => '1107859', 'ID2' => 19, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'CIR703', 'Curso' => 4, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 242],
  ['IdAsignatura' => 54751, 'IdPersona' => '4118258', 'ID2' => 26, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'MED704', 'Curso' => 4, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 333],
  ['IdAsignatura' => 54680, 'IdPersona' => '1112324', 'ID2' => 28, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'MED710', 'Curso' => 4, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 359],
  ['IdAsignatura' => 53264, 'IdPersona' => '1034210', 'ID2' => 20, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'CIR709', 'Curso' => 4, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 255],
  ['IdAsignatura' => 53412, 'IdPersona' => '1034091', 'ID2' => 27, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'MED708', 'Curso' => 4, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 346],
  ['IdAsignatura' => 54477, 'IdPersona' => '1057577', 'ID2' => 34, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'MED807', 'Curso' => 5, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 437],
  ['IdAsignatura' => 53011, 'IdPersona' => '1079494', 'ID2' => 35, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'MED808', 'Curso' => 5, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 450],
  ['IdAsignatura' => 52100, 'IdPersona' => '1054728', 'ID2' => 31, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'CIR806', 'Curso' => 5, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 398],
  ['IdAsignatura' => 53063, 'IdPersona' => '1037915', 'ID2' => 33, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'MED717', 'Curso' => 5, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 424],
  ['IdAsignatura' => 52735, 'IdPersona' => '1054080', 'ID2' => 38, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'MED815', 'Curso' => 5, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 489],
  ['IdAsignatura' => 53975, 'IdPersona' => '1034395', 'ID2' => 41, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'SLP806', 'Curso' => 5, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 528],
  ['IdAsignatura' => 54077, 'IdPersona' => '1048251', 'ID2' => 39, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'MTI810', 'Curso' => 5, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 502],
  ['IdAsignatura' => 54609, 'IdPersona' => '1254650', 'ID2' => 40, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'PAT837', 'Curso' => 5, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 515],
  ['IdAsignatura' => 54447, 'IdPersona' => '3653356', 'ID2' => 36, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'MED810', 'Curso' => 5, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 463],
  ['IdAsignatura' => 52774, 'IdPersona' => '1033018', 'ID2' => 32, 'Carrera' => 1, 'Gestion' => '2023', 'SiglaMateria' => 'CIR810', 'Curso' => 5, 'TipoAsignatura' => 'M', 'IdTituloAsignatura' => 411]
];
foreach ($medicina as $valor) {
  $re = General::getModulos(Conexion::getInstancia(), $valor);
  if (!$re === false) {
    $idt = $valor['IdTituloAsignatura'];
    $kk = 0;
    foreach ($re as $value) {
      $kk ++;
      // $id = $value['IdModulo'];
      // $com = $value['Competencias'];
      // // echo $com.'<hr>';
      // $md = General::InsertModulo(Conexion::getInstancia(), $idt, $kk, $com);
      // if ($md > 0) { echo "ID MODULO BASE ANTIGUA :".$value['IdModulo'].'</br>'; }
      // else {echo "NO SE PUDO MIGRAR EL ID MODULO BASE ANTIGUA :".$value['IdModulo'].'</br>';}
    }
  }
}

// echo '<pre>'.var_export($re,true).'</pre>'; 
?>