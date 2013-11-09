<?php
get_template_part('incs/head');
get_template_part('incs/topo');

var_dump($_GET);

?>

<div class="conteudo">

  <div class='titulo'>
    <span class="linha-titulo"> </span>
    <h1 class="azul-borges">Resultado da busca</h1>
  </div>

  <section class="float-left coluna-direita linha-boxes busca">
    <?
    if (have_posts()) {
      $i = 1;
      while (have_posts()) {
        the_post();
        ?>

        <article class="float-left <?= $i % 3 == 0 ? 'no-mg-right' : ''; ?>">
          <? if (has_post_thumbnail()) { ?>
            <div class="img-box"><? the_post_thumbnail() ?></div> 
          <? } ?>
          <h2><? the_title() ?></h2>
          <a href="<? the_permalink() ?>">Saiba +</a>
        </article>   

        <?
        echo $i % 3 == 0 ? '<div class="clear"></div>' : '';
        $i++;
      }
    } else {
      ?><h2>Sua busca não retornou resultados.</h2><?
    }
    ?>  
  </section>

  <?
  // Traz as 5 notícias mais recentes
  $wp_query = new WP_Query(array('cat' => _NOTICIAS, 'posts_per_page' => 5, 'tag__not_in' => _TAG_DESTAQUE));
  get_template_part('incs/sidebar-noticias-recentes')
  ?>

  <div class="clear"></div>

</div>

<? get_template_part('incs/rodape') ?>