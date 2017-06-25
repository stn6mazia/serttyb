<?php


/*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/

$enviaFormularioParaNome = 'Contato';
$enviaFormularioParaEmail = 'contato@serttyb.com.br';

$caixaPostalServidorNome = 'http://www.serttyb.com.br/ | Contato';
$caixaPostalServidorEmail = 'contato@serttyb.com.br';
$caixaPostalServidorSenha = 'contato2016';

/*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/


/* abaixo as veriaveis principais, que devem conter em seu formulario*/

$remetenteNome  = $_POST['name'];
$remetenteEmail = $_POST['email'];
$telefone  = $_POST['telefone'];
$mensagem = $_POST['mssg'];

$mensagemConcatenada = 'Formulário gerado via website'.'<br/>';
$mensagemConcatenada .= '-------------------------------<br/><br/>';
$mensagemConcatenada .= 'Nome: '.$remetenteNome.'<br/>';
$mensagemConcatenada .= 'E-mail: '.$remetenteEmail.'<br/>';
$mensagemConcatenada .= 'Telefone: '.$telefone.'<br/>';
$mensagemConcatenada .= '-------------------------------<br/><br/>';
$mensagemConcatenada .= 'Mensagem: "'.$mensagem.'"<br/>';


/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/

require_once('./PHPMailer-master/PHPMailerAutoload.php');

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth  = true;
$mail->Charset   = 'utf8_decode()';
$mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);
$mail->Port  = '587';
$mail->Username  = $caixaPostalServidorEmail;
$mail->Password  = $caixaPostalServidorSenha;
$mail->From  = $caixaPostalServidorEmail;
$mail->FromName  = utf8_decode($caixaPostalServidorNome);
$mail->IsHTML(true);
$mail->Subject  = utf8_decode($assunto);
$mail->Body  = utf8_decode($mensagemConcatenada);


$mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));

if(!$mail->Send()){
$mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
}else{
$mensagemRetorno = 'Formulário enviado com sucesso!';
}


}
?>
