<?php
/**
 * Namespace dependent pattern, loaded from main.php header
 * Based on this page : https://css-tricks.com/css-variables-with-php/
 */

header("Content-type: text/css; charset: UTF-8");

$ns = $_GET["ns"];
?>

body.ns-pattern {
    background-image: url(/lib/exe/fetch.php?media=<?php echo $ns; ?>:pattern.png);
}
