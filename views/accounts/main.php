<?php
    echo "<section>";
    echo "<div class='panel-title'>";
        echo "<div></div>";
        echo "<h3>LISTA</h3>";
        echo "<div><a href='".$_SERVER['PHP_SELF'].'?add'."'><button class='accept'>Agregar</button></a></div>";
    echo "</div>";
    echo "<div class='search'>";
        echo "<form action='".$_SERVER['PHP_SELF']."' method='POST'>";
            echo "<input type='text' name='input_search' id='' placeholder='Buscar Plataforma'>";
            echo "<input type='submit' name='search_account' value='Buscar'>";
        echo "</form>";
    echo "</div>";
    echo "<div class='result scroll ".($emptyList || !sizeof($result_search) ? 'empty-search' : '')."'>";
        if ($emptyList)
            echo "<span><b>Lista de Cuentas Vacia</b></span>";
        elseif (!sizeof($result_search))
            echo "<span><b>Cuenta No Encontrada</b></span>";
        else 
            renderUserAccountList($result_search);
    echo "</div>";
    echo "</section>";
?>