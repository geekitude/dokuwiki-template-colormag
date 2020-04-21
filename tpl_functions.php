<?php
/**
 * Dokuwiki ColorMag template
 * Original Wordpress theme URI: https://themegrill.com/themes/colormag/
 * 
 * @link    https://www.dokuwiki.org/template:colormag
 * @author  Simon DELAGE <sdelage@gmail.com>
 * @license GPL 3 (https://www.gnu.org/licenses/gpl-3.0.html)
 * 
 * This file provides template specific custom functions that are
 * not provided by the DokuWiki core.
 * It is common practice to start each function with an underscore
 * to make sure it won't interfere with future core functions.
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

/**
 * INITALIZE
 * 
 * Load usefull informations and plugins' helpers.
 */
function colormag_init() {
    global $colormag;

    // GLYPHS
    // Search for default or custum default SVG glyphs
//    $colormag['glyphs']['about'] = 'help';
    $colormag['glyphs']['acl'] = 'key-variant';
    $colormag['glyphs']['admin'] = 'settings';
    $colormag['glyphs']['config'] = 'tune';
//    $colormag['glyphs']['discussion'] = 'comment-text-multiple';
    $colormag['glyphs']['date'] = 'calendar-month';
    $colormag['glyphs']['editor'] = 'fountain-pen-tip';
    $colormag['glyphs']['ellipsis'] = 'ellipsis';
    $colormag['glyphs']['extension'] = 'puzzle';
    $colormag['glyphs']['extedit'] = 'desktop-classic';
    $colormag['glyphs']['from-playground'] = 'shovel-off';
    $colormag['glyphs']['help'] = 'lifebuoy';
    $colormag['glyphs']['hide'] = 'eye-off';
    $colormag['glyphs']['home'] = 'home';
    $colormag['glyphs']['locked'] = 'lock';
    $colormag['glyphs']['login'] = 'login';
    $colormag['glyphs']['logout'] = 'logout';
    $colormag['glyphs']['lastmod'] = 'calendar-clock';
    $colormag['glyphs']['link'] = 'web';
    $colormag['glyphs']['locked'] = 'lock';
    $colormag['glyphs']['map'] = 'sitemap';
//    $colormag['glyphs']['map-hover'] = 'map-search-outline';
//    $colormag['glyphs']['map-active'] = 'map-search';
//    $colormag['glyphs']['menu'] = 'menu';
    $colormag['glyphs']['namespace-start'] = 'folder-home';
    $colormag['glyphs']['news'] = 'alert-decagram';
    $colormag['glyphs']['pagepath'] = 'folder-open';
    $colormag['glyphs']['parent-namespace'] = 'reply-all';
    $colormag['glyphs']['playground'] = 'shovel';
    $colormag['glyphs']['popularity'] = 'star-half';
    $colormag['glyphs']['previous'] = 'skip-previous';
    $colormag['glyphs']['private-ns'] = 'folder-key';
    $colormag['glyphs']['profile'] = 'account-edit';
    $colormag['glyphs']['public-page'] = 'comment-account';
    $colormag['glyphs']['recycle'] = 'recycle';
    $colormag['glyphs']['refresh'] = 'autorenew';
    $colormag['glyphs']['revert'] = 'step-backward';
    $colormag['glyphs']['save'] = 'floppy';
    $colormag['glyphs']['search'] = 'magnify';
    $colormag['glyphs']['separator'] = 'cards-diamond';
    $colormag['glyphs']['show'] = 'eye';
    $colormag['glyphs']['social'] = 'account-network';
    $colormag['glyphs']['styling'] = 'palette';
    $colormag['glyphs']['translated'] = 'flag';
    $colormag['glyphs']['translation'] = 'translate';
    $colormag['glyphs']['upgrade'] = 'cloud-download';
    $colormag['glyphs']['user'] = 'account';
//    $colormag['glyphs']['unknown-user'] = 'account-alert';
    $colormag['glyphs']['usermanager'] = 'account-group';
//    foreach ($colormag['social'] as $key => $value) {
//        $colormag['glyphs'][$key] = $key;
//    }
    foreach ($colormag['glyphs'] as $key => $value) {
        /*if (is_file(DOKU_CONF."svg/".$key.".svg")) {*/
        /*if (is_file(tpl_incdir().'images/svg/custom/'.$key.'.svg')) {*/
        if (($key != "ellipsis") && (is_file(DOKU_CONF.'svg/'.$key.'.svg'))) {
            //$colormag['glyphs'][$key] = inlineSVG(DOKU_CONF.'svg/'.$key.'.svg', 2048);
            $colormag['glyphs'][$key] = DOKU_CONF.'svg/'.$key.'.svg';
        //} elseif (is_file('.'.tpl_basedir().'images/svg/'.$value.'.svg')) {
        } else {
            //$colormag['glyphs'][$key] = inlineSVG('.'.tpl_basedir().'images/svg/'.$value.'.svg', 2048);
            $colormag['glyphs'][$key] = DOKU_INC.tpl_basedir().'images/svg/'.$value.'.svg';
            $colormag['glyphs'][$key] = DOKU_INC.'lib/tpl/colormag/images/svg/'.$value.'.svg';
            //$colormag['glyphs'][$key] = tpl_basedir().'images/svg/'.$value.'.svg';
        //} else {
        //    $colormag['glyphs'][$key] = inlineSVG(DOKU_INC.'lib/images/menu/00-default_checkbox-blank-circle-outline.svg', 2048);
        }
    }

    // DEBUG
    // Adding test alerts if debug is enabled
    if (($_GET['debug'] == 1) or ($_GET['debug'] == "alerts")) {
        msg("This is an error [-1] alert with a <a href='#'>dummy link</a>", -1);
        msg("This is an info [0] message with a <a href='#'>dummy link</a>", 0);
        msg("This is a success [1] message with a <a href='#'>dummy link</a>", 1);
        msg("This is a notification [2] with a <a href='#'>dummy link</a>", 2);
    }
}/* /colormag_init */

/**
 * Returns body classes according to settings
 */
function colormag_bodyclasses() {
    $classes = array();

    array_push($classes, tpl_getConf('sidebarpos').'-sidebar', (tpl_getConf('dark')) ? 'dark-skin' : '', (strpos(tpl_getConf('print'), 'hrefs') !== false) ? 'printhrefs' : '');
//dbg($classes);
    /* TODO: better home detection than core */
    return rtrim(join(' ', array_filter($classes)));
}/* /colormag_bodyclasses */

function colormag_glyph($glyph, $return = false) {
    global $colormag;
//dbg($glyph);
//if (file_exists($glyph)) {
//    dbg("bingo!");
//}
    if (isset($colormag['social'][$glyph])) {
        $maxsize = 4096;
    } else {
        $maxsize = 2048;
    }
//    if ((isset($colormag['glyphs'][$glyph])) and (file_exists($colormag['glyphs'][$glyph]))) {
    if (file_exists($glyph)) {
        $result = inlineSVG($glyph, $maxsize);
//dbg("ici?");
    } else {
        $result = inlineSVG(DOKU_INC.'lib/images/menu/00-default_checkbox-blank-circle-outline.svg', 2048);
//dbg("là");
    }
    if ($return) {
        return $result;
    } else {
        print $result;
        return 1;
    }
}/* colormag_glyph */

/**
 * The loginform
 * adapted from html_login() because colormag doesn't need autofocus on username input
 *
 * See original function in inc/html.php for details
 */
function colormag_loginform($context = "null") {
    global $lang;
    global $conf;
    global $ID;
    global $INPUT;

    if ($context == "widget") {
        $tmp = explode("</h1>", p_locale_xhtml('login'));
        $title = explode(">", $tmp[0])[1];
        $tmp = str_replace("! ", "!<br />", $tmp[1]);
        $tmp = str_replace(". ", ".<br />", $tmp);
        print '<h6 class="widget-title title-block-wrap clearfix"><span class="label">';
            print $title;
        print '</span></h6>';
        print $tmp;
    } else {
        print p_locale_xhtml('login');
    }
    print '<div>'.NL;

    $form = new Doku_Form(array('id' => 'dw__login'));
    $form->startFieldset($lang['btn_login']);
    $form->addHidden('id', $ID);
    $form->addHidden('do', 'login');
    $form->addElement(form_makeTextField('u', ((!$INPUT->bool('http_credentials')) ? $INPUT->str('u') : ''), $lang['user'], 'username', 'block'));
    $form->addElement(form_makePasswordField('p', $lang['pass'], '', 'block'));
    if($conf['rememberme']) {
        $form->addElement(form_makeCheckboxField('r', '1', $lang['remember'], 'remember__me', 'simple'));
    }
    $form->addElement(form_makeButton('submit', '', $lang['btn_login']));
    $form->endFieldset();

    if(actionOK('register')){
        $form->addElement('<p>'.explode("?", $lang['reghere'])[0].'? '.tpl_actionlink('register','','','',true).'.</p>');
    }

    if (actionOK('resendpwd')) {
        $form->addElement('<p>'.explode("?", $lang['pwdforget'])[0].'? '.tpl_actionlink('resendpwd','','','',true).'.</p>');
    }

    html_form('login', $form);
    print '</div>'.NL;
}/* /colormag_loginform */

/**
 * Adapted from tpl_admin.php file of Bootstrap3 template by Giuseppe Di Terlizzi <giuseppe.diterlizzi@gmail.com>
 */
function colormag_admin() {
    global $ID, $ACT, $auth, $conf, $colormag;

    $admin_plugins = plugin_list('admin');
    $tasks = array('usermanager', 'acl', 'extension', 'config', 'styling', 'revert', 'popularity', 'upgrade');
    $addons = array_diff($admin_plugins, $tasks);
    $adminmenu = array(
        'tasks' => $tasks,
        'addons' => $addons
    );
    foreach ($adminmenu['tasks'] as $task) {
        if(($plugin = plugin_load('admin', $task, true)) === null) continue;
//        if($plugin->forAdminOnly() && !$INFO['isadmin']) continue;
        if($task == 'usermanager' && ! ($auth && $auth->canDo('getUsers'))) continue;
        $label = $plugin->getMenuText($conf['lang']);
        if (! $label) continue;
        if ($task == "popularity") { $label = preg_replace("/\([^)]+\)/","",$label); }
        $class = 'action '.$task;
        if (($ACT == 'admin') and ($_GET['page'] == $task)) { $class .= ' active'; }
        echo sprintf('<li><a href="%s" title="%s"%s>%s%s'.colormag_glyph($colormag['glyphs'][$task], true).'</a></li>', wl($ID, array('do' => 'admin','page' => $task)), ucfirst($task), ' class="'.$class.'"', "", $label);
    }
    $f = fopen(DOKU_INC.'inc/lang/'.$conf['lang'].'/adminplugins.txt', 'r');
    $line = fgets($f);
    fclose($f);
    $line = preg_replace('/=/', '', $line);
    if (count($adminmenu['addons']) > 0) {
        echo '<li class="dropdown-header">'.$line.'<hr/></li>';
        foreach ($adminmenu['addons'] as $task) {
//dbg($task);
            if(($plugin = plugin_load('admin', $task, true)) === null) continue;
            if ($task == "move_tree") {
                $parts = explode('<a href="%s">', $plugin->getLang('treelink'));
                $label = substr($parts[1], 0, -4);
            } else {
                $label = $plugin->getMenuText($conf['lang']);
            }
            if($label == null) { $label = ucfirst($task); }
            $class = 'action '.$task;
            if (($ACT == 'admin') and ($_GET['page'] == $task)) { $class .= ' active'; }
            echo sprintf('<li><a href="%s" title="%s"%s>%s %s'.colormag_glyph($colormag['glyphs'][$task], true).'</a></li>', wl($ID, array('do' => 'admin','page' => $task)), ucfirst($task), ' class="'.$class.'"', "", ucfirst($label));
        }
    }
    echo '<li class="dropdown-header">'.tpl_getLang('cache').'<hr/></li>';
    echo '<li><a href="'.wl($ID, array("do" => $_GET['do'], "page" => $_GET['page'], "purge" => "true")).'">'.tpl_getLang('purgepagecache').colormag_glyph($colormag['glyphs']["recycle"], true).'</a></li>';
    echo '<li><a href="'.DOKU_URL.'lib/exe/js.php">'.tpl_getLang('purgejscache').colormag_glyph($colormag['glyphs']["refresh"], true).'</a></li>';
    echo '<li><a href="'.DOKU_URL.'lib/exe/css.php">'.tpl_getLang('purgecsscache').colormag_glyph($colormag['glyphs']["refresh"], true).'</a></li>';
}/* colormag_admin */
