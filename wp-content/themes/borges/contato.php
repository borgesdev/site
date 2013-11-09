<?
/* Template name: Contato */
get_template_part('incs/head');
get_template_part('incs/topo');
require_once ('contato.codigo.php');
the_post();
?>

<div class="conteudo">

  <div class="topo-contato"></div>
  <div class="clear"></div>
  <div class="contato-bloco">

    <div class="float-left contato-esquerda">

      <div class="mapa">         
       <iframe width="312" height="265"  frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=Rua+Debret,+23+%2F+Centro,+Rio+de+Janeiro+%E2%80%93+RJ&amp;aq=&amp;sll=-22.968477,-43.185517&amp;sspn=0.008861,0.013937&amp;ie=UTF8&amp;hq=&amp;hnear=R.+Debret,+23+-+Centro,+Rio+de+Janeiro,+20030-080&amp;t=m&amp;z=14&amp;ll=-22.907369,-43.174218&amp;output=embed"></iframe>
        <p class="mapa-linha"></p>
      </div>

      <div class="contato-horarios">
        <p class="dados">Horário de funcionamento</p>
        <? the_content() ?>
      </div>

    </div>

    <div class='titulo'>
      <span class="linha-titulo-contato"></span>
      <h1 class="azul-borges">Contato</h1>
    </div>

    <div class="contato-endereco">
      <p class="dados">Email</p>
      <?
      $camposExtras = get_post_custom();
      echo $camposExtras['Email'][0];
      ?> 
      <p class="dados2">Unidades</p>

      <?
      global $wp_query;
      $wp_query = new WP_Query(array('cat' => _UNIDADES));
      //var_dump($wp_query->posts);
      while (have_posts()) {
        the_post();
        $camposExtras = get_post_custom();
        ?>
        <h3 class="marrom-borges"><? the_title() ?></h3>
        <p class="dados-3"><? the_content() ?></p>
        <h4 class="azul-borges">Telefones</h4>
        <div class="telefones">
          <?= str_replace('...', '', get_the_excerpt()) ?>
        </div>
        <p><a href="#" class="localizar-no-mapa" id="<? the_ID() ?>"><< Localizar no mapa</a></p>
        <input type="hidden" id="mapa-<? the_ID() ?>" value="<?= urlencode($camposExtras['localizacao_gmaps'][0]); ?>" />
        <?
      }
      ?>       

    </div>

    <div class="float-right contato-direita"> 

      <form action="" method="post"  enctype="multipart/form-data" id="form-contato">
        <div>
          <div class="styled-select">
            <select name="assunto" id="assunto">
              <option value="">Selecione uma opção</option>
              <option value="Dúvidas">Dúvidas</option>
              <option value="Elogios">Elogios</option>
              <option value="Críticas">Críticas</option>
              <option value="Depoimentos">Depoimentos</option>
            </select>
          </div>
        </div> 

        <div>      
          <input type="text" name="nome" id="nome" placeholder="Nome*"/>
        </div>

        <div>
          <input type="text" name="Email" id="email" placeholder="Email*" />
        </div>
        <div>
          <input type="text" class="ddd" name="ddd" id="ddd" placeholder="DDD*" />
          <input type="text" class="telefone "name="telefone" id="telefone" placeholder="Telefone"/>
        </div>
        <div>
          <textarea name="mensagem" id="mensagem" class="mensagem" placeholder="Mensagem"></textarea>
        </div>
        <div>
          <input type="submit" value="Enviar" id="submit"/>
        </div>
      </form>
    </div>

    <div class="clear"></div>
  </div>
</div>


<? get_template_part('incs/rodape'); ?>
