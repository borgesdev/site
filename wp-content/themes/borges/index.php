<?
if (!is_user_logged_in())
  die(header('Location: '.  get_bloginfo('url').'/embreve.php')); 
get_template_part('incs/head');
get_template_part('incs/topo');
?>

<div class="conteudo">


  <div class='destaques-home float-left'>
    <?
    // Traz as notícias marcadas como destaque 
    $wp_query = new WP_Query(array('cat' => _NOTICIAS, 'posts_per_page' => 3, 'tag_in' => _TAG_DESTAQUE));
    $i = 0;
    while (have_posts()) {
      the_post();
      ?>    

      <article>
        <h2 class="azul-borges"><? the_title() ?></h2>
        <a href='<? the_permalink() ?>'><?= get_the_excerpt() ?></a>
      </article>

    <? } ?>

  </div>


  <div class="slideshow float-right" id="slideshow">
    <?
    $wp_query = new WP_Query('post_type=slide');
    while (have_posts()) {
      the_post();
      the_post_thumbnail();
    }
    ?>
    <img src="<? bloginfo('template_url') ?>/imgs/slide.jpg" />
  </div>   

  <div class="clear"></div>
  <div class='titulo'>
    <span class="linha-titulo"> </span>
    <h2 class="azul-borges">Notícias</h2>
  </div>
  <span class="linha-azul"></span>

  <div class="linha-boxes">

    <?
    $wp_query = new WP_Query(array('cat' => _NOTICIAS, 'posts_per_page' => 5, 'tag__not_in' => _TAG_DESTAQUE));
    $i = 0;
    while (have_posts()) {
      the_post();
      ?>

      <article class="float-left <?= $i == 4 ? 'no-mg-right' : ''; ?>">
        <? if (has_post_thumbnail()) { ?>
          <div class="img-box"><? the_post_thumbnail() ?></div> 
        <? } ?>
        <h2><? the_title() ?></h2>
        <a href="<? the_permalink() ?>">Saiba +</a>
      </article>   

      <?
      $i++;
    }
    ?>  

  </div>
  <div class="clear"></div>

  <div class="todas-noticias"><a href="<? bloginfo('url') ?>/noticias/" class="azul-borges">Todas as notícias</a></div>


</div>


<? get_template_part('incs/rodape') ?>
