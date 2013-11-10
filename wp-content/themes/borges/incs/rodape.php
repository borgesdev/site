

<footer class="rodape">

  <nav>
    <ul>

      <?php
      // Traz os itens do menu, antes é necessário achar o ID do menu através de get_nav_menu_locations()
      $locations = get_nav_menu_locations();
      $menuItens = wp_get_nav_menu_items($locations['principal']);
      $urlAtual = get_permalink();
      $classeAplicada = false;
      foreach ($menuItens as $menuItem) {
        // Retira a palavra "category" da URL (melhor para SEO)
        $url = str_replace('category/', '', $menuItem->url);
        ?>
        <li><a class="azul-borges" href="<?= $menuItem->url ?>"><?= $menuItem->title ?></a></li>
        <?php
      }
      ?>         
    </ul>

  </nav>  

</footer>


</div>
<!-- Fecha a div com a classe="site" aberta em topo.php -->
<div class="tarja-azul-rodape azul-borges-bg">

  <div class="site">
    <?
    global $wp_query;
    $wp_query = new WP_Query(array('cat' => _UNIDADES));
    //var_dump($wp_query->posts);
    while (have_posts()) {
      the_post();
      ?>
      <section>
        <strong><? the_title() ?>:</strong> <?= strip_tags(get_the_content()) ?><br />Telefone: <?= str_replace('...', '', get_the_excerpt()) ?>
      </section>
      <?
    }
    ?>  
    <div class="float-right creditos">
      Site desenvolvido por: <a href="mailto:magnofd@yahoo.com.br">Magno Dal Magro</a> e <a href="mailto:joaogabrielv@gmail.com">João Gabriel</a>
    </div>
    <div class="clear"></div>
  </div>

</div>

<script type="text/javascript" src="<? bloginfo('template_url') ?>/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<? bloginfo('template_url') ?>/js/cycle.js"></script>
<script type="text/javascript" src="<? bloginfo('template_url') ?>/js/core.js"></script>

