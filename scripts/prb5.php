<?php
// Para migrar temas que no estan en enfermeria o medicina
set_time_limit(300);
require('../clases/clase.General.php');

// for ($i=1; $i <= 40 ; $i++) { //carreras 
// for ($i=41; $i <= 80 ; $i++) { //carreras 
for ($i=1; $i <= 20 ; $i++) { //carreras 
  if (in_array($i, [1, 4, 63, 70, 85, 87, 95]) === false) {
    // echo "$i esta en ENF o MED <br>";
    for ($j=1; $j <=12 ; $j+1) {  //curso
      // echo "$i esta $j <br>";
      $programas = General::getProgramasForPrototipo(Conexion::getInstancia(), $i, $j);
      // echo '<pre>'.var_export($programas,true).'</pre>'; exit;
      if ($programas !== false) {
        foreach ($programas as $value) {
          $IdTituloAsignatura = $value['IdTituloAsignatura'];
          $temas = General::getTemasFromPrograma(Conexion::getInstancia(), $value);
          $kk = 0;
          if ($temas !== false) {
            foreach ($temas as $valor) {
              $idContenido = $valor['IdContenido'];
              $kk++;
              $ITema = General::InsertTemaForTitulo(Conexion::getInstancia(), $valor, $IdTituloAsignatura, $kk);
              if ($ITema > 0) { echo "Tema de TITULO migrado IdContenido:$idContenido - IdTituloNuevo:$IdTituloAsignatura <br>"; }
              else{ echo "NO MIGRADOTema de TITULO migrado IdContenido:$idContenido - IdTituloNuevo:$IdTituloAsignatura <br>"; }
              // echo $IdTituloAsignatura."<br>";
              // echo '<pre>'.var_export($valor,true).'</pre>'; exit;
            }
          }
        }
      }
    }
  }
  
}
?>