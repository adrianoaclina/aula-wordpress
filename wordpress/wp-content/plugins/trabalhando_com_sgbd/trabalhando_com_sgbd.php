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

if(!defined( 'WPINC')){
    die("Acesso negado!");
}
register_activation_hook( __FILE__, 'criar_tabela');

function criar_tabela(){

    global $wpdb;

   
    $wpdb->query("create table {$wpdb->prefix}agenda
                 (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                 nome VARCHAR(255) NOT NULL,
                 whatsapp BIGINT UNSIGNED NOT NULL)
                 ");

    $page_title = 'Contatinhos';
    $page_name = 'Contatinhos para chamar no zap';

    $page = get_page_by_title( $page_title);

    if(!$page){

        $p = [ 'post_title'    => $page_title,
               'post_content'  => '[tela_dinamica_contatos]',
               'post_status'   => 'publish',
               'post_type'     => 'page',
               'comment_status'=> 'closed',
               'ping_status'   => 'closed',
               'post_category' => [1]];
        $page_id = wp_insert_post( $p);


    }else{ 
        $page->post_status = 'publish';
        $page->post_content = '[tela_dinamica_contatos]';
    }
}
add_shortcode( 'tela_dinamica_contatos', 'tela_dinamica');

function tela_dinamica(){

    global $wpdb;
    
    $contatos = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}agenda");

    ob_start();
    
    include "tela_externa_tpl.php";

    return ob_get_clean();
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
    


    if(isset($_GET['editar']) && !isset($_POST['id'])){

        
        $id = preg_replace('/\D/', "", $_GET['editar']);
        $contato = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}agenda where id = $id");

        require 'crud_editar_tpl.php';

    }

    if( isset($_GET['apagar']) && !isset($_POST['nome'])){
        $id = preg_replace('/\D/', "", $_GET['apagar']);

        if($wpdb->query("DELETE FROM {$wpdb->prefix}agenda where id =  $id")){
            $msg = "Contato apagado com sucesso";
        } else{
            $erro = "Erro ao apagar o contato";
        }
        
    }

    if(!isset($_GET['editar']) || isset($_POST['id'])){

        if ( isset($_POST['id'])){

            if( is_numeric($_POST['id']) ){
                $id = $_POST['id'];
                $whatsapp = $_POST['whatsapp'];
                $nome = $_POST['nome'];

                if( $wpdb->query($wpdb->prepare("UPDATE {$wpdb->prefix}agenda set nome = %s, whatsapp = %s where id = %d", $nome, $whatsapp, $id))){

                    $msg = "Contato atualizado com sucesso!";
                }else{
                    $erro = "Erro ao atualizar o contato!";
                }

            }else{

                $erro = "Erro parametro inválido";
            }
        }elseif(isset($_POST['nome']) && isset($_POST['whatsapp'])){
            $wpdb->query("INSERT INTO {$wpdb->prefix}agenda (nome, whatsapp) values('{$_POST['nome']}','{$_POST['whatsapp']}')");
        }
        $contatos = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}agenda");

        require 'crud_contato_tpl.php';
    }

    
    
}

register_deactivation_hook( __FILE__, 'destruir_tabela' );

function destruir_tabela(){

    global $wpdb;

    $wpdb->query("drop table {$wpdb->prefix}agenda");
}

