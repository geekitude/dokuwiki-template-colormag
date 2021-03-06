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
$meta['flexflip']           = array('multicheckbox','_choices' => array('banner','pagenav','sidebar','pagetools','socket'));
$meta['uicolorize']         = array('multicheckbox', '_choices' => array('topbar','pagenav','sidebar','toc','pagetools','docinfo','footersocket'));
$meta['autotheme']          = array('multichoice','_choices' => array('disabled','pageid','banner','widebanner','sidecard'));
$meta['glyphcolors']        = array('multicheckbox', '_choices' => array('social','usertools'));
$meta['topbar']             = array('multicheckbox','_choices' => array('date','newsticker','links'));
$meta['newsticker']         = array('multicheckbox', '_choices' => array('skip_deleted','skip_minors','skip_subspaces','pages','media'));
$meta['topbarlinks']        = array('string');
$meta['datelocale']         = array('string');
$meta['longdate']           = array('string');
$meta['shortdate']          = array('string');
$meta['headerflexalign']    = array('multichoice', '_choices' => array('start','center','end'));
$meta['widgetslook']        = array('multichoice', '_choices' => array('classic','bordered'));
$meta['breadcrumbslook']    = array('multichoice', '_choices' => array('classic','underlined','pills','underlined-nscolored','pills-nscolored'));
$meta['breadcrumbsglyphs']  = array('onoff');
$meta['links']              = array('string');
$meta['licensevisual']      = array('multichoice','_choices' => array('badge','button','none'));
$meta['print']              = array('multicheckbox', '_choices' => array('siteheader','siteheader-banner','widebanner','toc','sidebar','docinfo','sitefooter','hrefs'));
$meta['banner']             = array('string');
$meta['pattern']            = array('string');
$meta['sidecard']           = array('string');
$meta['widebanner']         = array('string');
$meta['uiimagetarget']      = array('multichoice','_choices' => array('image-ns','current-ns','home','image-details','none'));
$meta['cheatsheet']         = array('string');