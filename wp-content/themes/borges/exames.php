<?php
get_template_part('incs/head');
get_template_part('incs/topo');
?>

<div class="conteudo">

  <div class='titulo'>
    <span class="linha-titulo"> </span>
    <h1 class="azul-borges">Exames</h1>
  </div>

  <section class="float-left coluna-esquerda linha-boxes exames">
    <aside class="float-left">
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

    <?
    // Traz o exame mais recente
    $wp_query = new WP_Query(array('cat' => _EXAMES, 'posts_per_page' => '1'));
    the_post();
    ?>

    <article class="float-left">
      <h1 class="azul-borges"><? the_title(); ?></h1>
      <div class="position-relative">
        <? the_post_thumbnail() ?>
        <div class="corte-inferior-direito"></div>
      </div>
      <div class="tarja-img azul-borges-bg"></div>


      <? the_content() ?>

    </article>

  </section>

  <?
  // Traz as 5 notícias mais recentes
  $wp_query = new WP_Query(array('cat' => _NOTICIAS, 'posts_per_page' => 5, 'tag__not_in' => _TAG_DESTAQUE));
  get_template_part('incs/sidebar-noticias-relacionadas')
  ?>

  <div class="clear"></div>

</div>

<? get_template_part('incs/rodape') ?>