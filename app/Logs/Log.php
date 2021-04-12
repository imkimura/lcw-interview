<?php

namespace App\Logs;

class Log
{
    public function info($msg)
    {
        $levelStr = '';
         
        $levelStr = 'INFO';
       
        $date = date('Y-m-d H:i:s');

        $file = date('Y-m-d').'.log';
    
        $msg = sprintf( "[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL);
        
        file_put_contents($file, $msg, FILE_APPEND);
    }

    public function alert( $msg )
    {
        $levelStr = 'WARNING';
     
        $date = date('Y-m-d H:i:s');

        $file = date('Y-m-d').'.log';
    
        $msg = sprintf( "[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL);
        
        file_put_contents($file, $msg, FILE_APPEND);
    }

    public function error( $msg )
    {
        $levelStr = '';
         
        $levelStr = 'ERROR';
        
        $date = date('Y-m-d H:i:s');

        $file = date('Y-m-d').'.log';
    
        $msg = sprintf( "[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL);
        
        file_put_contents($file, $msg, FILE_APPEND);
    }
}