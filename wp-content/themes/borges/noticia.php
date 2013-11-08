<?php
get_template_part('incs/head');
get_template_part('incs/topo');
the_post();
$ehNoticia = TRUE;
?>

<div class="conteudo">

  <div class='titulo'>
    <span class="linha-titulo"> </span>
    <h1 class="azul-borges">Notícias</h1>
  </div>

  <section class="float-left coluna-direita noticias">
    <h2><? the_title() ?></h2>
    <article>
      <? the_content() ?>
    </article>   

    <div class="todas-noticias"><a href="<? bloginfo('url') ?>/noticias/" class="azul-borges">Todas as notícias</a></div>

  </section>

  <?
  // Traz as 5 notícias mais recentes
  $wp_query = new WP_Query(array('cat' => _NOTICIAS, 'posts_per_page' => 5, 'tag__not_in' => _TAG_DESTAQUE));
  get_template_part('incs/sidebar-noticias-recentes')
  ?>

  <div class="clear"></div>

</div>

<? get_template_part('incs/rodape') ?>