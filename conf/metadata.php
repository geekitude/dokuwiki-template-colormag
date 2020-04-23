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

$meta['layout']             = array('multichoice','_choices' => array('box','mix','wide','box2wide'));
$meta['datelocale']         = array('string');
$meta['longdatestring']     = array('string');
$meta['shortdatestring']    = array('string');
$meta['topbar']             = array('multicheckbox','_choices' => array('date','newsticker','socialnetworks'));
$meta['newsticker']         = array('multicheckbox', '_choices' => array('skip_deleted','skip_minors','skip_subspaces','pages','media'));
$meta['sidebarpos']         = array('multichoice','_choices' => array('left','right'));
$meta['breadcrumbslook']    = array('multichoice', '_choices' => array('classic','pills'));
$meta['breadcrumbsglyphs']  = array('onoff'); /* add glyphs to breadcrumbs to distinguish home, user public page, user home private ns, translated pages (note there will allways be a glyph for home in hierarchical trace) */
$meta['uicolorize']         = array('multicheckbox', '_choices' => array('topbar','breadcrumbs','sidebar','toc','docinfo','footersocket'));
$meta['uicolor']            = array('multichoice','_choices' => array('alt','neu'));
$meta['links']              = array('string');
$meta['dark']               = array('onoff');
$meta['print']              = array('multicheckbox', '_choices' => array('siteheader','docinfo','sitefooter','hrefs'));
