<?php

include __DIR__.'/vendor/autoload.php';
include "./Mail/PHPMailerAutoload.php"; 
include "./env.php"; 

use \App\Entity\Venda;
use \App\Logs\Log;

error_reporting(0);
ini_set('display_errors', 0);
$errors = array();
$form_data = array();

session_start();

$_SESSION['email'] = "E-mail enviado com sucesso";

$post = $_POST;

foreach($post as $item) {
    $item = preg_replace('/[^[:alpha:]_]/', '', $item);
}

try {
    $vendas = Venda::index();
    $mail = new PHPMailer(); 
        
    $mail->IsSMTP(); 
        
    $mail->Host = "smtp.gmail.com"; 
        
    $mail->Port = 587; 
        
    $mail->SMTPAuth = true; 
    
    $mail->Username = MAIL_USER; 
    $mail->Password = MAIL_PASSWORD; 
        
    $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); 
    
    $mail->SMTPDebug = 0; 
        
    $mail->FromName = "KMR Vendas"; 
    $mail->From = "noreply@gmail.com"; 
    
    $mail->AddAddress('kimura@univem.edu.br', 'Kimura'); 
    
    $mail->IsHTML(true); 
    
    $mail->CharSet = 'UTF-8'; 
    
    $mail->Subject = "Suas vendas de hoje!"; 
    
    foreach($vendas as $venda) {
        $mail->Body = "Olá, o {$venda->value}, 
            email {$venda->seller_id} entrou em contato informando que 
            <br><br>"; 
        
        $enviado = $mail->Send(); 

        if (!$enviado) {

            Log::error("Email não enviado!", 'error');

        }  else {

            Log::info("Email enviado!");
        }
            
    }
    
    if ($enviado) { 
        echo json_encode(array('success' => true, 'posted' => 'Email foi enviado com sucesso!'));
    } else { 
        echo json_encode(array('error' => true, 'posted' => 'Email não pode ser enviado com sucesso!'));
    } 
    
} catch(Exception $e) {
    
    $form_data['success'] = false;
    $form_data['error'] = 'Erro: '.$mail->ErrorInfo;
    echo json_encode($form_data);
}

?>