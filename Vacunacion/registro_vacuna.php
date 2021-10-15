<?php
// Include config file
require_once "database.php";


$pdo = new PDO('mysql:host=localhost:3306;dbname=vacunacion', 'root', '');


$select_vacunas = "SELECT * FROM lista_vacunas";
$select_vacunas_stmt = $pdo->prepare($select_vacunas);
$select_vacunas_stmt->execute();
$rows_vacuna = $select_vacunas_stmt->fetchAll();

$select_centro_vacunacion = "SELECT * FROM locales";
$select_centro_vacunacion_stmt = $pdo->prepare($select_centro_vacunacion);
$select_centro_vacunacion_stmt->execute();
$rows_centro_vacunacion = $select_centro_vacunacion_stmt->fetchAll();


$nombre_completo = $correo = $dpi = $contrasena = $vacuna = $dosis_puestas = $fecha_dosis = $centro_vacunacion = "";
$nombre_completo_err = $correo_err = $dpi_err = $contrasena_err = $vacuna_err = $dosis_puestas_err = $fecha_dosis_err = $centro_vacunacion_err= "";

$fecha_dosis = " ";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    
    // Get hidden input value
    $id = $_POST["id"];
        
    $input_vacuna = trim($_POST["vacuna"]);
    if(empty($input_vacuna)){
        $vacuna_err = "Ingrese el vacuna";     
    } else{
        $vacuna = $input_vacuna;
    }
    // Validate nombre_completo
    $input_nombre_completo = trim($_POST["nombre_completo"]);
    if(empty($input_nombre_completo)){
        $nombre_completo_err = "Ingrese el nombre_completo";     
    } else{
        $nombre_completo = $input_nombre_completo;
    }
    
    // Validate correo
    $input_correo = trim($_POST["correo"]);
    if(empty($input_correo)){
        $correo_err = "Ingrese el número de correo.";     
    } else{
        $correo = $input_correo;
    }
    // Validate dpi
    $input_dpi = trim($_POST["dpi"]);
    if(empty($input_dpi)){
        $dpi_err = "Ingrese el número de dpi.";     
    } else{
        $dpi = $input_dpi;
    }
    
    // Validate dosis_puestas
    $input_dosis_puestas = trim($_POST["dosis_puestas"]);
    if(empty($input_dosis_puestas)){
        $dosis_puestas_err = "Ingrese el tipo de dosis_puestas";     
    } else{
        $dosis_puestas = $input_dosis_puestas;
    }

    // Validate fecha_dosis
    $input_fecha_dosis = trim($_POST["fecha_dosis"]);
    if(empty($input_fecha_dosis)){
        $fecha_dosis_err = "Error";     
    } else{
        $fecha_dosis = $input_fecha_dosis;
    }
    // Validate fecha_dosis
    $input_contrasena = trim($_POST["contrasena"]);
    if(empty($input_contrasena)){
        $contrasena_err = "Error";     
    } else{
        $contrasena = $input_contrasena;
    }

    // Validate fecha_dosis
    $input_centro_vacunacion = trim($_POST["centro_vacunacion"]);
    if(empty($input_centro_vacunacion)){
        $centro_vacunacion_err = "Error";     
    } else{
        $centro_vacunacion = $input_centro_vacunacion;
    }

    // Check input errors before inserting in database
    if(empty($dpi_err) && empty($nombre_completo_err)){
        // Prepare an update statement
        $sql = "INSERT INTO registro_vacunas (nombre_completo, correo, dpi, contrasena, vacuna, dosis_puestas, fecha_dosis, centro_vacunacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";        
 

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepadosis_puestas statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_nombre_completo, $param_correo, $param_dpi, $param_contrasena, $param_vacuna, $param_dosis_puestas, $param_fecha_dosis, $centro_vacunacion);
        
            // Set parameters            
            $param_nombre_completo = $nombre_completo;
            $param_correo = $correo;
            $param_dpi = $dpi;
            $param_contrasena =$contrasena;
            $param_vacuna = $vacuna;
            $param_dosis_puestas = $dosis_puestas;
            $param_fecha_dosis = $fecha_dosis;          
            $param_centro_vacunacion = $centro_vacunacion;                                                                                                                                                                                                                                                                                                                                                                                                                          

            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. dosis_puestasirect to landing page
                header("location: vacunas.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);  
} 

?>


<!DOCTYPE html>
<html>
<title>Registro de Vacuna</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

.page-header h2{
    margin-top: 50px;
    margin-right: -20px;;
}

select{
    width: 100%;
    margin-top: 5px;
    margin-bottom: 10px;
}
                
.w3-bar {
    background-color: color: #a93338;
}          
          



        </style>
        <script type="text/javascript">
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>
    
        <script> 
        function w3_open() {
          document.getElementById("mySidebar").style.display = "block";
        }

        function w3_close() {
          document.getElementById("mySidebar").style.display = "none";
        }
        </script>
    
    
<body class="w3-light-grey">
<!-- Top container -->
<!-- BODY TEXT HERE-->

<div style="margin: auto; max-width: 600px;">
<br>
<br>
<br>
  <div class="container-fluid">
    <div class="wrapper">    
        <div class="w3-white w3-padding-large w3-padding-32 w3-margin-top" style="text-align: center;">
                    <h3>Registrarse para la Vacuna</h3>
                    <hr>
                    <p>Porfavor llena la siguiente información: </p>
                    <br>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        <br>
                        <div class="form-group <?php echo (!empty($nombre_completo_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre Completo</label><br>
                            <input type="text" name="nombre_completo" class="form-control" style="width: 300px;" value="<?php echo $nombre_completo; ?>"><br>
                            <span class="help-block"><?php echo $nombre_completo_err;?></span>
                        </div>
                        <br>
                        <div class="form-group <?php echo (!empty($correo_err)) ? 'has-error' : ''; ?>">
                            <label>Correo Electrónico</label><br>
                            <input type="text" name="correo" class="form-control" style="width: 300px;" value="<?php echo $correo; ?>"><br>
                            <span class="help-block w3-light-grey"><?php echo $correo_err;?></span>
                        </div>
                        <br>
                        <div class="form-group <?php echo (!empty($dpi_err)) ? 'has-error' : ''; ?>">
                            <label>DPI</label><br>
                            <input type="text" name="dpi" class="form-control" style="width: 300px;" value="<?php echo $dpi; ?>"><br>
                            <span class="help-block"><?php echo $dpi_err;?></span>
                        </div>
                        <br>
                        <div class="form-group <?php echo (!empty($contrasena_err)) ? 'has-error' : ''; ?>">
                            <label>Contraseña</label><br>
                            <input type="text" name="contrasena" class="form-control" style="width: 300px;" value="<?php echo $contrasena; ?>"><br>
                            <span class="help-block"><?php echo $contrasena_err;?></span>
                        </div>
                        <br>
                        <div class="form-group <?php echo (!empty($vacuna_err)) ? 'has-error' : ''; ?>">
                            <label>Vacuna</label>
                            <br>                            
                            <select name="vacuna" style="width: 300px;"class="form-control">
                                    <option value="">...</option>
                                    <?php                            
                                        foreach($rows_vacuna as $row_vacuna){
                                            echo '<option value="'.$row_vacuna['vacuna'].'">'.$row_vacuna['vacuna'].'</option>';                                        
                                        }                            
                                    ?>    
                                </select>
                        </div>
                        <br>
                        <div class="form-group <?php echo (!empty($dosis_puestas_err)) ? 'has-error' : ''; ?>">
                            <label>Número de Dosis Puestas</label><br>
                            <input type="text" name="dosis_puestas" class="form-control" style="width: 300px;" value="CERO" readonly><br>
                            <span class="help-block"><?php echo $dosis_puestas_err;?></span>
                        </div>                    
                        <br>
                        <div class="form-group <?php echo (!empty($fecha_dosis_err)) ? 'has-error' : ''; ?>">
                            <label>Fecha de Siguiente Dosis</label><br>
                            <input style="width: 300px;" type="text" id="datefield" name="fecha_dosis" min='1899-01-01' max='2000-13-13' class="form-control w3-light-grey" value="0000-00-00" readonly><br>
                            <span class="help-block"><?php echo $fecha_dosis_err;?></span>
                        </div>                                                                    
                        <br>
                        <div class="form-group <?php echo (!empty($centro_vacunacion_err)) ? 'has-error' : ''; ?>">
                            <label>Centro de Vacunación</label>
                            <br>                            
                            <select name="centro_vacunacion" style="width: 300px;"class="form-control">
                                    <option value="">...</option>
                                    <?php                            
                                        foreach($rows_centro_vacunacion as $row_centro_vacunacion){
                                            echo '<option value="'.$row_centro_vacunacion['local'].'">'.$row_centro_vacunacion['local'].'</option>';                                        
                                        }                            
                                    ?>    
                                </select>
                        </div>
                        <br>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="w3-blue w3-button" style="margin-right: 7px;" value="Ingresar">
                        <a href="vacunas.php" class="w3-dosis_puestas w3-button" style="margin-left: 5px;">Cancelar</a>
                    </form>
            </div>
        </div>    
    </div>
  </div>  
</div>    
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>