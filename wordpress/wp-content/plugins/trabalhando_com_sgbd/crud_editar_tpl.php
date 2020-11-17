<div class="wrap">
    <h1>Crud de contatos do meu plug-in</h1>
    <br><br>
    <?php

        if( isset($msg)){
            echo "<h2 style=\"font-size= 30px; color: green\">{$msg}</h2>";
        }
        if( isset($erro)){
            echo "<h2 style=\"font-size= 30px; color: red\">{$erro}</h2>";
        }
    ?>
    <br><br>
    <form method="post">

            <input type="hidden" name="id" value="<?php echo $contato[0]->id; ?>">

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?php echo $contato[0]->nome; ?>"><br><br>
        
            <label for="whatsapp">Whatsapp</label>
            <input type="text" name="whatsapp" id="whatsapp" value="<?php echo $contato[0]->whatsapp; ?>"><br><br>
        
        <?php
            submit_button('Salvar');
        ?>          
    </form>
</div>