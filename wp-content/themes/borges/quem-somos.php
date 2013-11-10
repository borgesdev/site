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

    <div class="position-relative float-left" >
      <div class="corte-superior-esquerdo"></div>
      <img src="<? bloginfo('template_url') ?>/imgs/borges.png" class="quem-somos-img" />
      <div class="quem-somos-img-leg"><strong class="azul-borges">Dr. Borges de Carvalho (Foto - 1972)</strong></div>
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