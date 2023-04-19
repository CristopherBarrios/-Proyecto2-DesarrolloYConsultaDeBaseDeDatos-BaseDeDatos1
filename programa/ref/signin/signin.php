<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="180x180" href="../../img/fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../img/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../img/fav/favicon-16x16.png">
    <link rel="manifest" href="../../img/fav/site.webmanifest">
    
    <title>Sign Up</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/materialize.min.css">
    <link rel="stylesheet" href="../../css/tooplate.css">
</head>

<body id="register">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <header class="mb-5">
                    <h3 class="mt-0 white-text">Sign-up </h3>
                    <p class="grey-text mb-4">aaaaaaaaaaaaaaaaaaaaaaaa</p>
                    <p class="grey-text">bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb</p>
                </header>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <form action="../../php/validar/insertarUsuario.php" method="post" class="tm-signup-form">
                    <div class="input-field">
                        <input placeholder="Usuario" id="username" name="realname" type="text" class="validate">
                    </div>
                    <div class="input-field">
                        <input placeholder="Contraseña" id="password" name="pass" type="password" class="validate">
                    </div>
                    <div class="input-field">
                        <input placeholder="Escribe otra vez Contraseña" id="password2" name="rpass" type="password" class="validate">
                    </div>
                    <div class="input-field">
                        <input placeholder="Email" id="email" name="nick" type="email" class="validate">
                    </div>
                    <div class="input-field">
                        <input placeholder="Telefono" id="phone" name="phone" type="tel" class="validate">
                    </div>
                    <div class="text-right mt-4">
                        <button type="submit" class="waves-effect btn-large btn-large-white px-4 tm-border-radius-0">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
        <footer class="row tm-mt-big mb-3">
            <div class="col-xl-12">
                <p class="text-center grey-text text-lighten-2 tm-footer-text-small">
                    Copyright &copy; 2023 Company Name 
                
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        $(document).ready(function () {
            $('select').formSelect();
        });
    </script>
</body>

</html>