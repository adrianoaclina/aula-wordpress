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
        
        if(count($contatos)){
            echo "<table border=1>";
            echo "<tr><td>Nome</td><td>Whatsapp</td><td>Ações</td></tr>";
            foreach($contatos as $contato){
                echo "<tr><td>{$contato->nome}</td><td>{$contato->whatsapp}</td><td><a href=\"?page={$_GET['page']}&apagar={$contato->id}\">Apagar <a href=\"?page={$_GET['page']}&editar={$contato->id}\">Editar</td></tr>";
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
