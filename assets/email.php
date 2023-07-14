<?php
date_default_timezone_set('America/Brasil');
  //Variáveis
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $subject = $_POST['subject'];
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

  //Compose E-mail
  $arquivo = "
    <html>
      <p><b>Assunto:</b>$subject</p><br/>
      <p><b>Nome: </b>$name</p><br/>
      <p><b>E-mail: </b>$email</p><br/>
      <p><b>Mensagem: </b>$message</p><br/>
      <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
    </html>
  ";
  
  //Emails to whom the form will be sent
  $destino = "comercial@empetur.com.br";
  $assunto = "CONTATO: $name";
    
  //This should always exist to ensure the correct display of the characters
  $headers  = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
  $headers .= "From: $name <$email>";

  //Send
  mail($destino, $assunto, $arquivo, $headers);
  
  

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    mb_send_mail($destino, $assunto, $arquivo, $headers);
        echo '<div class="spinner-border text-primary" role="status"</div>';
        echo "<meta http-equiv='refresh' content='10;URL=../index.html'>";
    }
    else{
        echo ("Houve um erro! Pro favor tente novamente mais tarde");
    }




?>