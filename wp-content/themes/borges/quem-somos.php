<?php
/* Template Name: Quem Somos */

get_template_part('incs/head');
get_template_part('incs/topo');
?>

<div class="conteudo">

  <div class='titulo'>
    <span class="linha-titulo"> </span>
    <h1 class="azul-borges">Quem Somos</h1>
  </div>

  <article class="float-left coluna-direita">

    <div class="position-relative float-left" >
      <div class="corte-superior-esquerdo"></div>
      <img src="<? bloginfo('template_url') ?>/imgs/borges.png" class="quem-somos-img" />
      <div class="quem-somos-img-leg"><strong class="azul-borges">Dr. Borges de Carvalho (Foto - 1972)</strong></div>
    </div>

    <div class="float-left texto-quem-somos">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut luctus augue. Praesent fringilla faucibus volutpat. Phasellus eget sem vehicula, malesuada justo nec, iaculis ligula. Cras placerat laoreet mi vitae laoreet. Mauris eu congue dui, nec condimentum felis. Ut faucibus lorem lectus, nec consectetur nulla convallis vel. Aliquam at rutrum nisi, id hendrerit magna. Donec et purus pharetra, accumsan justo non, laoreet felis. Mauris lacus mauris, consectetur eu nunc ut, placerat lacinia nulla.</p>
      <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec hendrerit arcu justo, eget pretium est tincidunt quis. Vestibulum et commodo urna. Nunc nec pellentesque dui. Aenean ac porta nunc. Donec id suscipit urna. Pellentesque est orci, semper sit amet odio sed, semper condimentum magna. Aliquam vitae sodales lorem. Vestibulum nec dolor in sapien interdum tristique.</p>
      <p>Proin fermentum, leo vel aliquet gravida, lorem nisi varius risus, at pulvinar nibh sapien eget dolor. Nullam posuere convallis diam, et fermentum justo blandit sit amet. Donec malesuada scelerisque metus, sed porta erat gravida eu. Praesent eget eleifend odio, eget porttitor erat. Nunc tristique eros ac ante convallis iaculis. Vestibulum tempor imperdiet ante mattis commodo. Maecenas fermentum ipsum id dui sodales tincidunt. Aenean in velit nec arcu dapibus pellentesque suscipit ac ligula. Quisque ultrices mi aliquet urna sollicitudin rhoncus.</p>

      <a href="<?bloginfo('url')?>/corpo-clinico/">Conheça nosso corpo clínico >></a>

    </div>

  </article>

  <aside class="float-right sidebar">
    <h2 class="azul-borges">Notícias Recentes</h2>
    <?
    $wp_query = new WP_Query(array('cat' => _NOTICIAS, 'posts_per_page' => 5, 'tag__not_in' => _TAG_DESTAQUE));
    while (have_posts()) {
      the_post();
      ?>
      <article>
        <? the_post_thumbnail('post-thumbnail', array('class' => 'float-left')); ?>
        <div>
          <h3><? the_title() ?></h3>
          <a href="<? the_permalink() ?>">Saiba +</a>
        </div>
        <div class="clear"></div>
      </article>
      <?
    }
    ?>      
  </aside>

  <div class="clear"></div>

</div>

<? get_template_part('incs/rodape') ?>