<?php
/*
* Plugin Name: Menu Exercicio
* Plugin URI: https://github.com/adrianoaclina
* Description: Exercicio da aula do dia 26/10/2020
* Version: 0.0.1
* Author: Adriano Aclina
* Author URI: https://twitter.com/adrianoaclina
* License: CC
*/

add_action( "admin_init", 'config_menu_exercicio');

function config_menu_exercicio(){
    register_setting( 'config_menu_exercicio', 'url-link-exercicio' );
    register_setting( 'config_menu_exercicio', 'url-nome-aluno' );
}

add_action( 'admin_menu', 'gera_item_no_menu_para_exercicio' );

function gera_item_no_menu_para_exercicio(){
    // Para criar um novo item
    add_menu_page( 'Menu Exercicio', 
                    'Menu Exercicio',
                    'administrator',
                    'config_menu_exercicio',
                    'abre_menu_exercicio',
                    'dashicons-category');

}

function abre_menu_exercicio(){
    require 'plugin_menu_exercicio_tpl.php';
}