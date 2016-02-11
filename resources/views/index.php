<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPAA</title>

    <!-- Bootstrap Core CSS -->
    <link href="lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome CSS -->
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
    <!-- Sweetalert CSS -->
    <link rel="stylesheet" type="text/css" href="lib/sweetalert/dist/sweetalert.css">
    <!-- Custom CSS -->
    <link href="login/css/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Amaranth|Montserrat' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="container">
        <div class="col-lg-offset-2 col-lg-5">
            <figure>
                <img class="index-img" src="common/img/logo_nombre.png" alt="logo_completo">
            </figure>
        </div>
        <div class="col-lg-offset-1 col-lg-3">
            <form method="POST" action="acceder"> <!-- como se accede? por el atributo action = funcion en el controlador? -->
                <div class="form-login">
                    <h4>Iniciar sesión en SPAA</h4>
                    <br>
                    <input type="text" name="username" class="form-control input-sm chat-input" placeholder="usuario" />
                    <br>
                    <input type="password" name="password" class="form-control input-sm chat-input" placeholder="contraseña" />
                    <br>
                    <div class="wrapper">
                        <span class="group-btn"> 
                            <br>
                            <button class="btn btn-primary btn-md" type="submit">Acceder <i class="fa fa-sign-in"></i></button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery -->
    <script src="lib/jquery/dist/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="lib/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Librería de SweetAlert -->
    <script src="lib/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        var error = '<?php if(isset($error)) echo "{$error}"; ?>';
        if(error !== '') swal('Credenciales Incorrectas !',error,'error');
    </script>
</body>

</html>
