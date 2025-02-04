<?php
	include("Alumno.php");
    class Conexion {
        public $url = "localhost";
        public $user = "root";
        public $psw = "";
        public $bd = "Tec_web";
        public $port = 3306;
        public $mysqli;

        function __construct() {
            $this->mysqli = mysqli_connect($this->url, $this->user, $this->psw, $this->bd, $this->port);
        }

        public function registrarAlumno($alumno){        
            $query = "CALL ProcedureAlumno (1, '$alumno->boleta', '$alumno->nombre', '$alumno->paterno', '$alumno->materno',
                 '$alumno->email', '$alumno->nacimiento', '$alumno->genero', '$alumno->curp', '$alumno->calle', 
                 '$alumno->colonia', '$alumno->cp', '$alumno->tel', '$alumno->promedio', '$alumno->opcion', 
                 $alumno->procedencia, '$alumno->otra', $alumno->estado)";
            $this->mysqli->query($query);
        } 

        public function consultarAlumno($boleta){
            $alumno = new Alumno;
            $query = "Call procedureAlumno(2, '$boleta', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0)";
            if($result =  $this->mysqli->query($query)){
                while ($row = mysqli_fetch_assoc($result)){
                    $alumno->boleta = $row['boleta'];  
                    $alumno->nombre = $row['nombre'];
                    $alumno->paterno = $row['apellidoPat'];
                    $alumno->materno = $row['apellidoMat'];
                    $alumno->email = $row['email'];
                    $alumno->nacimiento = $row["nacimiento"];
                    $alumno->genero = $row['genero'];
                    $alumno->curp = $row['curp'];
                    $alumno->calle = $row['calle'];
                    $alumno->colonia = $row['colonia'];
                    $alumno->cp = $row['cp'];
                    $alumno->tel = $row['tel'];
                    $alumno->promedio = $row['promedio'];
                    $alumno->opcion = $row['opcionEscom'];
                    $alumno->procedencia = $row['escuela'];
                    $alumno->estado = $row['estado'];
                    $alumno->laboratorio = $row['laboratorio'];
                    $alumno->hora = $row['hora'];
                    $alumno->fechaAplicacion = $row['fecha'];
                }
            }
            return $alumno;
        }

        public function editarAlumno($alumno){
            $query = "CALL ProcedureAlumno (3, '$alumno->boleta', '$alumno->nombre', '$alumno->paterno', '$alumno->materno',
                 '$alumno->email', '$alumno->nacimiento', '$alumno->genero', '$alumno->curp', '$alumno->calle', 
                 '$alumno->colonia', '$alumno->cp', '$alumno->tel', '$alumno->promedio', '$alumno->opcion', 
                 $alumno->procedencia, '$alumno->otra', $alumno->estado)";
            $this->mysqli->query($query);
        }

        public function eliminarAlumno($boleta){
            $query = "Call procedureAlumno(4, '$boleta', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0)";
            $this->mysqli->query($query);
        }

        public function consultarTodosAlumnos(){ //Devuvelve un array de alumnos    
            $Alumnos= [];
            $query = "Call procedureAlumno(5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0);";
            if($result =  $this->mysqli->query($query)){
                while ($row = mysqli_fetch_assoc($result)){
                    $alumno = new Alumno;
                    $alumno->boleta = $row['boleta'];  
                    $alumno->nombre = $row['nombre'];
                    $alumno->paterno = $row['apellidoPat'];
                    $alumno->materno = $row['apellidoMat'];
                    $alumno->email = $row['email'];
                    $alumno->nacimiento = $row["nacimiento"];
                    $alumno->genero = $row['genero'];
                    $alumno->curp = $row['curp'];
                    $alumno->calle = $row['calle'];
                    $alumno->colonia = $row['colonia'];
                    $alumno->cp = $row['cp'];
                    $alumno->tel = $row['tel'];
                    $alumno->promedio = $row['promedio'];
                    $alumno->opcion = $row['opcionEscom'];
                    $alumno->procedencia = $row['escuela'];
                    $alumno->estado = $row['estado'];
                    $alumno->laboratorio = $row['laboratorio'];
                    $alumno->hora = $row['hora'];
                    $alumno->fechaAplicacion = $row['fecha'];
                    array_push($Alumnos, $alumno);
                }
            }
            return $Alumnos;
        }
    }
?>