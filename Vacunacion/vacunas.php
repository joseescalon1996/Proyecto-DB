<!DOCTYPE html>
<html>
<title>Vacunación COVID-19</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
</style>
<body>

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:30%;min-width:200px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Cerrar Menú</a>   
  <a href="login.php" onclick="w3_close()" class="w3-bar-item w3-button">Ingresar</a>
  <a href="" onclick="w3_close()" class="w3-bar-item w3-button">Contacto</a>
</nav>

<!-- Top menu -->
<div class="w3-top">
  <div style="background-color: #a93338 !important; color: white !important" class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-right w3-padding-16"></div>
    <div class="w3-center w3-padding-16">Agenda Tu Vacunación Acá</div>
  </div>
</div>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

  <!-- First Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center" id="food">
    <div class="w3-quarter">
      <img src="assets/pfizer.webp" alt="Pfizer" style="width:100%">
      <h3>Pfizer/BioNTech</h3>
    </div>
    <div class="w3-quarter">
      <img src="assets/moderna.jpg" alt="Moderna" style="width:100%">
      <h3>Moderna</h3>
    </div>
    <div class="w3-quarter">
      <img src="assets/astrazeneca.webp" alt="Astra Zeneca" style="width:100%">
      <h3>Oxford/Astra Zeneca</h3>
    </div>
    <div class="w3-quarter">
      <img src="assets/sputnik.jpeg" alt="Sputnik" style="width:100%">
      <h3>Sputnik</h3>
    </div>
  </div>

  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="registro_vacuna.php" class="w3-bar-item w3-button w3-black">REGISTRARSE AL PROCESO DE VACUNACIÓN</a>      
    </div>
  </div>

  
  <footer class="w3-row-padding w3-padding-32">
    <div class="w3-third">
      <h3>CENTROS DE VACUNACIÓN</h3>
      <p>Encuentra el centro de vacunación más cercano a tí.</p>
      <p>Sistema de Vacunas 2021.</a></p>
    </div>

  </footer>
<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html>
