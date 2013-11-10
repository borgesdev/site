
<div class="site">
  <header>

    <div class="logo-topo float-left">
      <a href="<? bloginfo('url') ?>"><img src="<? bloginfo('template_url') ?>/imgs/logo.png" /></a>
    </div>


    <div class="menu-topo float-right">

      <div class="social">
        <a href="#" title="Twitter" class="twitter"><img src="<? bloginfo('template_url') ?>/imgs/twitter.png" /></a>
        <a href="#" title="Facebook" class="facebook"><img src="<? bloginfo('template_url') ?>/imgs/face.png" /></a>
      </div>
      <div class="clear"></div>

      <nav class="float-right">
        <ul>
          <?php
          // Traz os itens do menu, antes é necessário achar o ID do menu através de get_nav_menu_locations()
          $locations = get_nav_menu_locations();
          $menuItens = wp_get_nav_menu_items($locations['principal']);
          $urlAtual = get_permalink();
          foreach ($menuItens as $menuItem) {
            // Retira a palavra "category" da URL (melhor para SEO)
            $url = str_replace('category/', '', $menuItem->url);
            ?>
            <li class="azul-borges-bg float-left"><div class="corte"></div><a href="<?= $url ?>"><?= $menuItem->title ?></a></li>
            <?php
          }
          ?>          
        </ul>
      </nav>

    </div>

    <!-- Menu mobile -->
    <div class="menu-topo-mobile">
      <div class="menu-topo-mobile-botao">
        <nav><ul><li class="azul-borges-bg"><div class="corte"></div><a href="#">Menu</a></li></ul></nav>
      </div>

      <ul style="display: none">
        <?php
        // Traz os itens do menu, antes é necessário achar o ID do menu através de get_nav_menu_locations()
        $locations = get_nav_menu_locations();
        $menuItens = wp_get_nav_menu_items($locations['principal']);
        foreach ($menuItens as $menuItem) {
          // Retira a palavra "category" da URL (melhor para SEO)
          $url = str_replace('category/', '', $menuItem->url);
          ?>
          <li class="azul-borges-bg"><div class="corte"></div><a href="<?= $url ?>"><?= $menuItem->title ?></a></li>
          <?php
        }
        ?>          
      </ul>
    </div>
    <div class="clear"></div>
    <div class="busca-topo float-right">
      <form action="<? bloginfo('url') ?>">
        <input type="submit" value=""/>
        <input type="text" name="s" />
      </form>
    </div>

    <div class="clear"></div>
  </header>
