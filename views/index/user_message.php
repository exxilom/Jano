<!-- Mensajes o notificaciones destinadas a la vista principal del usuario -->
<?php 
    //Si la contraseña del admin es la contraseña por defecto y, el usuario tiene acceso, mostramos mensaje de error
    echo $_SESSION['insecure_app'] ? 
    "<p class='alert'>ERROR CODE (1): APLICACIÓN INSEGURA. Si ve este mensaje, comuníquese con su administrador de inmediato. Hasta entonces, no podrás utilizar la aplicación.</p>" : ""; 
?>
<!-- <p>INSERT MESSAGE TO USER PROFILE</p> -->