<?php
include 'sidebar.php';

$dsn = 'mysql:host=localhost:3306;dbname=vacunacion';
$username = 'root';
$password = '';    


try{

    $con = new PDO($dsn, $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $ex) {

    echo 'Not Connected '.$ex->getMessage();
}


    $selectStmt = $con->query('SELECT * FROM registro_vacunas');
    $selectStmt->  execute();
    $conexiones = $selectStmt->fetchAll();

    $tableContent = '';

    foreach($conexiones as $conexion){
        $tableContent = $tableContent.'<tr>'
            .'<td width="5%">'.$conexion['id'].'</td>'
            .'<td width="10%">'.$conexion['nombre_completo'].'</td>'
            .'<td width="10%">'.$conexion['correo'].'</td>'
            .'<td width="10%">'.$conexion['dpi'].'</td>'
            .'<td width="10%">'.$conexion['contrasena'].'</td>' 
            .'<td width="10%">'.$conexion['vacuna'].'</td>'
            .'<td width="10%">'.$conexion['dosis_puestas'].'</td>'
            .'<td width="10%">'.$conexion['fecha_dosis'].'</td>' 
            .'<td width="10%">'.$conexion['centro_vacunacion'].'</td>'                                
            .'<td width="5%">                                                                        
                    <a href="agendar_vacuna.php?id='. $conexion['id'] .'" title="Editar Vacunación" data-toggle="tooltip"><span class="fa fa-edit"></span></a>
            </td>';
            $id = $conexion['id'];
            $nombre_completo = $conexion['nombre_completo'];   
            $correo = $conexion['correo'];
            $dpi = $conexion['dpi'];       
            $contrasena = $conexion['contrasena'];
            $vacuna = $conexion['vacuna'];    
            $dosis_puestas = $conexion['dosis_puestas'];    
            $fecha_dosis = $conexion['fecha_dosis'];    
            $centro_vacunacion = $conexion['centro_vacunacion'];
    }


    // Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Los usuarios se han importado existosamente.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Listado de Vacunación</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
  <body>

<div style="height: 100px"></div>  
<div class="table-container"> 
    <h2>Control de Usuarios del Sistema</h2> 
    <form action="carga_masiva.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" />
        <input type="submit" name="cargar" value="CARGAR USUARIOS" class="w3-button w3-blue">      
    </form>
            <!-- Display status message -->
        <?php if(!empty($statusMsg)){ ?>
        <div class="col-xs-12">
            <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
        </div>
        <?php } ?>
    <table id="tabla">
        <tr>
            <th>id</th>
            <th>Nombre Completo</th>
            <th>Correo</th>
            <th>DPI</th>
            <th>Contraseña</th>
            <th>Vacuna</th>
            <th>Cantidad de Dosis Puestas</th>
            <th>Fecha Siguiente Dosis</th>
            <th>Centro de Vacunacion</th>            
            <th>Acción</th>
        </tr>
        <?php
            echo $tableContent;
        ?>
</div>
</table>
</body>
</html>