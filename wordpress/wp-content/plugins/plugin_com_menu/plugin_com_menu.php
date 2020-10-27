<?php
/*
* Plugin Name: Menu Admin
* Plugin URI: https://github.com/adrianoaclina
* Description: Exemplo de como trabalhar com o menuddo admin
* Version: 0.0.1
* Author: Adriano Aclina
* Author URI: https://twitter.com/adrianoaclina
* License: CC
*/
add_action( 'admin_init', 'configs_plugin_menu');

function configs_plugin_menu(){
    register_setting( 'configs-plugin-menu', 'url-api-auth');
    register_setting( 'configs-plugin-menu', 'url-api-endpoint');
}

add_action( 'admin_menu', 'gera_item_no_menu' );

function gera_item_no_menu(){
    // Para criar um novo item
    // add_menu_page( 'Configurações do Plugin Menu', 
    //                 'Config Plugin Manu',
    //                 'administrator',
    //                 'config-plugin-menu',
    //                 'abre_config_plugin_menu',
    //                 'dashicons-airplane');

    add_submenu_page( 'Configurações do Plugin Menu', 
    'Config Plugin Manu',
    'administrator',
    'config-plugin-menu',
    'abre_config_plugin_menu',
    'dashicons-airplane' );
}

function abre_config_plugin_menu(){
    echo "Sou eu mesmo";
}