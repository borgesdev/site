<?php
/* Template Name: Quem Somos */

get_template_part('incs/head');
get_template_part('incs/topo');
the_post();
?>

<div class="conteudo">

  <div class='titulo'>
    <span class="linha-titulo"> </span>
    <h1 class="azul-borges">Quem Somos</h1>
  </div>

  <article class="float-left coluna-esquerda">

    <div class="position-relative float-left quem-somos-img" >
      <div class="corte-superior-esquerdo"></div>
      <? if (has_post_thumbnail()) the_post_thumbnail() ?>
      <div class="quem-somos-img-leg"><strong class="azul-borges"><?=get_post(get_post_thumbnail_id())->post_content; ?></strong></div>
    </div>

    <div class="float-left texto-quem-somos">
      <? the_content() ?>

      <p><a href="<? bloginfo('url') ?>/corpo-clinico/">Conheça nosso corpo clínico >></a></p>

    </div>

  </article>

  <?
  // Traz as 5 notícias mais recentes
  $wp_query = new WP_Query(array('cat' => _NOTICIAS, 'posts_per_page' => 5, 'tag__not_in' => _TAG_DESTAQUE));
  get_template_part('incs/sidebar-noticias-recentes')
  ?>

  <div class="clear"></div>

</div>

<? get_template_part('incs/rodape') ?>