<?php
    include "sidebar.php";
    #include "session.php";
    #session_start();
    
    // Check if the user is logged in, if not then redirect him to login page
//    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  //      header("location: login.php");
    //    exit;
    //}

    $dsn = 'mysql:host=localhost:3306;dbname=inversr4_redoptima';
    $username = 'inversr4_96';
    $password = 'Arijos96';    

    $_SESSION["place"] = $_SESSION["establecimiento"];

    if($_SESSION["place"] == "Gran Carcha"){
        $dbTable = 'garcha';
        $ct_table_red = 'ct_carcha';
        $ct_table_operador = 'ct_carcha_operador';
        $ct_table_dtc = 'ct_carcha_dtc';
        $ct_table_rack = 'ct_carcha_rack';
        $ct_table_puerto = 'ct_carcha_puerto';
        $ct_table_odf = 'ct_carcha_odf';    
    }
    else if($_SESSION["place"] == "Peri Roosevelt"){        
        $dbTable = 'roosevelt';
        $ct_table_red = 'ct_roosevelt_red';
        $ct_table_operador = 'ct_roosevelt_operador';
        $ct_table_dtc = 'ct_roosevelt_dtc';
        $ct_table_rack = 'ct_roosevelt_rack';
        $ct_table_puerto = 'ct_roosevelt_puerto';
        $ct_table_odf = 'ct_roosevelt_odf';    
    }
    else if($_SESSION["place"] == "Miraflores"){        
        $dbTable = 'miraflores';
        $ct_table_red = 'ct_miraflores_red';
        $ct_table_operador = 'ct_miraflores_operador';
        $ct_table_dtc = 'ct_miraflores_dtc';
        $ct_table_rack = 'ct_miraflores_rack';
        $ct_table_puerto = 'ct_miraflores_puerto';
        $ct_table_odf = 'ct_miraflores_odf';    
    } 
    else if($_SESSION["place"] == "Oakland Mall"){        
        $dbTable = 'oakland';
        $ct_table_red = 'ct_oakland_red';
        $ct_table_operador = 'ct_oakland_operador';
        $ct_table_dtc = 'ct_oakland_dtc';
        $ct_table_rack = 'ct_oakland_rack';
        $ct_table_puerto = 'ct_oakland_puerto';
        $ct_table_odf = 'ct_oakland_odf';    
    }
    else if($_SESSION["place"] == "Naranjo Mall"){        
        $dbTable = 'naranjo';
        $ct_table_red = 'ct_naranjo_red';
        $ct_table_operador = 'ct_naranjo_operador';
        $ct_table_dtc = 'ct_naranjo_dtc';
        $ct_table_rack = 'ct_naranjo_rack';
        $ct_table_puerto = 'ct_naranjo_puerto';
        $ct_table_odf = 'ct_naranjo_odf';    
    }
    else if($_SESSION["place"] == "Portales"){        
        $dbTable = 'portales';
        $ct_table_red = 'ct_portales_red';
        $ct_table_operador = 'ct_portales_operador';
        $ct_table_dtc = 'ct_portales_dtc';
        $ct_table_rack = 'ct_portales_rack';
        $ct_table_puerto = 'ct_portales_puerto';
        $ct_table_odf = 'ct_portales_odf';    
    }
    else if($_SESSION["place"] == "Parque las Américas"){        
        $dbTable = 'americas';
        $ct_table_red = 'ct_americas_red';
        $ct_table_operador = 'ct_americas_operador';
        $ct_table_dtc = 'ct_americas_dtc';
        $ct_table_rack = 'ct_americas_rack';
        $ct_table_puerto = 'ct_americas_puerto';
        $ct_table_odf = 'ct_americas_odf';    
    }
    else if($_SESSION["place"] == "Plaza Andaria"){        
        $dbTable = 'andaria';
        $ct_table_red = 'ct_andaria_red';
        $ct_table_operador = 'ct_andaria_operador';
        $ct_table_dtc = 'ct_andaria_dtc';
        $ct_table_rack = 'ct_andaria_rack';
        $ct_table_puerto = 'ct_andaria_puerto';
        $ct_table_odf = 'ct_andaria_odf';    
    }
    else if($_SESSION["place"] == "AVIA1"){        
        $dbTable = 'avia1';
        $ct_table_red = 'ct_avia1_red';
        $ct_table_operador = 'ct_avia1_operador';
        $ct_table_dtc = 'ct_avia1_dtc';
        $ct_table_rack = 'ct_avia1_rack';
        $ct_table_puerto = 'ct_avia1_puerto';
        $ct_table_odf = 'ct_avia1_odf';    
    }
    else if($_SESSION["place"] == "AVIA2"){        
        $dbTable = 'avia2';
        $ct_table_red = 'ct_avia2_red';
        $ct_table_operador = 'ct_avia2_operador';
        $ct_table_dtc = 'ct_avia2_dtc';
        $ct_table_rack = 'ct_avia2_rack';
        $ct_table_puerto = 'ct_avia2_puerto';
        $ct_table_odf = 'ct_avia2_odf';    
    }
    else if($_SESSION["place"] == "Plaza del Parque"){        
        $dbTable = 'plaza';
        $ct_table_red = 'ct_plaza_red';
        $ct_table_operador = 'ct_plaza_operador';
        $ct_table_dtc = 'ct_plaza_dtc';
        $ct_table_rack = 'ct_plaza_rack';
        $ct_table_puerto = 'ct_plaza_puerto';
        $ct_table_odf = 'ct_plaza_odf';    
    }
    else if($_SESSION["place"] == "Roque"){        
        $dbTable = 'roque';
        $ct_table_red = 'ct_roque_red';
        $ct_table_operador = 'ct_roque_operador';
        $ct_table_dtc = 'ct_roque_dtc';
        $ct_table_rack = 'ct_roque_rack';
        $ct_table_puerto = 'ct_roque_puerto';
        $ct_table_odf = 'ct_roque_odf';    
    }
    else if($_SESSION["place"] == "Granat"){        
        $dbTable = 'granat';
        $ct_table_red = 'ct_granat_red';
        $ct_table_operador = 'ct_granat_operador';
        $ct_table_dtc = 'ct_granat_dtc';
        $ct_table_rack = 'ct_granat_rack';
        $ct_table_puerto = 'ct_granat_puerto';
        $ct_table_odf = 'ct_granat_odf';    
    }
    else if($_SESSION["place"] == "Plaza Magdalena"){        
        $dbTable = 'magdalena';
        $ct_table_red = 'ct_magdalena_red';
        $ct_table_operador = 'ct_magdalena_operador';
        $ct_table_dtc = 'ct_magdalena_dtc';
        $ct_table_rack = 'ct_magdalena_rack';
        $ct_table_puerto = 'ct_magdalena_puerto';
        $ct_table_odf = 'ct_magdalena_odf';    
    }
    else if($_SESSION["place"] == "Difiori"){        
        $dbTable = 'difiori';
        $ct_table_red = 'ct_difiori_red';
        $ct_table_operador = 'ct_difiori_operador';
        $ct_table_dtc = 'ct_difiori_dtc';
        $ct_table_rack = 'ct_difiori_rack';
        $ct_table_puerto = 'ct_difiori_puerto';
        $ct_table_odf = 'ct_difiori_odf';    
    }
    else if($_SESSION["place"] == "Cascata"){        
        $dbTable = 'cascata';
        $ct_table_red = 'ct_cascata_red';
        $ct_table_operador = 'ct_cascata_operador';
        $ct_table_dtc = 'ct_cascata_dtc';
        $ct_table_rack = 'ct_cascata_rack';
        $ct_table_puerto = 'ct_cascata_puerto';
        $ct_table_odf = 'ct_cascata_odf';    
    }
    else if($_SESSION["place"] == "AVITA"){        
        $dbTable = 'avita';
        $ct_table_red = 'ct_avita_red';
        $ct_table_operador = 'ct_avita_operador';
        $ct_table_dtc = 'ct_avita_dtc';
        $ct_table_rack = 'ct_avita_rack';
        $ct_table_puerto = 'ct_avita_puerto';
        $ct_table_odf = 'ct_avita_odf';    
    }
    else if($_SESSION["place"] == "Spazio"){        
        $dbTable = 'spazio';
        $ct_table_red = 'ct_spazio_red';
        $ct_table_operador = 'ct_spazio_operador';
        $ct_table_dtc = 'ct_spazio_dtc';
        $ct_table_rack = 'ct_spazio_rack';
        $ct_table_puerto = 'ct_spazio_puerto';
        $ct_table_odf = 'ct_spazio_odf';    
    }
    else{
        echo "Este establecimiento aún no esta habilitado.";
    }   

    try{

        $con = new PDO($dsn, $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (Exception $ex) {

        echo 'Not Connected '.$ex->getMessage();
    }
    
    $pdo = new PDO('mysql:host=localhost:3306;dbname=inversr4_redoptima', $username, $password);

    $select_red = "SELECT * FROM $ct_table_red";
    $select_red_stmt = $pdo->prepare($select_red);
    $select_red_stmt->execute();
    $rows_red = $select_red_stmt->fetchAll();
    
    $select_dtc = "SELECT * FROM $ct_table_dtc";
    $select_dtc_stmt = $pdo->prepare($select_dtc);
    $select_dtc_stmt->execute();
    $rows_dtc = $select_dtc_stmt->fetchAll();
    
    $select_rack = "SELECT * FROM $ct_table_rack";
    $select_rack_stmt = $pdo->prepare($select_rack);
    $select_rack_stmt->execute();
    $rows_rack = $select_rack_stmt->fetchAll();
    
    $select_puerto = "SELECT * FROM $ct_table_puerto";
    $select_puerto_stmt = $pdo->prepare($select_puerto);
    $select_puerto_stmt->execute();
    $rows_puerto = $select_puerto_stmt->fetchAll();
    
    $select_odf = "SELECT * FROM $ct_table_odf";
    $select_odf_stmt = $pdo->prepare($select_odf);
    $select_odf_stmt->execute();
    $rows_odf = $select_odf_stmt->fetchAll();
    $tableContent = '';
    $select_operador = '';
    $select_red = '';
    $select_rack = '';
    $input_cliente = '';
    $input_local = '';
    #$input_fecha = '';
    $select_distribucion = '';
    $select_estado = '';
    $input_odf = '';
    $input_puerto = '';
    $selectStmt = $con->query('SELECT * FROM '.$dbTable.'');
    $selectStmt->  execute();
    $conexiones = $selectStmt->fetchAll();

    foreach($conexiones as $conexion){
        $tableContent = $tableContent.'<tr>'
            .'<td width="2%">'.$conexion['id'].'</td>'
            .'<td width="5%">'.$conexion['operador'].'</td>'
            .'<td width="5%">'.$conexion['cliente'].'</td>'
            .'<td width="5%">'.$conexion['tipo'].'</td>'
            .'<td width="3%">'.$conexion['local'].'</td>'            
            .'<td width="5%">'.$conexion['nivel'].'</td>'
            .'<td width="5%">'.$conexion['red'].'</td>'
            .'<td width="5%">'.$conexion['punto_distribucion'].'</td>'
            .'<td width="5%">'.$conexion['fecha_alta'].'</td>'   
            .'<td width="5%">'.$conexion['fecha_baja'].'</td>'                            
            .'<td width="5%">'.$conexion['rack'].'</td>'
            .'<td width="5%">'.$conexion['odf_ct'].'</td>'
            .'<td width="5%">'.$conexion['puerto'].'</td>'
            .'<td width="5%">'.$conexion['estado'].'</td>'            
            .'<td width="5%">'.$conexion['rack_interna'].'</td>'
            .'<td width="5%">'.$conexion['odf_ct_interna'].'</td>'
            .'<td width="5%">'.$conexion['puerto_interna'].'</td>'
            .'<td width="10%">'.$conexion['observaciones'].'</td>'            
            .'<td width="8%">                                                    
                    <a href="nueva_alta2.php?id='. $conexion['id'] .'" title="Asignar Conexión" data-toggle="tooltip"><span class="fa fa-plug"></span></a> 
                    <a href="dar_baja.php?id='. $conexion['id'] .'" title="Dar de Baja" data-toggle="tooltip"><span class="fa fa-arrow-circle-down"></span></a>
                    <a href="editar_conexion.php?id='. $conexion['id'] .'" title="Editar Conexión" data-toggle="tooltip"><span class="fa fa-edit"></span></a>
                    <a href="delete2.php?id='. $conexion['id'] .'" title="Eliminar Conexión" data-toggle="tooltip"><span class="fa fa-trash"></span></a>                    
            </td>';

            $id = $conexion['id'];
            $operador = $conexion['operador'];    
            $cliente = $conexion['cliente'];
            $tipo = $conexion['tipo'];
            $local = $conexion['local'];            
            $nivel = $conexion['nivel'];
            $red = $conexion['red'];
            $punto_distribucion = $conexion['punto_distribucion'];
            $fecha_alta = $conexion['fecha_alta'];  
            $fecha_baja = $conexion['fecha_baja'];                    
            $rack = $conexion['rack'];
            $odf_ct = $conexion['odf_ct'];
            $puerto = $conexion['puerto'];
            $estado = $conexion['estado'];
            $rack_interna = $conexion['rack_interna'];
            $odf_ct_interna = $conexion['odf_ct_interna'];
            $puerto_interna = $conexion['puerto_interna'];
            $observaciones = $conexion['observaciones'];
            $user_arr[] = array($id, $operador, $cliente, $tipo, $local, $nivel, $red, $punto_distribucion, $fecha_alta, $fecha_baja, $rack, $odf_ct, $puerto, $estado, $rack_interna, $puerto_interna, $odf_ct_interna, $observaciones);
    
    }

    if(isset($_POST['super_filter'])){
        $select_operador = $_POST['select_operador'];
        $select_red = $_POST['select_red'];
        $select_rack = $_POST['select_rack'];
        $input_cliente = $_POST['input_cliente'];
        $input_local = $_POST['input_local'];
        #$input_fecha = $_POST['input_fecha'];
        $select_distribucion = $_POST['select_distribucion'];
        $select_estado = $_POST['select_estado'];
        $input_odf = $_POST['input_odf'];
        $input_puerto = $_POST['input_puerto'];
        $tableContent = '';
        $selectStmt = $con->prepare('SELECT * FROM '.$dbTable.' WHERE operador LIKE :select_operador AND red LIKE :select_red AND rack LIKE :select_rack AND cliente LIKE :input_cliente AND local LIKE :input_local AND /*fecha_alta LIKE :input_fecha AND */punto_distribucion LIKE :select_distribucion AND estado LIKE :select_estado AND odf_ct_interna LIKE :input_odf AND puerto_interna LIKE :input_puerto');
        $selectStmt->execute(array(    

                 ':select_operador'=>$select_operador.'%',   
                 ':select_red' =>$select_red.'%',
                 ':select_rack' =>$select_rack.'%',
                 ':input_cliente' =>$input_cliente.'%',
                 ':input_local' =>$input_local.'%',
                 #':input_fecha' =>$input_fecha.'%',
                 ':select_distribucion' =>$select_distribucion.'%',
                 ':select_estado' =>$select_estado.'%',
                 ':input_odf' =>$input_odf.'%',
                 ':input_puerto' =>$input_puerto.'%'

        ));
        $conexiones = $selectStmt->fetchAll();
        foreach($conexiones as $conexion){
            $tableContent = $tableContent.'<tr>'
            .'<td width="2%">'.$conexion['id'].'</td>'
            .'<td width="5%">'.$conexion['operador'].'</td>'
            .'<td width="5%">'.$conexion['cliente'].'</td>'
            .'<td width="5%">'.$conexion['tipo'].'</td>'
            .'<td width="3%">'.$conexion['local'].'</td>'            
            .'<td width="5%">'.$conexion['nivel'].'</td>'
            .'<td width="5%">'.$conexion['red'].'</td>'
            .'<td width="5%">'.$conexion['punto_distribucion'].'</td>'
            .'<td width="5%">'.$conexion['fecha_alta'].'</td>'
            .'<td width="5%">'.$conexion['fecha_baja'].'</td>'               
            .'<td width="5%">'.$conexion['rack'].'</td>'
            .'<td width="5%">'.$conexion['odf_ct'].'</td>'
            .'<td width="5%">'.$conexion['puerto'].'</td>'
            .'<td width="5%">'.$conexion['estado'].'</td>'            
            .'<td width="5%">'.$conexion['rack_interna'].'</td>'
            .'<td width="5%">'.$conexion['odf_ct_interna'].'</td>'
            .'<td width="5%">'.$conexion['puerto_interna'].'</td>'
            .'<td width="10%">'.$conexion['observaciones'].'</td>'
                .'<td width="8%">
                        <a href="nueva_alta2.php?id='. $conexion['id'] .'" title="Asignar Conexión" data-toggle="tooltip"><span class="fa fa-plug"></span></a>                      
                        <a href="dar_baja.php?id='. $conexion['id'] .'" title="Dar de Baja" data-toggle="tooltip"><span class="fa fa-arrow-circle-down"></span></a>
                        <a href="editar_conexion.php?id='. $conexion['id'] .'" title="Editar Conexión" data-toggle="tooltip"><span class="fa fa-edit"></span></a>
                        <a href="delete2.php?id='. $conexion['id'] .'" title="Eliminar Conexión" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                        
                </td>';
    
                $id = $conexion['id'];
                $operador = $conexion['operador'];    
                $cliente = $conexion['cliente'];
                $tipo = $conexion['tipo'];
                $local = $conexion['local'];                
                $nivel = $conexion['nivel'];
                $red = $conexion['red'];
                $punto_distribucion = $conexion['punto_distribucion'];
                $fecha_alta = $conexion['fecha_alta'];
                $fecha_baja = $conexion['fecha_baja'];                    
                $rack = $conexion['rack'];
                $odf_ct = $conexion['odf_ct'];
                $puerto = $conexion['puerto'];
                $estado = $conexion['estado'];
                $rack_interna = $conexion['rack_interna'];
                $odf_ct_interna = $conexion['odf_ct_interna'];
                $puerto_interna = $conexion['puerto_interna'];
                $observaciones = $conexion['observaciones'];
                $user_arr[] = array($id, $operador, $cliente, $tipo, $local, $nivel, $red, $punto_distribucion, $fecha_alta, $fecha_baja, $rack, $odf_ct, $puerto, $estado, $rack_interna, $puerto_interna, $odf_ct_interna, $observaciones);
        }
    
            
    }   
    



?>
<!DOCTYPE html>
<html>
<title>Gran Carcha</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="http://leandevelopment.tech/redoptima/js/jquery-3.3.1.js"></script>
<script src="http://leandevelopment.tech/redoptima/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

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
    
 <style>

        .dropdowns {
          width: 90%;
          height: 28px;
        }

</style>   
<body class="w3-light-grey">

<div style="margin-left:10px;">
            <div class="container-fluid">
                    <br>
                    <br>
                    <br>
                    <br>                    
                   <?php if(htmlspecialchars($_SESSION["rol"]) == "Administrador del Sistema") {
                        include "navbar.php";
                   }
                    ?> 
                      <br>
                <div class="page-header clearfix nav">  
                    <div class="w3-row">                        
                      <div class="w3-col m6 pull-right" style="padding-right: 60px">                          
                          <?php if(htmlspecialchars($_SESSION["rol"]) == "Administrador del Sistema") { ?>
                        <a href="red_alta.php" class="pull-right"><button class="w3-btn w3-border w3-white w3-border-red w3-round-large" style="">Agregar Nuevo Registro</button></a>
                          <?php } ?>
                      </div>
                      <div class="w3-col m6 pull-left" style="padding-left: 60px;">                          
                        <form class="" method='post' action='download.php'>
                                  <input type="submit" value="Descargar CSV" class="w3-btn w3-white w3-border w3-border-red w3-round-large" name="Export">
                                    <?php 
                                      #$user_arr[] = array($id, $status, $operador, $local, $cliente);
                                      $serialize_user_arr = serialize($user_arr);
                                   ?>
                                  <textarea name='export_data' style='display: none;' class="pull-right"><?php echo $serialize_user_arr; ?></textarea>
                        </form>
                      </div>                          
                        <br>
                        <br>
                        <hr>
                    </div>  
                    <br>
                    
                    <div class="w3-row">
                        <form class="" action="reporteria.php" method="POST">
                            <div class="w3-col m2 " style="margin-right: 3px; margin-left: 3px;">
                                    Operador: 
                                        <select class="dropdowns" name="select_operador">
                                            <option value="">...</option>
                                            <option value="Claro" <?php if($select_operador == 'Claro'){echo 'selected';}?>>Claro</option>
                                            <option value="Tigo" <?php if($select_operador == 'Tigo'){echo 'selected';}?>>Tigo</option>
                                            <option value="Telefonica" <?php if($select_operador == 'Telefonica'){echo 'selected';}?>>Telefonica</option>
                                        </select>
                                        <br>
                                        <br>
                                        Cliente: 
                                        
                                        <input class="dropdowns" type="text" name="input_cliente" value=""<?php echo $input_cliente?>>
                                        <br>
                                        <br>
                                    Estado:
                                        <select name="select_estado" class="dropdowns">
                                            <option value="">...</option>
                                            <option value="DISPONIBLE" <?php if($select_estado == 'DISPONIBLE'){echo 'selected';}?>>DISPONIBLE</option>
                                            <option value="CONECTADO" <?php if($select_estado == 'CONECTADO'){echo 'selected';}?>>CONECTADO</option>
                                        </select>

                            </div> 
                            <div class="w3-col m2 " style="margin-right: 3px; margin-left: 3px;">

                                    Local: 
                                        
                                        <input class="dropdowns" type="text" name="input_local" value="" <?php echo $input_local?>>
                                        <br>
                                        <br>
                                        Red:
                                        <br>
                                        <select class="dropdowns" name="select_red">
                                        <option value="">...</option>
                                            <?php                            
                                                foreach($rows_red as $row_red){
                                                    echo '<option value="'.$row_red['red'].'">'.$row_red['red'].'</option>';                                        
                                                }                            
                                            ?>    
                                        </select>

                            </div> 
                            <div class="w3-col m2" style="margin-right: 3px; margin-left: 3px;">
                                    Punto de Distribución:
                                        <select class="dropdowns" name="select_distribucion">
                                        <option value="">...</option>
                                        <?php                            
                                            foreach($rows_dtc as $row_dtc){
                                                echo '<option value="'.$row_dtc['dtc'].'">'.$row_dtc['dtc'].'</option>';                                        
                                            }                            
                                        ?>   
                                        </select>
                                        <br>
                                        <br>
                                            Fecha de Alta:
                                    <input class="dropdowns" type="date" id="datefield" name="fecha_alta" min='1899-01-01' max='2000-13-13' name="input_fecha" value=""<?php /*echo $input_fecha*/?>>
                                
                            </div>
                            <div class="w3-col m2" style="margin-right: 3px; margin-left: 3px;">
                            
                                    Fecha de Baja:
                                    <input class="dropdowns" type="date" id="datefield" name="fecha_baja" min='1899-01-01' max='2000-13-13' name="input_fecha" value=""<?php /*echo $input_fecha*/?>>
                                    <br>
                                    <br>
                                    Rack Red Interna:
                                    <select class="dropdowns" name="select_rack">
                                    <option value="">...</option>
                                        <?php                            
                                            foreach($rows_rack as $row_rack){
                                                echo '<option value="'.$row_rack['rack'].'">'.$row_rack['rack'].'</option>';                                        
                                            }                            
                                        ?>    
                                    </select>
                            </div>   
                            <div class="w3-col m2" style="margin-right: 3px; margin-left: 3px;">
                                    ODF/CT Interno:                                
                                    <select class="dropdowns" name="input_odf">
                                    <option value="">...</option>
                                        <?php                            
                                            foreach($rows_odf as $row_odf){
                                                echo '<option value="'.$row_odf['odf'].'">'.$row_odf['odf'].'</option>';                                        
                                            }                            
                                        ?>    
                                    </select>   
                                    <br>
                                    <br>
                                    Puerto/Par Interno:                                
                                    <select class="dropdowns" name="input_puerto">
                                    <option value="">...</option>
                                        <?php                            
                                            foreach($rows_puerto as $row_puerto){
                                                echo '<option value="'.$row_puerto['puerto'].'">'.$row_puerto['puerto'].'</option>';                                        
                                            }                            
                                        ?> 
                                    </select>  
                            </div>
                            <div class="w3-col m1" style="margin-right: 3px; margin-left: 3px;">
                                <input style="font-size: 18px; margin-top: 20px;" type="submit" name="super_filter" value="Filtrar" class="Apull-right w3-btn w3-white w3-border w3-border-red w3-round-large">
                            </div>    
                        </form>
                        
                        <!-- download csv -->
                        
                    </div>
                </div>    
                <br>
                <br>  
            <div style="overflow-x: auto; overflow-y: auto; overflow: scroll; height: 100%;" class="dataTables_scroll">     
                <table class="pull-left w3-table w3-striped display nowrap" id="tabla" role="grid">
                    <tr>
                        <th style="width: 2%">#</th>
                        <th>Operador</th>
                        <th>Cliente</th>
                        <th>Tipo</th>
                        <th>Local</th>                        
                        <th>Nivel</th>
                        <th>Tipo de Conexión</th>
                        <th>DTC</th>
                        <th>Alta</th>
                        <th>Baja</th>                        
                        <th>Rack Gabinete <br> Operador</th>
                        <th>ODF Regleta <br> Operador</th> 
                        <th>Puerto/Par <br> Operador</th> 
                        <th>Estado</th>
                        <th>Rack/Regleta <br> RO</th>
                        <th>ODF/CT <br> RO</th> 
                        <th>Puerto/Par <br> RO</th>
                        <th>Observaciones</th>
                        <?php
                            if(htmlspecialchars($_SESSION["rol"]) == "Administrador del Sistema") {
                                echo "<th>Acción<th>";
                            }
                        ?>
                    </tr>
                    <?php
                    echo $tableContent;
                    ?>
                </table>    
            </div>
            <div id="pagination" style="text-align: center;">
                    <p>Página:</p>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
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
<script>
    $(document).ready(function() {
        $('#tabla').DataTable( {
            "scrollY": 200,
            "scrollX": true
        } );
    } );
</script>
<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("datefield").setAttribute("max", today);
</script>
<script>
    $(document).ready(function() {
  var totalRows = $('#tabla').find('tbody tr:has(td)').length;
  var recordPerPage = 50;
  var totalPages = Math.ceil(totalRows / recordPerPage);
  var $pages = $('<div id="pages"></div>');
  for (i = 0; i < totalPages; i++) {
    $('<span class="pageNumber">&nbsp;' + (i + 1) + '</span>').appendTo($pages);
  }
  $pages.appendTo('#pagination');

  $('.pageNumber').hover(
    function() {
      $(this).addClass('focus');
    },
    function() {
      $(this).removeClass('focus');
    }
  );

  $('table').find('tbody tr:has(td)').hide();
  var tr = $('table tbody tr:has(td)');
  for (var i = 0; i <= recordPerPage - 1; i++) {
    $(tr[i]).show();
  }
  $('span').click(function(event) {
    $('#tabla').find('tbody tr:has(td)').hide();
    var nBegin = ($(this).text() - 1) * recordPerPage;
    var nEnd = $(this).text() * recordPerPage - 1;
    for (var i = nBegin; i <= nEnd; i++) {
      $(tr[i]).show();
    }
  });
});

</script>

</body>
</html>
