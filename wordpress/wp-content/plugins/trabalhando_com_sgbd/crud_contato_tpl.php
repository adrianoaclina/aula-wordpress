<div class="wrap">
    <h1>Crud de contatos do meu plug-in</h1>
    <br><br>
    <?php

        
        if(count($contatos)){
            echo "<table border=1>";
            echo "<tr><td>Nome</td><td>Whatsapp</td></tr>";
            foreach($contatos as $contato){
                echo "<tr><td>{$contato->nome}</td><td>{$contato->whatsapp}</td></tr>";
            }
            echo "</table>";
            echo "<br>";
        }
    ?>

    <form method="post">
        
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value=""><br><br>
        
        
            <label for="whatsapp">Whatsapp</label>
            <input type="text" name="whatsapp" id="whatsapp" value=""><br><br>
        
        <?php
            submit_button('Gravar novo');
        ?>
    </form>
</div>
