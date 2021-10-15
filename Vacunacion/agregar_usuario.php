<?php
// Include config file
require_once "database.php";

include "sidebar.php";
 
// Define variables and initialize with empty values
$email = $password = $confirm_password = $rol = "";
$email_err = $password_err = $confirm_password_err = $rol_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
     
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Porfavor ingrese el usuario.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "Este usuario ya esta tomado.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La contraseña dene tener almenos 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Porfavor confirmar contraseña.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Las contraseñas deben ser iguales.";
        }
    }
    //validate role
    if(empty(trim($_POST["rol"]))){
        $rol_err = "Porfavor ingresar el rol.";     
    } else{
        $rol = trim($_POST["rol"]);
    }
    if(empty(trim($_POST["nombre"]))){
        $grupo = trim($_POST["nombre"]);     
    } else{
        $grupo = trim($_POST["nombre"]);
    }
    if(empty(trim($_POST["establecimiento"]))){
        $establecimiento = "Gran Carcha";     
    } else{
        $establecimiento = trim($_POST["estableciento"]);
    }

    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err && empty($rol_err))){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (email, password, rol) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_email, $param_password, $param_rol);
            
            // Set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_rol = $rol;            

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: tabla_usuarios.php");
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
<html lang="en">
 

<title>Registrar Usuario</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
</div>
<div style="margin: auto; max-width: 800px">
  <div class="container-fluid w3-container">
    <div class="wrapper">
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="w3-white w3-padding-large w3-padding-32 w3-margin-top">
            <h2 class="w3-center">Registrar Usuario</h2>
                <p>Llena este formulario con la información del usuario a registrar.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <label>Email</label>
                        <input class="w3-input w3-border" type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                        <span class="help-block"><?php echo $email_err; ?></span>
                    </div>   
                    <br> 
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label>Contraseña</label>
                        <input class="w3-input w3-border" type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                    <br>
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <label>Confirmar Contraseña</label>
                        <input class="w3-input w3-border" type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <br>
                    <div class="form-group <?php echo (!empty($rol_err)) ? 'has-error' : ''; ?>">
                        <label>Rol</label>                        
                        <select name="rol" class="w3-input w3-border  form-control" id="mySelect" onchange="myFunction()">
                                        <option value="">...</option>
                                        <option value="Administrador" <?php if($rol == 'Administrador'){echo 'selected';}?>>Administrador</option>
                                        <option value="Empleado" <?php if($rol == 'Empleado'){echo 'selected';}?>>Empleado de Salud</option>
                                        <option value="Visitante" <?php if($rol == 'Visitante'){echo 'selected';}?>>Visitante</option>                                        
                        </select>
                        <span class="help-block"><?php echo $rol_err; ?></span>
                    </div>    
                    <br>
                    <div class="form-group">
                        <input type="submit" class="w3-button w3-block w3-indigo popup" value="Registrar">

                        </div>
                    </div>    
                        
                </form>
             
        </div>
    </div>  
  </div>  
</div>  
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
$( "select[name='state']" ).change(function () {
    var stateID = $(this).val();


    if(stateID) {


        $.ajax({
            url: "ajaxpro.php",
            dataType: 'Json',
            data: {'id':stateID},
            success: function(data) {
                $('select[name="city"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
            }
        });


    }else{
        $('select[name="city"]').empty();
    }
});
</script>
<script>


function myFunction() {
  if(document.getElementById('mySelect').value == "Administrador del Sistema") {
  	document.getElementById("select2").disabled=true;
    document.getElementById("select3").disabled=true;
  }
  if(document.getElementById('mySelect').value == "Administrador de Centros Comerciales") {
  	document.getElementById("select2").disabled=true;
    document.getElementById("select3").disabled=true;
  }
  if(document.getElementById('mySelect').value == "Cliente Final") {
  	document.getElementById("select2").disabled=false;
    document.getElementById("select3").disabled=false;
  }
  if(document.getElementById('mySelect').value == "Perfil de Consulta") {
  	document.getElementById("select2").disabled=false;
    document.getElementById("select3").disabled=false;
  }
  if(document.getElementById('mySelect').value == "Organizacion") {
  	document.getElementById("select2").disabled=false;
    document.getElementById("select3").disabled=true;
  }
}
</script>
<script> function myFuncion() {
  alert("El usuario se creó exitosamente");
  window.location.replace("http://leandevelopment.tech/redoptima/register.php");
}

</script>'
</body>
</html>