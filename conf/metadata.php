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

$meta['layout']             = array('multichoice','_choices' => array('box','wide','box2wide','mix'));
$meta['uicolorize']         = array('multicheckbox', '_choices' => array('topbar','pageheader','sidebar','toc','docinfo','footersocket'));
$meta['uicolor']            = array('multichoice','_choices' => array('alt','neu'));
$meta['navcolors']          = array('onoff');
$meta['topbar']             = array('multicheckbox','_choices' => array('date','newsticker','socialnetworks'));
$meta['datelocale']         = array('string');
$meta['longdatestring']     = array('string');
$meta['shortdatestring']    = array('string');
$meta['newsticker']         = array('multicheckbox', '_choices' => array('skip_deleted','skip_minors','skip_subspaces','pages','media'));
$meta['breadcrumbslook']    = array('multichoice', '_choices' => array('classic','pills'));
$meta['breadcrumbsglyphs']  = array('onoff');
$meta['sidebarpos']         = array('multichoice','_choices' => array('left','right'));
$meta['links']              = array('string');
$meta['dark']               = array('onoff');
$meta['licensevisual']      = array('multichoice','_choices' => array('badge','button','none'));
$meta['print']              = array('multicheckbox', '_choices' => array('siteheader','docinfo','sitefooter','hrefs'));
