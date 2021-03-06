<?php
include_once('partition.svg2.php');

function afficher_piano_roll($partition, $scaleX=1, $scaleY=1, $hauteur=15, $largeur=50, $transX=10, $transY=10)
{
    $rang = (count($partition['listenotes']) * 8) + 2;
    $col = 0;
    foreach($partition['listenotes'] as $portee)
    {
        $duration = 0;
        foreach($portee as $note)
        {
            $duration += $note['duree'];    
        }
        $col = $duration > $col ? $duration : $col;
    }

    $w = ($col*$largeur + $transX)*$scaleX;
    $h = ($rang*$hauteur + $transY)*$scaleY;

    return "<!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 
                'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>\n" .
        "<svg  xmlns='http://www.w3.org/2000/svg' width='$w' height='$h'>\n" .
        "<g transform='translate($transX,$transY),scale($scaleX,$scaleY)'>\n" .
        partition2svg($partition, $hauteur, $largeur, $w) .
        "</g>\n</svg>";
}
$t = include_once 'extraction.sax.php';
echo afficher_piano_roll($t);

?>
