<?php
require_once('entete_smtp.php');
define('RE_URL', '@^(\w+)://([^/:]*)(:\d+)?(.*)@');
       
function requete_ressource($req, $url) {

    if (!preg_match('RE_URL', $url, $r))
        return "URL incorrecte";
    list(, , $serveur, $port, $ressource) = $r;
    $port = $port ? substr($port,1) :80;
    $d = fsockopen($serveur,$port);
    if (!$d)
        return ($serveur . " sur le port " . $port . " ne répond pas.");
    else {
        if (!$ressource) $ressource = '/';
        fputs($d, "$req $url HTTP/1.1\nHost: $serveur\n\n");
        $status = fgets($d);
        $entetes = array();
        while (strlen($l = fgets($d)) > 2) {
            if (preg_match('RE_ENTETE_SMTP', $l, $x))
                $entetes[$x[1]] = $x[2];
        }
        $page='';
        while ( !feof($d) ) $page .= fgets($d);
        return array($status, $entetes, $page);
   }
}

echo requete_ressource('GET', 'http://www-licence.ufr-info-p6.jussieu.fr:8080');
?> 