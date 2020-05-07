<?php
/**
 * Dokuwiki ColorMag template
 * Original Wordpress theme URI: https://themegrill.com/themes/colormag/
 * Dokuwiki Template URI: http://www.dokuwiki.org/template:colormag
 * 
 * @link    https://www.dokuwiki.org/template:spacious
 * @author  Simon DELAGE <sdelage@gmail.com>
 * @license GPL 3 (https://www.gnu.org/licenses/gpl-3.0.html)
 * 
 * Namespace dependent pattern, loaded from main.php header
 * Based on this page : https://css-tricks.com/css-variables-with-php/
 */

header("Content-type: text/css; charset: UTF-8");

$target = $_GET["target"];
?>

body.pattern {
    background-image: url(/lib/exe/fetch.php?media=<?php echo $target; ?>);
}
