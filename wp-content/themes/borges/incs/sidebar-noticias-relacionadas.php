<aside class="float-right sidebar">
  <h2 class="azul-borges">Notícias Relacionadas</h2>
  <?
  while (have_posts()) {
    the_post();
    ?>
    <article>
      <? the_post_thumbnail('post-thumbnail', array('class' => 'float-left')); ?>
      <div class="titulo-box">
        <h3><? the_title() ?></h3>
        <a href="<? the_permalink() ?>">Saiba +</a>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </article>
    <?
  }
  ?>      
</aside>