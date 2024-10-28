<?php

require_once 'clase.Conex.php';

class General {

  public static function getAsignaturasByPrograma($conexion, $gestion, $carrera, $curso)
  {
    $sql = "DECLARE 
            @Gestion VARCHAR(6) = '$gestion',
            @Carrera TINYINT = '$carrera',
            @Curso TINYINT = '$curso'

            SELECT DISTINCT pa.Carrera, pa.SiglaMateria
            from eDocente.dbo.prog_ProgramaAsignatura pa
            WHERE pa.Gestion LIKE '%'+@Gestion+'%'
              AND pa.Carrera = @Carrera 
              and pa.SiglaMateria COLLATE Modern_Spanish_CI_AS  IN (
                  select ma.SiglaMateria
              FROM Academica.dbo.Materias ma
              WHERE ma.CodigoCarrera = @Carrera
                AND ma.Curso = @Curso
                AND ma.CodigoEstadoMateria='A'
                AND (ma.HorasTeoria is not NULL or ma.HorasPractica is not NULL or ma.HorasLaboratorio is not null)
              )";
    // echo $sql; exit();
    $consulta = $conexion->prepare($sql);
    $consulta->execute();
    $arr = $consulta->errorInfo();
    
		if($arr[0]!='00000'){echo "\nPDOStatement::errorInfo():\n"; print_r($arr);}
        $registros = $consulta->fetchAll();
        if ($registros) {
			return $registros;
		} else {
			return false;
		};
  }

  public static function getIdAsignatura($conexion, $carrera, $siglaMateria, $curso)
  {
    $sql = "SELECT TOP 1 * FROM Edocente2021.dbo.pAsignatura 
            WHERE CodigoCarrera = '$carrera'
              AND SiglaMateria = '$siglaMateria'
              AND Curso = '$curso'
            ORDER BY NumeroPlanEstudios DESC";
    $consulta = $conexion->prepare($sql);
    $consulta->execute();
    $arr = $consulta->errorInfo();
    
		if($arr[0]!='00000'){echo "\nPDOStatement::errorInfo():\n"; print_r($arr);}
        $registros = $consulta->fetchAll();
        if ($registros) {
			return $registros;
		} else {
			return false;
		};
  }

}
?>