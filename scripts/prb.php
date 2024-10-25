<?php
require('../clases/clase.General.php');
$prb = General::sqlPrb(Conexion::getInstancia(), '2023', '1', '1');
echo '<pre>'.var_export($prb,true).'</pre>';
echo $prb;
?>