<section>
    <div class='panel-title'>
        <div></div>
        <h3>LISTA</h3>
        <div></div>
    </div>
    <div class='search'>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
            <input type='text' name='input_search' id='' placeholder='Buscar nick / correo electrónico'>
            <input type='submit' name='search_user' value='Buscar'>
        </form>
    </div>
    <div class="<?php echo "resultado scroll ".($emptyList || !sizeof($result_search) ? 'busqueda-vacia' : 'lista-usuarios') ?>">
        <?php
            if ($emptyList)
                echo "<span><b>--- Lista de usuarios vacía ---</b></span>";
            elseif (!sizeof($result_search))
                echo "<span><b>--- No encontrado ---</b></span>";
            else 
                renderUserList($result_search);
        ?>
    </div>
</section>