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

  public static function getForUpdate($conexion, $carrera, $curso)
  {
    $sql = "WITH CTE AS
            (
              SELECT er.Descripcion, er.Relaciones, er.ObjetivoG, er.ObjetivosEspecificos, er.Indicaciones, er.Recursos, er.Actividades, er.Evaluacion, er.Bibliografia,
              er.IdAsignatura, er.IdPersona, ID2=pa.IdAsignatura, er.Carrera, er.Gestion, er.SiglaMateria, pa.Curso, pa.TipoAsignatura,
              ROW_NUMBER() OVER (PARTITION BY pa.IdAsignatura, er.Carrera, er.SiglaMateria, pa.Curso ORDER BY er.IdPersona) AS NumeroLinea
              FROM Edocente2021.dbo.pAsignatura pa
              JOIN eDocente.dbo.prog_ProgramaAsignatura er ON 
                    pa.CodigoCarrera = er.Carrera
                AND pa.SiglaMateria COLLATE Modern_Spanish_CI_AS = er.SiglaMateria
                AND er.Gestion LIKE '%2023%'
            )
            SELECT 
              c.IdAsignatura, c.IdPersona, c.ID2, c.Carrera, c.Gestion, c.SiglaMateria, c.Curso, c.TipoAsignatura,
              t.IdTituloAsignatura, t.Orden, t.EsContenido, t.Titulo,
              DET = CASE WHEN c.Carrera = 1 AND t.Orden = 1 THEN c.Descripcion
                        WHEN c.Carrera = 1 AND t.Orden = 2 THEN c.ObjetivoG
                        WHEN c.Carrera = 1 AND t.Orden = 3 THEN c.ObjetivosEspecificos
                        WHEN c.Carrera = 1 AND t.Orden = 4 THEN c.Relaciones
                        WHEN c.Carrera = 1 AND t.Orden = 9 THEN c.Recursos
                        WHEN c.Carrera = 1 AND t.Orden = 10 THEN c.Actividades
                        WHEN c.Carrera = 1 AND t.Orden = 13 THEN c.Bibliografia
                        WHEN c.Carrera IN (4, 63, 70, 85, 87, 95) AND t.Orden = 1 THEN c.Descripcion
                        WHEN c.Carrera IN (4, 63, 70, 85, 87, 95) AND t.Orden = 2 THEN c.Relaciones
                        WHEN c.Carrera IN (4, 63, 70, 85, 87, 95) AND t.Orden = 3 THEN c.ObjetivoG
                        WHEN c.Carrera IN (4, 63, 70, 85, 87, 95) AND t.Orden = 6 THEN c.Evaluacion
                        WHEN c.Carrera IN (4, 63, 70, 85, 87, 95) AND t.Orden = 8 THEN c.Bibliografia
                        WHEN c.Carrera NOT IN (1, 4, 63, 70, 85, 87, 95) AND t.Orden = 1 THEN c.Descripcion
                        WHEN c.Carrera NOT IN (1, 4, 63, 70, 85, 87, 95) AND t.Orden = 2 THEN c.Relaciones
                        WHEN c.Carrera NOT IN (1, 4, 63, 70, 85, 87, 95) AND t.Orden = 3 THEN c.ObjetivoG
                        WHEN c.Carrera NOT IN (1, 4, 63, 70, 85, 87, 95) AND t.Orden = 4 THEN c.ObjetivosEspecificos
                        WHEN c.Carrera NOT IN (1, 4, 63, 70, 85, 87, 95) AND t.Orden = 8 THEN c.Indicaciones
                        WHEN c.Carrera NOT IN (1, 4, 63, 70, 85, 87, 95) AND t.Orden = 9 THEN c.Recursos
                        WHEN c.Carrera NOT IN (1, 4, 63, 70, 85, 87, 95) AND t.Orden = 10 THEN c.Actividades
                        WHEN c.Carrera NOT IN (1, 4, 63, 70, 85, 87, 95) AND t.Orden = 11 THEN c.Evaluacion
                        WHEN c.Carrera NOT IN (1, 4, 63, 70, 85, 87, 95) AND t.Orden = 12 THEN c.Bibliografia
                        ELSE NULL 
                    END
            FROM CTE c
            left JOIN pTitulosAsignatura t ON (c.ID2 = t.IdAsignatura)
            WHERE c.NumeroLinea = 1
              AND c.Carrera = $carrera
              and c.Curso = $curso
              -- AND c.SiglaMateria='FSL102'
            ORDER BY Carrera, Curso ";
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

  public static function UpdateTitulo($conexion, $id, $de)
  {
    $sql = "UPDATE pTitulosAsignatura SET Desglose = $de WHERE IdTituloAsignatura = $id;";
    $consulta = $conexion->prepare($sql);
    $consulta->execute();
    return $consulta->rowCount();
  }

}
?>