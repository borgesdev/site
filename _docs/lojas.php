<?php

/*
  Plugin Name: Contato
  Plugin URI:
  Description: Plugin para criar e gerenciar dados de contato
  Version: 1.0
  Author: João Gabriel
 */

// init do tipo Lojas
add_action('init', 'createContato');
add_action("admin_init", "criaBoxContato");
add_action('save_post', 'saveDataContato');

$prefix = "contato";

function createContato() {
  $labels = array(
      'name' => __('Dados de Contatos'),
      'singular_name' => __('Contato'),
      'menu_name' => 'Contato'
  );

  $args = array(
      'labels' => $labels,
      '_builtin' => false, // It's a custom post type, not built in!
      'rewrite' => array('slug' => 'lojas'),
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => true,
      'has_archive' => true,
      'hierarchical' => false,
      'supports' => array('title', 'excerpt'),
      'menu_position' => null
  );

  register_post_type('lojas', $args);

  //Adiciona novas taxonomias dentro do tipo Lojas

  register_taxonomy("estado", array("lojas"), array("hierarchical" => true, "label" => "Estados",
      "singular_label" => "Estado", "rewrite" => true));
}

function criaBoxLojas() {
  add_meta_box("info-lojas", "Informações da Loja", "addConteudoInfoLojas", "lojas", "advanced", "high");
  //add_meta_box("HTML id", "Titulo da caixa", "Nome da funcao que irá exibir o conteúdo da caixa", "Tipo do post (post, page ou post_type)", "Onde deve aparecer (side, normal ou advanced)", "Prioridade (high ou low)" );
}

//Adiciona conteúdo dentro da caixa e atribuindo os campos as variáveis
function addConteudoInfoLojas() {
  global $post;
  if (get_post_type($post) == "lojas") {
    $custom = get_post_custom($post->ID);

    $destaque_lojas = $custom["destaque_lojas"][0];
    $imagem_lojas = $custom["imagem_lojas"][0];

    echo'<label>destaque: <input size="39" id="destaque_lojas" name="destaque_lojas" type="checkbox"';
    if ($destaque_lojas == "on")
      echo 'checked="checked"'; echo'" /></label><br /><br />
					
					<label>imagem: <input size="39" id="imagem_lojas" name="imagem_lojas" type="text" value="';
    echo $imagem_lojas;
    echo'"/><input id="upload_image_lojas" value="Upload da Imagem" type="button" /></label><br /><br />

				';
  }
}

//Armazena o conteúdo colocado dentro dos campos
function saveDataLojas() {
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    return;
  global $post;
  if (get_post_type($post) == "lojas") {

    update_post_meta($post->ID, "destaque_lojas", $_POST["destaque_lojas"]);
    update_post_meta($post->ID, "imagem_lojas", $_POST["imagem_lojas"]);
    //update_post_meta(post_id, custom_field, new value)
  }
}

/// import media library

function get_wp_admin_scripts_lojas() {

  global $post;
  if (get_post_type($post) == "lojas") {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('jquery');

    wp_register_script('upload-img-lojas', WP_PLUGIN_URL . '/lojas/script-lojas.js', array('jquery', 'media-upload', 'thickbox'), 2);
    wp_enqueue_script('upload-img-lojas');
  }
}

function get_admin_styles_lojas() {
  wp_enqueue_style('thickbox');
}

add_action('admin_print_scripts', 'get_wp_admin_scripts_lojas');
add_action('admin_print_styles', 'get_admin_styles_lojas');

// colunas

add_filter("manage_edit-lojas_columns", "criaColunasLojas");
add_action("manage_posts_custom_column", "addConteudoColunasLojas");

//Cria as colunas de ordenação do tipo Loja
function criaColunasLojas($columns) {
  $columns = array(
      "cb" => "<input type=\"checkbox\" />",
      'title' => __('Title'),
      "estado" => "Estado",
      "destaque_lojas" => "Destaque"
  );

  return $columns;
}

//Adiciona conteúdo ao itens da coluna com relação as variáveis corretas
function addConteudoColunasLojas($column) {
  global $post;
  switch ($column) {
    case "destaque_lojas":
      $custom = get_post_custom();
      echo $custom["destaque_lojas"][0];
      break;
    case "estado":
      echo get_the_term_list($post->ID, 'estado', '', ', ', '');
      break;
  }
}

?>