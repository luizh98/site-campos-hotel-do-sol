<?php
	// Inclui o arquivo class.phpmailer.php localizado na mesma pasta do arquivo php 
	include "PHPMailer/PHPMailerAutoload.php"; 

	// Inicia a classe PHPMailer 
	$mail = new PHPMailer(); 

	// Método de envio 
	$mail->IsSMTP(); 

	// Enviar por SMTP 
	$mail->Host = "smtp.gmail.com"; 
	// Você pode alterar este parametro para o endereço de SMTP do seu provedor 
	$mail->Port = 587; 	
	// Usar autenticação SMTP (obrigatório) 
	$mail->SMTPAuth = true; 

	// Usuário do servidor SMTP (endereço de email) 
	// obs: Use a mesma senha da sua conta de email 
	$mail->Username = 'emailhotel@gmail.com'; 
	$mail->Password = 'senha_email'; 

	// Configurações de compatibilidade para autenticação em TLS 
	$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); 

	// Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro. 
	// $mail->SMTPDebug = 2; 

	// Define o remetente
	// Seu e-mail 
	$mail->From = "emailhotel@gmail.com"; 
	// Seu nome 
	$mail->FromName = "Campos Hotel do Sol - Contato"; 

	$from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $subject = $_REQUEST['subject'];
	$message = $_REQUEST['message'];

	// Define o(s) destinatário(s) 
	$mail->AddAddress($from, $name); 

	// Opcional: mais de um destinatário
	// $mail->AddAddress('fernando@email.com'); 

	// Opcionais: CC e BCC
	// $mail->AddCC('joana@provedor.com', 'Joana'); 
	// $mail->AddBCC('roberto@gmail.com', 'Roberto'); 

	// Definir se o e-mail é em formato HTML ou texto plano 
	// Formato HTML . Use "false" para enviar em formato texto simples ou "true" para HTML.
	$mail->IsHTML(true); 

	// Charset (opcional) 
	$mail->CharSet = 'UTF-8'; 

	// Assunto da mensagem 
	$mail->Subject =  $subject; 

	// Corpo do email 
	$mail->Body = $message; 

	// Opcional: Anexos 
	// $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 

	// Envia o e-mail 
	$enviado = $mail->Send(); 

	// Exibe uma mensagem de resultado 
	if ($enviado) 
	{ 
		//echo "Seu <a href="https://www.homehost.com.br/blog/tutoriais/email-marketing/como-usar-o-email-marketing-para-enviar-newsletters/" >email foi enviado</a> com sucesso!"; 
	} else { 
		echo "Houve um erro enviando o email: ".$mail->ErrorInfo; 
	} 


?>
