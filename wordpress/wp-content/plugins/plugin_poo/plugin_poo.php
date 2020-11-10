<?php
/*
* Plugin Name: Menu Exercicio Poo
* Plugin URI: https://github.com/adrianoaclina
* Description: Exercicio da aula do dia 09/11/2020
* Version: 0.0.1
* Author: Adriano Aclina
* Author URI: https://twitter.com/adrianoaclina
* License: CC
*/

if(!defined ( 'WPINC')){
    die;
}

class plugin_menu_exercicio{

    public function __construct(){
        add_action( "admin_init", array($this, 'config_menu_exercicio'));
        add_action( 'admin_menu', array($this, 'gera_item_no_menu_para_exercicio' ));
    }

    public function config_menu_exercicio(){
        register_setting( 'config_menu_exercicio', 'url-link-exercicio-poo' );
        register_setting( 'config_menu_exercicio', 'url-nome-aluno-poo' );
    }
    
    
    function gera_item_no_menu_para_exercicio(){
        // Para criar um novo item
        add_menu_page( 'Menu Exercicio POO', 
                        'Menu Exercicio POO',
                        'administrator',
                        'config_menu_exercicio-poo',
                        array($this, 'abre_menu_exercicio'),
                        'dashicons-category');
    
    }
    
    function abre_menu_exercicio(){
        require 'plugin_poo_tpl.php';
    }
}

Global $plugin_menu_exercicio;

// Instantiate
$plugin_menu_exercicio = new plugin_menu_exercicio();
