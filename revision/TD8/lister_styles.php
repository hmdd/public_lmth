<?php

function lister_styles($screen, $handled, $print, $all) {
    $h1 = "./?s=$screen&amp;h=$handled&amp;p=$print&amp;a=$all";
    $h2 = "./?s=$handled&amp;h=$print&amp;p=$screen";

    return "<ul>".
        "<li><a href=$h1>Permutation des styles</a></li>\n".
        "<li><a href=$h2>Rotation des périphériques</a></li>\n".
        "</ul>\n";
    
}

?>