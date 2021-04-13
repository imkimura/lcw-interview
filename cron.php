<?php

include __DIR__.'/vendor/autoload.php';
include "./Mail/PHPMailerAutoload.php"; 

use \App\Entity\Venda;
use \App\Entity\Vendedor;
use \App\Mails\Mail;
use \App\Logs\Log;

error_reporting(0);
session_start();
ini_set('display_errors', 0);

$vendedores = Vendedor::index();

$mail = new PHPMailer;
Log::info('Cheguei ate aqui');

$mail = new Mail($mail);

foreach ($vendedores as $vendedor) {
    $total = Venda::totalSalesOfSeller($vendedor->id);

    Log::info('Começando enviar email para -> ' .$vendedor->name. ' | '. $vendedor->email);
    $comissao = number_format(($total->total * 0.085), 2);

    $relatorio = $total->quantidade == 0 ? '': "<br> <b>Total: R$ {$total->total}</b> <br> <b>Comissão: R$ {$comissao}</b>";

    $template = "<div>
        <p style='text-align: left;' >
            <img src='https://upload.wikimedia.org/wikipedia/commons/f/f6/Logo_Locaweb_2017.png' alt='LOCAWEB' style='width: 300px;' />
        </p>
        </div>
        <div style='font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 1.6; color: #222; max-width: 800px; margin-top: 50px;'>
        <p style='text-align: justify;'>
            {$vendedor->name}, aqui está o relatório de todas suas vendas do dia ". date('d/m/Y') ." :
            <br />                                        
            <br />
            Você vendeu um total de <b>{$total->quantidade} produtos</b>
            {$relatorio}
        </p>
        <footer>
            <p>
            Atenciosamente, <br />
            Suporte de lojas locaweb <br />        
            </p>
        </footer>
    </div>";

    $data = (object) [
        'name' => $vendedor->name,
        'email' => $vendedor->email,
        'subject' => 'Relatório Diário - Total de Vendas',
        'template' => $template,
    ];

    $mail->send($data);
    
    Log::info('Enviou email para -> ' . $vendedor->name . ' | '. $vendedor->email);
}

?>