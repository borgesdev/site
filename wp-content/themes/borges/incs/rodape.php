

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

<script type="text/javascript" src="<? bloginfo('template_url') ?>/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<? bloginfo('template_url') ?>/js/cycle.js"></script>

<script type="text/javascript">

  if ($('#slideshow').length > 0) {
    $('#slideshow').cycle({
      fx: 'fade',
      speed: 300,
      timeout: 5000
    });

  }
</script>

<?
global $ehNoticia;
// Se estiver numa página interna de notícias, verifica a existência de imagens com alt=destaque e adiciona o estilo próprio
if (isset($ehNoticia)) {
  ?>
  <script type="text/javascript">

    $('.coluna-direita article img[alt="destaque"]').each(function() {
      var imgLargura = $(this).width();
      $(this).wrap('<div class="position-relative" ></div>');
      $(this).parent().wrap('<div style="width:' + imgLargura + 'px"></div>');
      $(this).before('<div class="corte-superior-esquerdo"></div>');
      $(this).after('<div class="corte-inferior-direito"></div>');
      $(this).parent().after('<div class="tarja-img azul-borges-bg"></div>');
   });

  </script>
  <?
}
?>
<script type="text/javascript">
  // Faz a tarja das imagens ser sempre a largura delas - 55px
    $('.tarja-img').each(function() {
      var larguraPai = $(this).parent().width();
      $(this).width(larguraPai - 55);
    });
</script>
