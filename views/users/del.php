<section>
    <div class='panel-title'>
        <div></div>
        <h3>ELIMINAR</h3>
        <div></div>
    </div>
    <div class='account justify-content-center scroll'>
        <div class="fail_added_acc" >
            <div>Esta acción es irreversible. Si eliminas este usuario, sus datos no se podrán recuperar.</div>
            <div>¿Estás seguro de que deseas eliminar este usuario y todas sus cuentas y claves?</div>
            <div class="panel-dual_button">
                <a href="users.php">
                    <button class="cancel">No</button>
                </a>
                <form action="users.php?deleted" method="post">
                    <input type="hidden" name="idUser" value="<?php echo $_GET['del'] ?>">
                    <button class="accept" name="delete_user">Sí</button>
                </form>
            </div>
        </div>
    </div>
</section>