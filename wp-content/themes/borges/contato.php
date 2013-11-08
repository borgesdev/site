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
         
      <div>         
        <p class="mapa-linha" width="93%" heigh="0px"></p>
      </div>
      <div class="mapa">         
        <iframe width="100%" height="98%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="https://maps.google.com.br/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=Rua+das+Laranjeiras,+260,+Rio+de+Janeiro&amp;aq=&amp;sll=-22.934296,-43.18732&amp;sspn=0.008418,0.013926&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=R.+das+Laranjeiras,+260+-+Laranjeiras,+Rio+de+Janeiro,+22240-003&amp;ll=-22.934296,-43.18732&amp;spn=0.008418,0.013926&amp;z=14&amp;output=embed"></iframe>
      </div>
      
      
      <div class="contato-horarios">
        <p class="dados">Horário de funcionamento</p>
        <? the_content() ?>
      </div>
    
    </div>
    
  <div class='titulo'>
    <span class="linha-titulo-contato"> </span>
    <h1 class="azul-borges">Contato</h1>
  </div>
    
    <div class="contato-endereco">
      <p class="dados">Email</p>
        <? the_content() ?>
      <p class="dados2">Unidades</p>
        <? the_content() ?>
      <p class="dados-3"><? the_content() ?></p>
      <p><a href="#"><< Localizar no mapa</a>
        <? the_content() ?>
      <p class="dados-3"><? the_content() ?></p>
        <? the_content() ?>
      <p><a href="#"><< Localizar no mapa</a>
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
              <option value="Envio de Currículo">Envio de Currículo</option>
            </select>
          </div>
        </div>

        <div id="arquivoUpload" style="display: none">
          <label for="arquivo">Arquivo: (PDF ou DOC)</label>
          <input type="file" name="arquivo" id="arquivo" />
        </div>      

        <div>      
          <input type="text" name="nome" id="nome" value="Nome*" onfocus="if(this.value==='Nome*')this.value='';" onblur="if (this.value==='')this.value='NOME*';"/>
        </div>

        <div>
          <input type="text" name="Email" id="email" value="Email*" onfocus="if(this.value==='email*')this.value='';" onblur="if (this.value==='')this.value='E-MAIL*';"/>
        </div>
        <div>
          <input type="text" class="ddd" name="ddd" id="ddd" value="ddd*" onfocus="if(this.value==='ddd*')this.value='';" onblur="if (this.value==='')this.value='DDD*';"/>
          <input type="text" class="telefone "name="telefone" id="telefone" value="Telefone*" onfocus="if(this.value==='Telefone*')this.value='';" onblur="if (this.value==='')this.value='TELEFONE*';"/>
        </div>
        <div>
          <textarea name="mensagem" id="mensagem" class="mensagem" onfocus="if(this.value==='Mensagem')this.value='';" onblur="if (this.value==='')this.value='Mensagem';">Mensagem</textarea>
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