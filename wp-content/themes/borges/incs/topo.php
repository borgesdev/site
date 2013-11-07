
<div class="site">
  <header>

    <div class="logo-topo float-left">
      <a href="<? bloginfo('url') ?>">Borges</a>
    </div>


    <div class="menu-topo float-right">

      <div class="social float-right">
        <a href="#" title="Twitter" class="twitter">Twitter</a>
        <a href="#" title="Facebook" class="facebook">FB</a>
      </div>
      <div class="clear"></div>

      <nav class="float-right">
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
            <li class="azul-borges-bg"><div class="corte"></div><a href="<?= $url ?>"><?= $menuItem->title ?></a></li>
            <?php
          }
          ?>          
        </ul>
      </nav>
    </div>
    <div class="busca-topo float-right">
      <form>
        <input type="submit" value=""/>
        <input type="text" name="s" />
      </form>
    </div>

    <div class="clear"></div>

  </header>
