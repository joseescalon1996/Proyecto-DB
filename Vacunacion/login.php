<?php
// Initialize the session
//session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: login.php");
    exit;
}
  
// Include config file
require_once "database.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";
$rol = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Porfavor ingresar correo.";
    } else{
        $email = trim($_POST["email"]);    

    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, password, rol FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password, $rol);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["rol"] = $rol;                                                                                                                          
                                
                                // Redirect user to welcome page
                            if($rol== "Administrador") { 
                                header("location: tabla_vacunas.php");
                            } else{
                                // Display an error message if password is not valid
                                $password_err = "La contraseña no es válida.";
                            }
                        }    
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $email_err = "No existe una cuenta con ese correo.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body{ 
            font: 14px sans-serif; 
            background-image: url("background.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            width: 100%; 
            height:auto;
            }

        .wrapper{ 
            width: 400px; 
            padding: 25px; 
            background-color: #ffff;
            margin: auto;
            vertical-align: middle;
            border-radius: 10px;

            }
        
        @media screen and (max-width:400px) {
            .wrapper {
                width:300px; /* The width is 100%, when the viewport is 800px or smaller */
            }
        }

        .logo {
            margin-left: auto; 
            margin-right: auto;
        }
        .vertical-center {
            position: fixed;
            top: 50%;
            left: 50%;
            /* bring your own prefixes */
            transform: translate(-50%, -50%);
            }

    </style>
</head>
<body>
    <div class="wrapper vertical-center" style="background-color: #a93338; color: white;">
        <img src="logo.png" class="logo" style="display: block; margin-left: auto; margin-right: auto; width: 100%;">
        <br>
        <br>
        <p style="color: white;" >Ingresa tus credenciales para ingresar.</p>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
            </div>
            
        </form>
    </div>    
</body>
</html>