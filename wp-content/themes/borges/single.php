<?php
$categoria = wp_get_post_categories(get_the_ID());
switch($categoria[0]){
    
    case _NOTICIAS:
        $pagina = 'noticia.php';
        break;
    
    case _EXAMES:
        $pagina = 'exame.php';
        break;    
      
    case _CORPO_CLINICO:
        $pagina = 'equipe.php';
        break;          
      
    default:
        $pagina = '404.php';
        break;
    
}
require_once ($pagina);
?>