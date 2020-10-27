<div class="wrap">
    <h1>Menu Exericio</h1>

    <form action="options.php" method="post">
        <?php 
            settings_fields('config_menu_exercicio');
            do_settings_sections('config_menu_exercicio');
        ?>
        <div>
            <label for="nome_aluno">Nome do aluno</label>
            <input type="text" name="url-nome-aluno" id="nome_aluno">
        </div>
        <div>
            <label for="link-exercicio">Link do exercicio</label>
            <input type="text" name="url-link-exercicio" id="link-exercicio">
        </div>
        <?php
        submit_button();
        ?>
    </form>
</div>
