<section>
    <div class='panel-title'>
        <div><a href='<?php echo $_SERVER['PHP_SELF']; ?>'><button class='back'>Atrás</button></a></div>
        <h3>EDITADO</h3>
        <div></div>
    </div>
    <div class="<?php echo $successfulAction ? 'win_added_acc' : 'fail_added_acc'; ?>">
        <div>
            <?php 
                if ($successfulAction)
                    echo 'Plataforma actualizada con éxito';
                elseif ($actionFailed)
                    echo 'Error: Acción fallida';
                elseif ($existPlatform)
                    echo 'La plataforma ya existe';
            ?>
        </div>
        <div>
            <a href="platforms.php">
                <button class="accept">Aceptar</button>
            </a>
        </div>
    </div>
</section>