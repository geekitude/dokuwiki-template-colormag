<?php
/**
 * Namespace dependent pattern, loaded from main.php header
 * Based on this page : https://css-tricks.com/css-variables-with-php/
 */

header("Content-type: text/css; charset: UTF-8");

$target = $_GET["target"];
?>

body.pattern {
    background-image: url(/lib/exe/fetch.php?media=<?php echo $target; ?>);
}
