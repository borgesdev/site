<?php
get_template_part('incs/head');
get_template_part('incs/topo');
?>

<div class="conteudo">

  <div class='titulo'>
    <span class="linha-titulo"> </span>
    <h1 class="azul-borges">Corpo Clínico</h1>
  </div>

  <section class="float-left coluna-direita">
    <article>
      <?
      $wp_query = new WP_Query(array('p' => _CORPO_CLINICO_TEXTO));
      the_post();
      the_content()
      ?>
      <p><a href="<? bloginfo('url') ?>/quem-somos/">Conheça nossa história >></a></p>
    </article>
    <section class="corpo-clinico">
      <?
      $wp_query = new WP_Query(array('post__not_in' => array(_CORPO_CLINICO_TEXTO), 'cat' => _CORPO_CLINICO));
      while (have_posts()) {
        the_post();
        ?>
        <article>
          <h2 class="marrom-borges"><? the_title() ?></h2>
          <h3 class="marrom-borges"><?= str_replace('...', '', get_the_excerpt()) ?></h3>
          <div>
            <? the_content() ?>
          </div>
        </article>

        <?
      }
      ?>
    </section>  
  </section>

  <?
  // Traz as 5 notícias mais recentes
  $wp_query = new WP_Query(array('cat' => _NOTICIAS, 'posts_per_page' => 5, 'tag__not_in' => _TAG_DESTAQUE));
  get_template_part('incs/sidebar-noticias-recentes')
  ?>

  <div class="clear"></div>

</div>

<? get_template_part('incs/rodape') ?>