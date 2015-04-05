<?php
function logIP()
{
     $ipLog="iplogger.htm"; // Your logfiles name here (.txt or .html extensions ok)

     // IP logging function by Dave Lauderdale
     // Originally published at: www.digi-dl.com

     $register_globals = (bool) ini_get('register_gobals');
     if ($register_globals) $ip = getenv(REMOTE_ADDR);
     else $ip = $_SERVER['REMOTE_ADDR'];
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
// Place the below function call wherever you want the script to fire.
logIp();
?>
