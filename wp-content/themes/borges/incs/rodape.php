

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
<div class="tarja-azul-rodape azul-borges-bg"></div>