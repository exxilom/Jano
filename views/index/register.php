<div class="<?php echo $registered ? 'container-box' : 'hidden' ?>">
    <div class='registered-box'>
    <p>Registro Exitoso</p>
    <p>Tu cuenta esta pediente a activacion. Consulta al Administrador</p>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>"><button>Atras</button></a>
    </div>
</div>

<form action="index.php?register" method="POST" class="<?php echo $registered ? 'hidden' : 'form_login'; ?>">
    <input type="text" name="nick" placeholder="Usuario(*)" class="<?php echo ($userExistException ? 'error' : 'required'); ?>"
        value="<?php echo ( isset($_POST['add_user']) ? $_POST['nick'] : '' ); ?>" required>
    <span class="text-error"><?php echo ($userExistException ? 'Usuario no Disponible' : ''); ?></span>

    <input type="password" name="pswd" placeholder="Contraseña (*)" class="<?php echo ($passCheckException ? 'error' : 'required'); ?>" value="" required>
    <input type="password" name="pswd2" placeholder="Repetir Contraseña (*)" class="<?php echo ($passCheckException ? 'error' : 'required'); ?>" value='' required>
    <span class="text-error"><?php echo ($passCheckException ? 'Las contraseñas no coinciden' : ''); ?></span>

    <input type="text" name="name" placeholder="Nombre" value="<?php echo (isset($_POST['add_user']) ? $_POST['name'] : ''); ?>">
    <input type="text" name="surname" placeholder="Apellido" value="<?php echo (isset($_POST['add_user']) ? $_POST['surname'] : ''); ?>">

    <input type="email" name="email" placeholder="email (*)" class="<?php echo ($mailFormatException || $mailExistException ? 'error' : 'required'); ?>" 
        value="<?php echo (isset($_POST['add_user']) ? $_POST['email'] : ''); ?>" required>
    <span class="text-error"><?php echo ($mailFormatException ? 'Error en formato de Email' : ''); ?></span>
    <span class="text-error"><?php echo ($mailExistException ? 'Email ya registrado.' : ''); ?></span>

    <input type="submit" name="add_user" value="Registrar" class="">
    <div><a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="back-login">Atras</a></div>
</form>