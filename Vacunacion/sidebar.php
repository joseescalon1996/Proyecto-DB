<?php
    include "database.php";    
    include "session.php";
?>
<!DOCTYPE html>
<html>
<title>Vacunación</title>
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
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
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

.titulo {
  color: white; 
  font-size: 14px; 
  margin-top: 8px;
}

@media all and (max-width: 650px) {
  .titulo {
    display: none;
  }
}
        </style>       
    
    
<body class="w3-light-grey">
<!-- Top container -->
<div class="w3-bar w3-top w3-border w3-blue-gray w3-large" style="z-index:4">
  <button class="w3-button w3-xlarge" onclick="w3_open();">☰</button>
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_close();"></button>  
  <?php /*if(htmlspecialchars($_SESSION["rol"]) == "Administrador del Sistema") {*/ ?>    
    
      <p class="w3-bar-item w3-right pull-right titulo"><span class="titulo">Sistema de Registro de Vacunación</span></p>  
    
</div>

<!-- Sidebar/menu -->

<nav class="w3-sidebar w3-white w3-animate-left" style="z-index:3; width:250px; border-right: 1px solid grey;" id="mySidebar"><br>
  <div class="w3-container w3-row" style="background-color: #a93338;">
    
    <div style="background-color: #a93338;">
        <br>
        <br>    
        <img style="width: 100%" src="logo.png">
        <br>           
    </div>
    <br>
  </div>
  
  <div class="w3-container">
    <br>   
    <span>Bienvenido, <strong></strong></span><br>
    <hr>    
  </div>
  <div class="w3-bar-block">
    <a href="parametrizacion.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home"></i>  Parametrización</a>
    <a href="tabla_usuarios.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user"></i>  Administrar Usuarios</a>  
    <a href="agregar_usuario.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user"></i>  Agregar Usuario</a>          
    <a href="tabla_vacunas.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user-md"></i>  Empleados de Salud</a>    
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope"></i>  Contacto</a>                
    <a href="vacunas.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i>  Salir</a>
  </div>
</nav>


<!-- BODY TEXT HERE-->




<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");
mySidebar.style.display = 'none';

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