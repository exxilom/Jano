<section>
    <div class='panel-title'>
        <div><a href='accounts.php?view=<?php echo $_GET['del'] ?>'><button class="back">Atras</button></a></div>
        <h3>ELIMINAR</h3>
        <div></div>
    </div>
    <div class='account justify-content-center scroll'>
        <div class="fail_added_acc" >
            <div>Esta acción es irreversible. Si elimina esta cuenta, sus datos no se recuperarán.</div>
            <div>¿Estás seguro de que deseas eliminar esta cuenta?</div>
            <div class="panel-dual_button">
                <a href="accounts.php?view=<?php echo $_GET['del'] ?>">
                    <button class="cancel">No</button>
                </a>
                <form action="accounts.php?deleted" method="post">
                    <input type="hidden" name="id_account" value="<?php echo $_GET['del'] ?>">
                    <button class="accept" name="delete_account">Si</button>
                </form>
            </div>
        </div>
    </div>
</section>