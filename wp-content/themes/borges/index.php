<?
/* if (!is_user_logged_in())
  die(header('Location: '.  get_bloginfo('url').'/embreve.php')); */
get_template_part('incs/head');
get_template_part('incs/topo');
?>

<div class="conteudo">


  <div class='destaques-home float-left'>

    <article>
      <h2>Perda Auditiva</h2>
      <a href='#'>Saiba mais sobre blabalbalbalablabalbalbalabl</a>
    </article>


    <article>
      <h2>Perda Auditiva</h2>
      <a href='#'>Saiba mais sobre blabalbalbalablabalbalbalabl</a>
    </article>


    <article>
      <h2>Perda Auditiva</h2>
      <a href='#'>Saiba mais sobre blabalbalbalablabalbalbalabl</a>
    </article>
  </div>


  <div class="slideshow float-right" id="slideshow">
    <?
    $wp_query = new WP_Query('post_type=slide');
    while (have_posts()) {
      the_post();
      the_post_thumbnail();
    }
    ?>
    <img src="<?bloginfo('template_url')?>/imgs/slide.jpg" />
  </div>   

  <div class="clear"></div>
  <div class='titulo'>
    <span class="linha-titulo"> </span>
    <h2 class="azul-borges">Notícias</h2>
  </div>
  <span class="linha-azul"></span>

  <div class="linha-boxes">

    <?
    $wp_query = new WP_Query(array('cat' => _NOTICIAS, 'posts_per_page' => 4));
    $i = 0;
    while (have_posts()) {
      the_post();
      $classe = $i == 3 ? 'class="no-mg-right box"' : 'class="box mg-box-right"';
      ?>

      <article <?= $classe ?>>
        <a href="<? the_permalink() ?>">
          <?
          if (has_post_thumbnail()) {
            ?><div class="img-box"><? the_post_thumbnail(); ?> </div> <?
          }
          ?>
          <h2 class="seta-azul fonte-textos"><? the_title() ?></h2>
        </a>
      </article>
      <?
      $i++;
    }
    ?>
  </div>
  <div class="clear"></div>




</div>


<? get_template_part('incs/rodape') ?>
