<?php
$categoria = get_category(get_query_var('cat'),false);
switch($categoria->term_id){
    
    case _NOTICIAS:
        $pagina = 'noticias.php';
        break;
    
    case _CORPO_CLINICO:
        $pagina = 'equipe.php';
        break;

    case _EXAMES:
        $pagina = 'exames.php';
        break;    
      
    default:
        $pagina = '404.php';
        break;
    
}

require_once ($pagina);

?>