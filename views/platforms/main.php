<section>
    <div class='panel-title'>
        <div></div>
        <h3>LISTA</h3>
        <div><a href='<?php echo $_SERVER['PHP_SELF'].'?add'; ?>'><button class='accept'>Agregar</button></a></div>
    </div>
    <div class='search'>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
            <input type='text' name='input_search' id='' placeholder='Buscar plataforma'>
            <input type='submit' name='search_platform' value='Buscar'>
        </form>
    </div>
    <div class="<?php echo 'result scroll '.($emptyList || !sizeof($result_search) ? 'empty-search' : 'user-list') ?>">
        <?php
            if ($emptyList)
                echo "<span><b>--- Lista de plataformas vacía ---</b></span>";
            elseif (!sizeof($result_search))
                echo "<span><b>--- No encontrado ---</b></span>";
            else 
                renderTablePlatformList($categories, $result_search);
        ?>
    </div>
</section>