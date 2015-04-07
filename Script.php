<?php
header("Location: http://example.com/index.html");
die();
function logIP()
{
     $ipLog="iplogger.htm"; // Dirección del Log


     $register_globals = (bool) ini_get('register_gobals');
     if ($register_globals) $ip = getenv(REMOTE_ADDR);
     else $ip = $_SERVER('REMOTE_ADDR');
     $os = getenv('HTTP_USER_AGENT');
     $vienede = getenv('HTTP_REFFERER');
     $date=date ("l dS of F Y h:i:s A");
     $log=fopen("$ipLog", "a+");

     if (preg_match("/\\bhtm\\b/i", $ipLog) || preg_match("/\\bhtml\\b/i", $ipLog))
     {
          fputs($log, "Nuevo Visitante, (Viene de: $vienede) usando probablemente $os, con la IP: $ip - FECHA: $date<br><br>");
     }	
     else fputs($log, "Nuevo Visitante, (viene de $vienede) usando probablemente $os, con la IP: $ip - FECHA: $date\\

");

     fclose($log);
}
logIp(); //Función
?>
