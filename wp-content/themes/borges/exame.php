<?php
get_template_part('incs/head');
get_template_part('incs/topo');
global $post;
$exame = $post;
?>

<div class="conteudo">

  <div class='titulo'>
    <span class="linha-titulo"> </span>
    <h1 class="azul-borges">Serviços</h1>
  </div>

  <section class="float-left coluna-esquerda linha-boxes exames">
    <aside class="float-left lista-exames">
      <ul>

        <?
        $wp_query = new WP_Query(array('cat' => _EXAMES));
        $i = 0;
        while (have_posts()) {
          the_post();
          ?>
          <li> <a class = "<?= get_the_ID() == $exame->ID ? 'azul-borges' : 'marrom-borges' ?>" href = "<? the_permalink() ?>"><? the_title() ?></a></li>
          <?
          $i++;
        }
        ?>    
      </ul>
    </aside>

    <article class="float-left">
      <h1 class="azul-borges"><?= $exame->post_title; ?></h1>
      <? if (has_post_thumbnail($exame->ID)) { ?>
        <div class="position-relative">
          <?= get_the_post_thumbnail($exame->ID) ?>
          <div class="corte-inferior-direito"></div>
        </div>    
        <div class="tarja-img azul-borges-bg"></div>      
      <? } ?>
      <?= $exame->post_content ?>
    </article>

    <aside class="float-left lista-exames lista-exames-abaixo">
      
      <h3><br />Mais serviços:</h3>
      <ul>

        <?
        $wp_query = new WP_Query(array('cat' => _EXAMES));
        $i = 0;
        while (have_posts()) {
          the_post();
          ?>
          <li> <a class="<?= $i == 0 ? 'azul-borges' : 'marrom-borges' ?>" href = "<? the_permalink() ?>"><? the_title() ?></a></li>
          <?
          $i++;
        }
        ?>    
      </ul>
    </aside>        
    
  </section>

  <?
  // Traz as 5 notícias mais recentes
  $wp_query = new WP_Query(array('cat' => _NOTICIAS, 'posts_per_page' => 5, 'tag__not_in' => _TAG_DESTAQUE));
  get_template_part('incs/sidebar-noticias-relacionadas')
  ?>

  <div class="clear"></div>

</div>

<? get_template_part('incs/rodape') ?>