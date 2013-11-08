<?php

// Registra um menu para o site
register_nav_menu('principal', 'principal');

// Define as constantes do projeto 
require_once ('defineConstantes.php');

// Habilita thumbnails 
if (function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails');
}

// Retira os atributos height e width dos thumbnails para evitar possíveis conflitos com CSS
function remove_thumbnail_dimensions($html) {
  $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}

add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10);
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10);



// Registra o tipo Slides
$args = array(
    'public' => true,
    'label' => 'Slides',
    'exclude_from_search' => true,
    'supports' => array('title', 'thumbnail', 'excerpt')
);
register_post_type('slide', $args);


/* Personaliza o get_the_excerpt */

function getTheExcerpt($output) {
  $resumo = str_replace('[&hellip;]', '', $output);
  $resumoPalavras = explode(' ', $resumo);
  $resumoNumPalavras = count($resumoPalavras);
  $excerpt = '';
  $i = 0;
  while ($i < 15 && $i < $resumoNumPalavras) {
    $excerpt .= $resumoPalavras[$i] . ' ';
    $i++;
  }
  $excerpt .= '...';

  return $excerpt;
}

add_filter('get_the_excerpt', 'getTheExcerpt');

//********************************************************
// Personalizações para o usuário Editor (e qualquer outro que não tenha privilégios de acessar as opções do blog)
//********************************************************

if (!current_user_can('manage_options')) {

// Personalização da barra superior no wp-admin para o Editor 
  function customizeTopMenu() {
    global $wp_admin_bar;

    // Remove o menu "Novo" do topo
    $wp_admin_bar->remove_menu('new-content');

    // Retira o item para moderação de comentários (que são feitos através do facebook)
    $wp_admin_bar->remove_menu('comments');

    // Retira o logo do WP do topo
    $wp_admin_bar->remove_menu('wp-logo');

    $wp_admin_bar->remove_menu('updates');
  }

  add_action('wp_before_admin_bar_render', 'customizeTopMenu');

// Personalização do menu lateral no wp-admin para o Editor 
  function customizeAdminLeftMenu() {



    remove_menu_page('index.php');                // Retira Painel
    remove_menu_page('edit.php');                 // Retira Posts
    remove_menu_page('upload.php');               // Retira Mídia
    remove_menu_page('edit.php?post_type=page');  // Retira Páginas
    remove_menu_page('edit.php?post_type=slide'); // Retira Slides
    remove_menu_page('edit-comments.php');        // Retira Comentários         
    remove_menu_page('tools.php');                // Retira Configurações


    $primeiroItem = 37;

    // Insere os itens personalizados
    add_menu_page('Slides', 'Slides', 'edit_posts', 'edit.php?post_type=slide', '', get_bloginfo('template_url') . '/imgs/noticias.png', $primeiroItem++);
    add_menu_page('Quem Somos', 'Quem Somos', 'edit_posts', 'post.php?post=' . _QUEM_SOMOS . '&action=edit', '', get_bloginfo('template_url') . '/imgs/noticias.png', $primeiroItem++);
    add_menu_page('Corpo Clínico', 'Corpo Clínico', 'edit_posts', 'edit.php?cat=' . _CORPO_CLINICO, '', get_bloginfo('template_url') . '/imgs/noticias.png', $primeiroItem++);
    add_menu_page('Exames', 'Exames', 'edit_posts', 'edit.php?cat=' . _EXAMES, '', get_bloginfo('template_url') . '/imgs/noticias.png', $primeiroItem++);
    add_menu_page('Notícias', 'Notícias', 'edit_posts', 'edit.php?cat=' . _NOTICIAS, '', get_bloginfo('template_url') . '/imgs/noticias.png', $primeiroItem++);
    add_menu_page('Contato', 'Contato', 'edit_posts', 'post.php?post=' . _CONTATO . '&action=edit', '', get_bloginfo('template_url') . '/imgs/noticias.png', $primeiroItem++);
    add_menu_page('Unidades', 'Unidades', 'edit_posts', 'edit.php?cat=' . _UNIDADES, '', get_bloginfo('template_url') . '/imgs/noticias.png', $primeiroItem++);

    // Insere os itens dos submenus
    add_submenu_page('edit.php?cat=' . _CORPO_CLINICO, 'Listar', 'Adicionar Novo', 'edit_posts', 'post-new.php?cat=' . _CORPO_CLINICO);
    add_submenu_page('edit.php?cat=' . _EXAMES, 'Listar', 'Adicionar Novo', 'edit_posts', 'post-new.php?cat=' . _EXAMES);
    add_submenu_page('edit.php?cat=' . _NOTICIAS, 'Listar', 'Adicionar Nova', 'edit_posts', 'post-new.php?cat=' . _NOTICIAS);
    add_submenu_page('edit.php?cat=' . _UNIDADES, 'Listar', 'Adicionar Nova', 'edit_posts', 'post-new.php?cat=' . _UNIDADES);
  }

  function categoryList($cat) {
    echo '<script>window.location="edit.php?cat=' . $cat . '"</script>';
  }

  add_action('admin_menu', 'customizeAdminLeftMenu');

  // Manipula o que o editor pode ou não fazer
  function manipulaPapeisDeUsuarios() {
    $role = get_role('editor');
    // Pode criar usuários
    $role->add_cap('create_users');
    // Pode excluir usuários
    $role->add_cap('delete_users');
    // Pode visualizar usuários
    $role->add_cap('view_users');
    // Não pode manipular categorias
    $role->add_cap('manage_categories');
  }

  add_action('admin_init', 'manipulaPapeisDeUsuarios');

  // Esconde o aviso de atualização do WP
  function escondeUpdate() {
    echo '<style type="text/css">.update-nag{ display: none}</style>';
  }

  add_action('admin_head', 'escondeUpdate');

// Esconde os filtros por categoria e a possibilidade de se listar todos os posts na tela de listagem de posts,
// Retira também o nome da categoria (q já é exibida no topo), a coluna de comentários e o botão "edição rápida"
// (para evitar que se configure categorias)
  function escondeFiltros() {
    echo '
    <style type="text/css">
      .tablenav.top .alignleft.actions select[name="m"],
      .tablenav.top .alignleft.actions select#cat,
      .tablenav.top .alignleft.actions input#post-query-submit,
      .tablenav.top .view-switch, .column-categories, .column-comments, 
      .subsubsub, .inline, 
      #message p a{ 
          display: none; 
      }
    </style>
    ';
  }

  add_action('admin_head-edit.php', 'escondeFiltros');
  add_action('admin_head-post-new.php', 'escondeFiltros');

  // Retira o link de exclusão e edição de slug se for da categoria Conceito
  function escondeDelLink() {
    //echo '<style type="text/css">#wp-admin-bar-view { display: none; }</style>';
    global $post;
    if ($post->ID == _CONTATO) {
      //echo '<style type="text/css">.deletion, #edit-slug-box { display: none; }</style>';
    }
  }

  add_action('admin_head-post.php', 'escondeDelLink');

  // Faz algumas alterações visuais via Javascript (mais detalhes abaixo)
  function customInterface() {

    $customUIScript = '
      <script src="' . get_bloginfo('template_url') . '/js/jquery-1.9.1.min.js"></script>
      <script>

      $("document").ready(function(){
        ';

    if (isset($_GET['cat']) || isset($_GET['post'])) {

      // Traz o nome e ID da categoria
      if (isset($_GET['cat'])) {
        $categoriaNome = get_the_category_by_ID($_GET['cat']);
        $categoriaId = $_GET['cat'];
      } else {
        $categoria = get_the_category();
        $categoriaNome = $categoria[0]->name;
        $categoriaId = $categoria[0]->term_id;
      }

      // Substitui o nome Posts no alto de cada tela pelo nome da categoria sendo alterada
      // e pre-seleciona a categoria especificada na URL para o conteúdo, não permitindo que o usuário altere no form
      $customUIScript .= '
        $("h2:first").html("' . $categoriaNome . ' ");
        
        // Pre-seleciona a categoria 
        if ($("#categorychecklist").length>0)
          $("#in-category-' . $categoriaId . '").attr("checked", "checked");     
        ';
    }


    // Esconde o botão excluir e ver da listagem, se for institucional
    if (isset($_GET['cat']) && $_GET['cat'] == _QUEM_SOMOS) {
      $customUIScript .= '
        $(".trash").remove();
        $(".view").remove();
        ';
    }

    // Se estiver na index.php, exibe uma mensagem de boas vindas
    if (strpos($_SERVER['PHP_SELF'], '/index.php') !== FALSE) {
      $handle = fopen(dirname(__FILE__) . '/adminWelcome.php', 'r');
      $adminWelcome = fread($handle, filesize(dirname(__FILE__) . '/adminWelcome.php'));
      $adminWelcome = str_replace("\n", '', $adminWelcome);
      $customUIScript.='$("#dashboard-widgets").html(\'' . $adminWelcome . '\');';
    }


    // Esconde o link "Ver post" depois da mensagem 
    $customUIScript .= '
      if ($("#message").length>0)
          $("#message p a").hide();
      ';


    $customUIScript .= '
    });
      </script>
    ';

    echo $customUIScript;
  }

  add_action('admin_print_scripts', 'customInterface');


  // Esconde Opções de Tela e Ajuda
  add_action('admin_head', 'mytheme_remove_help_tabs');

  function mytheme_remove_help_tabs() {
    $screen = get_current_screen();
    $screen->remove_help_tabs();
  }

  // Remove as opções de Visualização
  add_filter('screen_options_show_screen', '__return_false');
}

//Altera o logo do login 
function custom_login_logo() {
  echo '<style type="text/css">' .
  'h1 a { background-image:url(' . get_bloginfo('template_directory') . '/imgs/logo.jpg) !important; width: 319px !important; padding-bottom: 131px !important; background-size: auto !important; border: 0; height: auto !important}' .
  '</style>';
}

add_action('login_head', 'custom_login_logo');

function formataFormularioCategoria() {

  if (isset($_GET['cat'])) {
    echo '<input type="hidden" class="postform" name="parent" id="parent" value="' . $_GET['cat'] . '" />';
  }
}

add_action('category_add_form_fields', 'formataFormularioCategoria');
?>