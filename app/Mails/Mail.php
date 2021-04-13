<?php

namespace App\Mails;

use \App\Logs\Log;

include __DIR__.'\..\..\env.php';

class Mail
{   
    private $mail;

    public function __construct($mail) {
        $this->mail  = $mail;
        $this->mail->IsSMTP();                 
        $this->mail->Host = "smtp.gmail.com";                 
        $this->mail->Port = 587; 
            
        $this->mail->SMTPAuth = true; 
        
        $this->mail->Username = MAIL_USER; 
        $this->mail->Password = MAIL_PASSWORD; 
            
        $this->mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );             
        $this->mail->SMTPDebug = 0; 
            
        $this->mail->FromName = "KMR Vendas"; 
        $this->mail->From = "noreply@gmail.com"; 
        
        $this->mail->CharSet = 'UTF-8'; 

        $this->mail->IsHTML(true); 
    }

    public function send($data) {
        Log::info("Set mail!");
        $response = array();
                    
        try 
        {                        
            $this->mail->AddAddress($data->email, $data->name); 
                                                            
            $this->mail->Subject = $data->subject; 
            
            $this->mail->Body = $data->template; 
            
            $enviado = $this->mail->Send(); 
                
            if (!$enviado) {

                Log::error("Email não enviado para: ". $data->email ."!", 'error');

            }  else {

                Log::info("Email enviado!");
            }            
                                    
        } catch(Exception $e) {
            
            Log::error("Email não enviado para: ". $data->email ."!", 'error');
        }
    }
}