<?php
// Load the database configuration file
include_once 'database.php';

$nombre_completo = $correo = $dpi = $contrasena = $vacuna = $dosis_puestas = $fecha_dosis = $centro_vacunacion = "";

if(isset($_POST['cargar'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            //fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $nombre_completo  = $line[0];
                $correo  = $line[1];
                $dpi  = $line[2];
                $contrasena = $line[3];
                $vacuna  = $line[4];
                $dosis_puestas = $line[5];
                $fecha_dosis  = $line[6];
                $centro_vacunacion = $line[7];

                // Insert member data in the database
                //$conn->query("INSERT INTO registro_vacunas (nombre_completo, correo, dpi, contrasena, vacuna, dosis_puestas, fecha_dosis, centro_vacunacion) VALUES ('".$nombre_completo."', '".$correo."', '".$dpi."', '".$contrasena."', '".$vacuna."', '".$dosis_puestas."', '".$fecha_dosis."', '".$centro_vacunacion."')");
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
                        // Records updated successfully. 
                        header("location: tabla_vacunas.php".$qstring);
                        exit();
                    } else{
                        echo "Something went wrong. Please try again later.";
                    }
                }
                
                // Close statement
                mysqli_stmt_close($stmt);
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

?>

