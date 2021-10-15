<?php

//include "session.php";
require_once "database.php";
include "sidebar.php";

$pdo = new PDO('mysql:host=localhost:3306;dbname=vacunacion', 'root', '');

$vacuna = ' ';
$numero_dosis = 0;
$local = ' ';
$dias_dosis = 0;
$tableContentVacunas = '';
$tableContentLocales = '';

$select_vacunas = "SELECT * FROM lista_vacunas";
$select_vacunas_stmt = $pdo->prepare($select_vacunas);
$select_vacunas_stmt->execute();
$rows_vacunas = $select_vacunas_stmt->fetchAll();
 

$select_local = "SELECT * FROM locales";
$select_local_stmt = $pdo->prepare($select_local);
$select_local_stmt->execute();
$rows_local = $select_local_stmt->fetchAll();
 


foreach($rows_vacunas as $row_vacunas){
    $tableContentVacunas = $tableContentVacunas.'<tr>'
        .'<td>'.$row_vacunas['id'].'</td>'            
        .'<td>'.$row_vacunas['vacuna'].'</td>'
        .'<td>'.$row_vacunas['numero_dosis'].'</td>'
        .'<td>'.$row_vacunas['dias_dosis'].'</td>'
        .'<td>             
            <a href="delete_vacunas.php?id='. $row_vacunas['id'] .'" title="Eliminar Vacuna" data-toggle="tooltip"><span class="fa fa-trash"></span></a>                    
        </td>';
        
        /*
        $establecimiento = $row_vacunas['id'];            
        $vacuna = $row_vacunas['vacuna'];
        $local = $row_vacunas['local'];                    
        $user_arr[] = array($id, $vacuna, $local);
        */
}


foreach($rows_local as $row_local){
    $tableContentLocales = $tableContentLocales.'<tr>'
        .'<td>'.$row_local['id'].'</td>'            
        .'<td>'.$row_local['local'].'</td>'
        .'<td>             
            <a href="delete_locales.php?id='. $row_local['id'] .'" title="Eliminar Local" data-toggle="tooltip"><span class="fa fa-trash"></span></a>                    
        </td>';
        
        /*
        $establecimiento = $row_odf['id'];            
        $odf = $row_odf['odf'];
        $local = $row_odf['local'];                    
        $user_arr[] = array($id, $odf, $local);
        */
}

if(isset($_POST['save_vacuna'])) {
        
    $vacuna = $_POST['vacuna'];
    $numero_dosis = $_POST['numero_dosis'];
    $dias_dosis = $_POST['dias_dosis'];
    
    $sql = "INSERT INTO lista_vacunas (vacuna, numero_dosis, dias_dosis) VALUES (?, ?,?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$vacuna, $numero_dosis, $dias_dosis]);    
    echo "<script>window.location.href='redirect_mantenimiento.php';</script>";
    exit;
}

else if(isset($_POST['save_local'])) {
    
    $local = $_POST['local'];
    $sql = "INSERT INTO locales (local) VALUES (?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$local]);        
    echo "<script>window.location.href='redirect_mantenimiento.php';</script>";
    exit;
}


?>

<!DOCTYPE html>
<html>
<title>Mantenimiento Vacunación</title>
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

#tabla {
    font-family: "Trebuachet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#tabla td, #tabla th {
    border: 1px solid #ddd;
    padding: 5px;
}


#tabla tr:nth-child(even){background-color: #f2f2f2;}

#tabla tr:hover {background-color: #ddd;}

#tabla th {
padding-top: 3px;
padding-bottom: 3px;
text-align: left;
background-color: #a93338;
color: white;
font-size: 13px;
}

#tabla td {
    font-size: 12px;
}
    


select{
    width: 100%;
    margin-top: 5px;
    margin-bottom: 10px;
}
                
.w3-bar {
    background-color: color: #a93338;
}

.responsive2 {
    width: 90%; 
    margin-right: 15px;
}

@media only screen and (max-width: 700px) {
.responsive {
    margin-top: 65px;
    margin-bottom: 35px;
}
.responsive2 {
    width: 90%; 
    margin-right: 15px;
    margin-bottom: 20px;
    margin-top: 65px;
}
}

</style>   
    
<body class="w3-light-grey">
<!-- Top container -->

<div style="">
    <br>
    <br>
    <br>    
    <br>
    
</div>
<div style="margin: auto; max-width: 900px; min-width: 750;">           
            <div class="establecimiento">
            <h1>Mantenimiento</h2>

                <p></p>                                    
                    <form action='parametrizacion.php' method='post'>
                                     
                        <ul class="w3-ul w3-border w3-card w3-white" style="margin-top: 15px;">
                            <li class='w3-display-container'><h4 class="responsive">Agregar Centro de Vacunación <input class='w3-display-right' type='text' name='local' style='margin-right: 55px;'/>
                            <li></h4><input type="submit" class='w3-button w3-blue-grey w3-display-right' value="Ingresar" name='save_local' style='margin-right: 30px;'/> 
                            <?php                            
                                foreach($rows_local as $row_local){
                                    echo '<li>'.$row_local['local'].'<a class="pull-right" style="margin-right: 30px;" href="delete_local.php?id='.$row_local['id'].'" title="Eliminar Conexión" data-toggle="tooltip"><span class="fa fa-trash"></span></a></li>';                                        
                                }                            
                            ?>
                        </ul>                        
                          
                
                        <ul class="w3-ul w3-border w3-card w3-white" style="margin-top: 15px;">
                            <div class='w3-display-container'>                            
                                <h3 style="margin-left: 25px;">Agregar Vacuna </h3>
                                <div class="w3-row">                                    
                                    <div class="w3-col m6">
                                        <input class='pull-right responsive2' type='text' name='vacuna' style='' placeholder="Vacuna"/>
                                    </div>
                                    <div class="w3-col m6">
                                        <div class="w3-row">
                                                <div class="w3-col m3">
                                                    <input class='pull-right responsive2' type='text' name='numero_dosis' style='' placeholder="# de Dosis"/>
                                                </div>
                                                <div class="w3-col m3">
                                                    <input class='pull-right responsive2' type='text' name='dias_dosis' style='' placeholder="Dias/Dosis"/>
                                                </div>
                                                <div class="w3-col m6">
                                                    <input type="submit" class='w3-button w3-blue-grey' value="Ingresar" name='save_vacuna' style='margin-left: 25px;'/>                                 
                                                </div>
                                                <br>
                                        <div>                                                                                
                                    </div>
                                    </div>
                                </div>
                                <br>
                                <div class="w3-row">                                    
                                    <div class="w3-col m12">
                                        <table class="w3-table w3-bordered" id="" style="text-align: center;">
                                            <tr>
                                                <th>#</th>  
                                                <th>Vacuna</th>
                                                <th>Cantidad de Dosis</th>       
                                                <th>Días Entre Dosis</th>                                    
                                            </tr>
                                            
                                            <?php
                                            echo $tableContentVacunas;
                                            ?>
                                            
                                        </table>                                                             
                                    </div>   
                                </div>   
                            </div>     
                        </ul>                                                                    
                     
                    </form>    
            </div>
            <br>
            <br>
            <br>

</div>            

</body>
</html>