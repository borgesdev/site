<?php

if (isset($_POST) && !empty($_POST)) {

  $mensagem = '
  <p><strong>Nome:</strong> ' . strip_tags($_POST['nome']) . '</p>
  <p><strong>Email:</strong> ' . strip_tags($_POST['Email']) . '</p>
  <p><strong>Telefone:</strong> ' . strip_tags($_POST['telefone']) . '</p>
  <p><strong>Mensagem:</strong> ' . nl2br(strip_tags($_POST['mensagem'])) . '</p>
  ';

  // Envia a mensagem
  require_once ('class.phpmailer.php');

  $phpMailer = new PHPMailer();
  $phpMailer->CharSet = 'utf-8';
  $phpMailer->IsHTML();
  $phpMailer->Subject = strip_tags($_POST['assunto']);
  $phpMailer->From = 'nao_responda@site1378649640.provisorio.ws';
  $phpMailer->FromName = strip_tags($_POST['nome']);
  $phpMailer->AddReplyTo(strip_tags($_POST['email']));
  $phpMailer->Body = $mensagem;
  $phpMailer->IsSMTP();

  $phpMailer->SMTPAuth = true;
  $phpMailer->Host = 'smtp.site1378649640.provisorio.ws';
  $phpMailer->Username = 'nao_responda@site1378649640.provisorio.ws';
  $phpMailer->Password = 'n@0r35p0nd@';
  $phpMailer->Port = 587;
 
  //$phpMailer->AddAddress('joaogabrielv@gmail.com');
  $phpMailer->AddAddress('borgesdecarvalho16@yahoo.com.br');

  if (!$phpMailer->Send()) {
    echo $phpMailer->ErrorInfo;
    die();
    //die(header('Location: ' . get_bloginfo('url') . '/contato/?msg=2'));
  }else
    die(header('Location: ' . get_bloginfo('url') . '/contato/?msg=1'));

}
?>
