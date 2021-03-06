<?php
include('../../saisie_fiable.php');
include('re_fichier.php');
include('lister_styles.php');

$s = saisie_fiable($_GET, 's', RE_FICHIER) ? $_GET['s'] : 'screen.css';
$h = saisie_fiable($_GET, 'h', RE_FICHIER) ? $_GET['h'] : 'handled.css';
$p = saisie_fiable($_GET, 'p', RE_FICHIER) ? $_GET['p'] : 'print.css'; 
$a = saisie_fiable($_GET, 'h', RE_FICHIER) ? $_GET['a'] : '';

if (($a) and is_readable($a)) {
    setcookie('all', $a);
} else {
    $a = saisie_fiable($_COOKIE, 'all', RE_FICHIER, 'all.css');
}

include('entete.php');

$as = array('rel' => 'stylesheet', 'type' => 'text/css', 'href' => $s, 'media' => 'screen');
$ah = array('rel' => 'stylesheet', 'type' => 'text/css', 'href' => $h, 'media' => 'handled');
$ap = array('rel' => 'stylesheet', 'type' => 'text/css', 'href' => $p, 'media' => 'print');
$aa = array('rel' => 'stylesheet', 'type' => 'text/css', 'href' => $a);

$links = array($aa,$as,$ah,$ap);
$title = 'EDT HTML, on sen fout';
echo entete($title, $links);
echo "<body>\n".
    "<h1>$title</h1>\n";
echo $a;
echo lister_styles($s,$h,$p,($a == 'all.css') ? 'all2.css' : 'all.css');
include('edt.html');
echo "</body>\n</html>";
?>