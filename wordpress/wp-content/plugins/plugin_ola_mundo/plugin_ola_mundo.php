<?php
/*
* Plugin Name: Olá Mundo, meu primeiro plug-in
* Plugin URI: https://github.com/adrianoaclina
* Description: Um plug-in muito simples que apenas coloca Olá mundo nos posts
* Version: 0.0.1
* Author: Adriano Aclina
* Author URI: https://twitter.com/adrianoaclina
* License: CC
*/

// Exemplo de como utilizar um filter
add_filter('login_errors','nova_mensagem_de_erro');

function nova_mensagem_de_erro(){
    return "Credenciais inválidas!";
}

//Fim do exemplo

// Exemplo de como utilizar um action hook
add_action('wp_head', 'coloca_comentario');

function coloca_comentario(){

    if(is_single()){
        
        echo "\n\n\n";
        echo '<meta property="og:title" content=" ' . get_the_title() . ' ">';echo "\n\n\n";
        echo '<meta property="og:site_name" content=" ' . wp_title('', false) . ' ">';echo "\n\n\n";
        echo '<meta property="og:url" content=" ' . get_permalink(get_the_ID()) . ' ">';
        echo "\n\n\n";
    }
}
//Fim Exemplo de utilização do action hook
