<?php
/*
* Plugin Name: Trabalhando com SGBD
* Plugin URI: https://github.com/adrianoaclina
* Description: Exemplo de como lidar com sgbd
* Version: 0.0.1
* Author: Adriano Aclina
* Author URI: https://twitter.com/adrianoaclina
* License: CC BY
*/

register_activation_hook( __FILE__, 'criar_tabela');

function criar_tabela(){

    global $wpdb;

   
    $wpdb->query("create table {$wpdb->prefix}agenda
                 (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                 nome VARCHAR(255) NOT NULL,
                 whatsapp BIGINT UNSIGNED NOT NULL)
                 ");
}

add_action( 'admin_menu', 'gera_item_no_menu' );

function gera_item_no_menu(){
    // Para criar um novo item
    add_menu_page( 'Configurações do Plugin SGDB', 
                    'Grave Novos Contatos',
                    'administrator',
                    'config-plugin-sgdb',
                    'abre_config_plugin_menu',
                    'dashicons-database');

}


function abre_config_plugin_menu(){

    global $wpdb;

    if(isset($_POST['nome']) && isset($_POST['whatsapp'])){
        $wpdb->query("INSERT INTO {$wpdb->prefix}agenda (nome, whatsapp) values('{$_POST['nome']}','{$_POST['whatsapp']}')");
    }


    // $dados = $wpdb->query("SELECT * FROM {$wpdb->prefix}agenda");
    // while($usuario = $wpdb->fetch_assoc($dados)){
        
    // }

    $contatos = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}agenda");

    require 'crud_contato_tpl.php';
}

register_deactivation_hook( __FILE__, 'destruir_tabela' );

function destruir_tabela(){

    global $wpdb;

    $wpdb->query("drop table {$wpdb->prefix}agenda");
}