$(document).ready(function() {

  if ($('#slideshow').length > 0) {
    $('#slideshow').cycle({
      fx: 'fade',
      speed: 300,
      timeout: 5000
    });

  }

  // Verifica se existe uma imagem marcada com o atributo alt="destaque"
  $('.coluna-direita article img[alt="destaque"]').each(function() {
    // Se exitir, coloca o estilo correspondente
    var imgLargura = $(this).width();
    $(this).wrap('<div class="position-relative" ></div>');
    $(this).parent().wrap('<div style="width:' + imgLargura + 'px"></div>');
    $(this).before('<div class="corte-superior-esquerdo"></div>');
    $(this).after('<div class="corte-inferior-direito"></div>');
    $(this).parent().after('<div class="tarja-img azul-borges-bg"></div>');
  });

  // Faz a tarja das imagens ser sempre a largura delas - 55px
  $('.tarja-img').each(function() {
    var larguraPai = $(this).parent().width();
    $(this).width(larguraPai - 55);
  });
});
