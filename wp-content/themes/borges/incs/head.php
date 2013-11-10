<?php
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


  <?
  // Verifica se está sendo visualizado um post para alterar as meta tags de compartilhamento.
  if (is_single() || is_page()) {
    $description = get_the_excerpt($post->ID);
    $title = get_the_title() . ' | Borges de Carvalho';
  } else {
    $description = '';
    $title = 'Borges de Carvalho';
  }
  ?>  

  <head>

    <meta content="width=device-width, height=420, user-scalable=no" name="viewport" />

    <base href="<?= get_bloginfo('url') ?>/" />
    <meta name="title" content="<?= $title ?>" />
    <link rel="shortcut icon" href="<?= get_bloginfo('template_url') ?>/favicon.png" />
    <meta name="url" content="<? bloginfo('url') ?>" />
    <meta name="description" content="<?= $description ?>" />
    <meta name="keywords" content="otorrino, otorrinos, otorrinolaringologia, otorrinolaringologista, ouvidos, nariz, garganta, rio de janeiro" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="company" content="Borges de Carvalho" />
    <meta name="revisit-after" content="1" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= get_bloginfo('template_url') ?>/style.css" />
    <link rel="stylesheet" href="<?= get_bloginfo('template_url') ?>/style1.css" />
    <!--[if IE]><link rel="shortcut icon" href="<?= get_bloginfo('template_url') ?>/imgs/favicon.png"><![endif]-->
    <link rel="icon" href="<?= get_bloginfo('template_url') ?>/imgs/favicon.png" />

    <? wp_head() ?>
  </head>



  <body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
          return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>




    <?
// Envia formulário de newsletter?

    if (!empty($_POST['news_email'])) {


      $email = addslashes(strip_tags($_POST['news_email']));
      $nome = !empty($_POST['news_nome']) ? addslashes(strip_tags($_POST['news_nome'])) : '';

      $novoContato = '
   {
     "list" : {
       "contacts" : [
         {"email": "' . $email . '", "custom_fields": {"nome": "' . utf8_encode($nome) . '"} }
       ],
       "overwriteattributes" : true
     }
   }  
  ';


      $url = 'https://emailmarketing.locaweb.com.br/api/v1/accounts/51859fe336e1d9f69f002998/lists/51981ee436e1d94ce20013f5/contacts';

      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'X-Auth-Token: UEKZ13j57Pp1Js8siYop2gRkUUzq8UdqkTYTyYt3P6Qr'));
      curl_setopt($curl, CURLOPT_POSTFIELDS, $novoContato);

      $retorno = curl_exec($curl);

      //die(header('Location: '.  get_bloginfo('url').'/'));

      echo '<script type="text/javascript">alert("Cadastro efetuado com sucesso!");</script>';
    }
    ?>
