<?php

    include "config/db_config.php";
    include "resource/functions.php";
    include "class/DBAbstractModel.php";
    include "class/Users.php";
    include "class/Platforms.php";
    include "class/Accounts.php";
    include "class/error/UserExistException.php";
    include "class/error/PassCheckException.php";
    include "class/error/MailFormatException.php";
    include "class/error/MailExistException.php";

    session_start();

    if ( !isset($_SESSION['user']) ) { 
        $_SESSION['instance_users']     = Users::singleton();
        $_SESSION['instance_platforms'] = Platforms::singleton();
        $_SESSION['instance_accounts']  = Accounts::singleton();

        $_SESSION['user']         = array( 'perfil' => "INVITED" );
        $_SESSION['insecure_app'] = FALSE;
    }

    include 'controller/login_register_controller.php';

    if ( isset($_POST['exit']) ) {
        closeSession();
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/form.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="img/favicon.ico">
        <script src="js/functions.js"></script>
        <script src="js/main.js"></script>
        <title>Jano</title>
        <style>
/* Estilos para centrar el formulario */
        #login_container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        </style>
    </head>
    <body>
        <noscript><h1>Esta página requiere el uso de JavaScript</h1></noscript>
        <div id="login_screen" class="<?php echo loginScreenVisibility($loggedNow); ?>">
        <div id="login_container">
            <?php 
                if ( isset($_GET['register']) ) {   //Si la URL es index.php?register accedemos a la vista de registro
                    if ($_SESSION['user']['perfil'] !== 'INVITED')  //Si el usuario ya no es 'INVITED' no podrá ver la vista de registro
                        header('Location:index.php');
                    else
                        include "views/index/register.php"; 
                }
                else    //Si el usuario no accede a registro accederá a login en caso de no estar logeado
                    include "views/index/login.php"; 
            ?>
            </div>
        </div>
        <div>
            <header>
                <?php
                    include 'include/header.php';
                    ?>
            </header>
            <?php
                if ( $_SESSION['user']['perfil'] == 'ADMIN' && strtolower($_SESSION['user']['pass']) == 'admin' )
                    include "views/index/change_admin_pass.php"; 
            ?>
            <main>
                <nav>
                    <?php
                        include "include/nav.php"; //Si el usuario ya está logeado se cargan los botones del nav
                    ?>
                </nav>
                <div class="container">
                    <div class="name-page"><h2><?php echo ($_SESSION['user']['perfil'] == 'INVITED' ? "" : "INDEX"); ?></h2></div>
                    <?php
                        if ($_SESSION['user']['perfil'] !== 'INVITED')
                            include "views/index/main.php";
                    ?>
                </div>
            </main>
            <footer></footer>
        </div>
    </body>
</html>