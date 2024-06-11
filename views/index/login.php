<form action="index.php" method="POST" class="form_login">
    <input type="text" name="nick" placeholder="Usuario" class="<?php echo inputStyle($errorLogin,$loggedNow); ?>" 
            value="<?php echo (isset($_POST['nick']) ? dataClean($_POST['nick']) : ''); ?>">
    <input type="password" name="pswd" placeholder="Contraseña" class="<?php echo inputStyle($errorLogin,$loggedNow); ?>">
    <span class="text-error"><?php echo ($errorLogin && !($userPending || $userBanned) ? 'Username o contraseña Invalidos' : ''); ?></span>
    <span class="text-error"><?php echo ($userPending ? 'Cuenta pendiente de Activacion' : ''); ?></span>
    <span class="text-error"><?php echo ($userBanned ? 'Tu cuenta a sido Baneada' : ''); ?></span>
    <input type="submit" name="login" value="Enter" class="">
    <div><a href="index.php?register" class="register">Registrate</a></div>
</form>