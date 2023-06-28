<?php

// if(isset($_POST['name']) && !empty($_POST['name'])){

//     $nome = addcslashes($_POST['name']);
//     $email = addcslashes($_POST['email']);
//     $mensagem = addcslashes($_POST['message']);

//     $to = "marcos_paulo69@outlook.com";
//     $subhect = "Contato - site CECON";
//     $body = "Nome:  ".$nome. "\r\n";
//             "Email: ".$email. "\r\n";
//             "Mensagem: ".$mensagem ;

//     $header = "from: ". \r\n . "Replay-TO:" .$email. "\r\n" ."X=Mailer:PHP/".phpversion();


//     if(mail($to, $subhect, $body, $header)){

//         echo("Email enviando com sucesso");

//     }else{
//         echo("O Email não pode ser enviado ");";";
//     }

// }

date_default_timezone_set('America/Portugal/lisboa');
  //Variáveis
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

  //Compose E-mail
  $arquivo = "
    <html>
      <p><b>Nome: </b>$name</p><br/>
      <p><b>E-mail: </b>$email</p><br/>
      <p><b>Mensagem: </b>$message</p><br/>
      <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
    </html>
  ";
  
  //Emails to whom the form will be sent
  $destino = "marcos_paulo69@outlook.com";
  $assunto = "CLIENTE VINILA";
    
  //This should always exist to ensure the correct display of the characters
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $name <$email>";

  //Send
  mail($destino, $assunto, $arquivo, $headers);
  
  

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    mb_send_mail($destino, $assunto, $arquivo, $headers);
        echo '<div class="status-icon valid"><i class="icon_check"></i></div>';
        echo "<meta http-equiv='refresh' content='10;URL=../index.html'>";
    }
    else{
        echo '<div class="status-icon invalid"><i class="icon_close"></i></div>';
    }




?>