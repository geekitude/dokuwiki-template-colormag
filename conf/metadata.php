<?php
/**
 * Dokuwiki ColorMag template
 * Original Wordpress theme URI: https://themegrill.com/themes/colormag/
 * 
 * @link    https://www.dokuwiki.org/template:spacious
 * @author  Simon DELAGE <sdelage@gmail.com>
 * @license GPL 3 (https://www.gnu.org/licenses/gpl-3.0.html)
 * 
 * Configuration metadata
 */

$meta['topbar']             = array('multicheckbox','_choices' => array('date','newsticker','socialnetworks'));
$meta['sidebarpos']         = array('multichoice','_choices' => array('left','right'));
$meta['links']              = array('string');
$meta['dark']               = array('onoff');
$meta['print']              = array('multicheckbox', '_choices' => array('siteheader','docinfo','sitefooter','hrefs'));
