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
    global $colormag, $JSINFO;

    // SOCIAL LINKS
    $colormag['socials'] = array();
    // Load "social" links from DOKU_CONF/social.local.conf (or tpl/colormag/debug/social.local.conf) to global conf
    if (($_GET['debug'] == 1) or ($_GET['debug'] == "social")) {
        $socialFile = tpl_incdir().'debug/social.local.conf';
    } else {
        $socialFile = DOKU_CONF.'social.local.conf';
    }
    // If file exists...
    if ((@file_exists($socialFile)) and (strpos(tpl_getConf('topbar'), 'socialnetworks') !== false)) {
//dbg($socialFile);
        // ... read it's content
        $colormag['socials'] = confToHash($socialFile);
        $colormag['socials'] = array_filter($colormag['socials']);
        // Sorting array in reverse alphabetical order on keys because they will float to the right (now done by default)
        // krsort($socialFile);
        // Get actual links from file content
//dbg($socialFile);
//dbg(gettype($socials));
//var_dump($socials);
//        if (is_array($colormag['socials'])) {
//            foreach ($socials as $key => $value) {
////dbg($key." => ".$value);
//                if (filter_var($value, FILTER_VALIDATE_URL)) { 
//                    $colormag['socials'][$key] = $value;
//                }
//            }
//        } else {
//            dbg("Socials error: ".$colormag['socials']);
//        }
//dbg($colormag['socials']);
    }

    // GLYPHS
    // Search for default or custum default SVG glyphs
//    $colormag['glyphs']['about'] = 'help';
    $colormag['glyphs']['acl'] = 'key-variant';
//    $colormag['glyphs']['admin'] = 'settings';
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
//    $colormag['glyphs']['login'] = 'login';
//    $colormag['glyphs']['logout'] = 'logout';
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
//    $colormag['glyphs']['user'] = 'account';
//    $colormag['glyphs']['unknown-user'] = 'account-alert';
    $colormag['glyphs']['usermanager'] = 'account-group';
    foreach ($colormag['socials'] as $key => $value) {
        $colormag['glyphs'][$key] = $key;
    }
//dbg($colormag['glyphs']);
    foreach ($colormag['glyphs'] as $key => $value) {
        /*if (is_file(DOKU_CONF."glyphs/".$key.".svg")) {*/
        /*if (is_file(tpl_incdir().'images/glyphs/custom/'.$key.'.svg')) {*/
        if (($key != "ellipsis") && (is_file(DOKU_CONF.'glyphs/'.$key.'.svg'))) {
            //$colormag['glyphs'][$key] = inlineSVG(DOKU_CONF.'glyphs/'.$key.'.svg', 2048);
            $colormag['glyphs'][$key] = DOKU_CONF.'glyphs/'.$key.'.svg';
        //} elseif (is_file('.'.tpl_basedir().'images/glyphs/'.$value.'.svg')) {
        } else {
            //$colormag['glyphs'][$key] = inlineSVG('.'.tpl_basedir().'images/glyphs/'.$value.'.svg', 2048);
            $colormag['glyphs'][$key] = DOKU_INC.tpl_basedir().'images/glyphs/'.$value.'.svg';
            $colormag['glyphs'][$key] = DOKU_INC.'lib/tpl/colormag/images/glyphs/'.$value.'.svg';
            //$colormag['glyphs'][$key] = tpl_basedir().'images/glyphs/'.$value.'.svg';
        //} else {
        //    $colormag['glyphs'][$key] = inlineSVG(DOKU_INC.'lib/images/menu/00-default_checkbox-blank-circle-outline.svg', 2048);
        }
    }
//dbg($colormag['glyphs']);

    // CURRENT NS AND PATH
    // Get current namespace and corresponding path (resulting path will correspond to namespace's pages, media or conf files)
//    //$colormag['currentNs'] = getNS(cleanID($id));
    $colormag['ns']['current'] = $INFO['namespace'];
////dbg($colormag['currentNs']);
////    if ((isset($colormag['trans']['parts'][1])) and ($colormag['trans']['parts'][1] != null)) {
//////dbg($colormag['trans']['parts']);
////        if (strpos($conf['plugin']['translation']['translations'], $conf['lang']) !== false) {
//////dbg("ici? ".$conf['lang']);
////            $colormag['untranslatedNs'] = $conf['lang'].":".getNS(cleanID($colormag['trans']['parts'][1]));
////        } else {
//////dbg("là?");
////            $colormag['untranslatedNs'] = getNS(cleanID($colormag['trans']['parts'][1]));
////        }
////    } else {
////        $colormag['untranslatedNs'] = $colormag['currentNs'];
////    }
//////dbg($colormag['baseNs']);
////    if ($colormag['currentNs'] != null) {
////        $colormag['currentPath'] = "/".str_replace(":", "/", $colormag['currentNs']);
////    } else {
////        $colormag['currentPath'] = "/";
////    }
//dbg($colormag['ns']['current']);

    // CURRENT NS' PARENTS
    $colormag['parents'] = array();
    $parts = explode(":", $ID);
//dbg($parts);
    $tmp = null;
    if (count($parts) >= 1) {
//dbg($parts);
        for ($i = 0; $i < count($parts) - 1; $i++) {
            $tmp .= ":".$parts[$i];
            if (ltrim($tmp.":".$conf['start'], ":") != $ID) {
                array_push($colormag['parents'], ltrim($tmp.":".$conf['start'], ":"));
            }
        }
    }
    // Add `start` at begining of $colormag['parents'] array if needed
    if ($colormag['parents'][0] != $conf['start']) {
        array_unshift($colormag['parents'], $conf['start']);
    }
//dbg($colormag['parents']);

    // BUILD LAST CHANGES LIST
//    if ((strpos(tpl_getConf('topbar'), 'newsticker') !== false) and ($ID != $conf['start'])) {
    if (strpos(tpl_getConf('topbar'), 'newsticker') !== false) {
    // Retrieve number of last changes to show from digit at the end of setting ("other" field)
        $colormag['recents'] = array();
        $showLastChanges = intval(end(explode(',', tpl_getConf('newsticker'))));
        $flags = 0;
        if (strpos(tpl_getConf('newsticker'), 'skip_deleted') !== false) {
            $flags = RECENTS_SKIP_DELETED;
        }
        if (strpos(tpl_getConf('newsticker'), 'skip_minors') !== false) {
            $flags += RECENTS_SKIP_MINORS;
        }
        if (strpos(tpl_getConf('newsticker'), 'skip_subspaces') !== false) {
            $flags += RECENTS_SKIP_SUBSPACES;
        }
        if ((strpos(tpl_getConf('newsticker'), 'pages') !== false) and (strpos(tpl_getConf('newsticker'), 'media') !== false)) {
            $flags += RECENTS_MEDIA_PAGES_MIXED;
        } if ((strpos(tpl_getConf('newsticker'), 'pages') === false) and (strpos(tpl_getConf('newsticker'), 'media') !== false)) {
            $flags += RECENTS_MEDIA_CHANGES;
        }
        $colormag['recents'] = getRecents(0,$showLastChanges,$colormag['ns']['current'],$flags);
//dbg($colormag['recents']);
    }

    // JSINFO
    // Store options into $JSINFO for later use
    if ((strpos(tpl_getConf('topbar'), 'newsticker') !== false) and ($colormag['recents'] != null) and is_array($colormag['recents'])) {
        $JSINFO['LoadNewsTicker'] = true;
    } else {
        $JSINFO['LoadNewsTicker'] = false;
    }
//    if (strpos(tpl_getConf('stickies'), 'pageheader') !== false) {
//        $JSINFO['StickyPageheader'] = true;
//    } else {
//        $JSINFO['StickyPageheader'] = false;
//    }
//    if (tpl_getConf('scrollspyToC')) {
//        $JSINFO['LoadGumshoe'] = true;
//    } else {
//        $JSINFO['LoadGumshoe'] = false;
//    }
//    $JSINFO['Animate'] = tpl_getConf('animate');
//$JSINFO['ScrollspyToc'] = tpl_getConf('scrollspyToc');
//dbg($JSINFO);

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
    global $showSidebar, $ID;

    $classes = array();

//    if ($showSidebar) {
//        if (tpl_getConf('sidebarpos') == "left") {
//            $sidebar = "left-sidebar";
//        } else {
//            $sidebar = "right-sidebar";
//        }
//        if (strpos(tpl_getConf('stickies'), 'sidebar') !== false) {
//            $sidebar .= " sticky-sidebar";
//        }
//        if ((strpos(tpl_getConf('extractible'), 'sidebar') !== false) and ((tpl_getConf('layout') == "boxed") or (tpl_getConf('layout') == "mix") or (tpl_getConf('layout') == "box2full")) and (tpl_getConf('sidebarPos') == "left")) {
//            $sidebar .= " extractible-sidebar";
//        }
//    } else {
//        $sidebar = "no-sidebar";
//    }

    if (($_GET['debug'] == 1) or ($_GET['debug'] == 'images') or ($_GET['debug'] == 'pattern')) {
            $pattern = "dbg-pattern";
    } elseif (tpl_getConf('bodybg') == "pattern") {
        $pattern = tpl_getMediaFile(array(':'.getNS($ID).':pattern.png', ':wiki:pattern.png', 'images/pattern.png'), false, $patternSize);
        if (strpos($pattern, 'wiki') !== false) {
            $pattern = "wiki-pattern";
        } elseif ($pattern == "/lib/tpl/colormag/images/pattern.png") {
            $pattern = "tpl-pattern";
        } else {
            $pattern = "ns-pattern";
        }
    } else {
        $pattern = null;
    }

//    array_push($classes, $sidebar, tpl_getConf('layout').'-layout', (strpos(tpl_getConf('flexflip'), 'banner') !== false) ? 'banner-flip' : '', (strpos(tpl_getConf('flexflip'), 'pageheader') !== false) ? 'pageheader-flip' : '', (strpos(tpl_getConf('flexflip'), 'sidebar') !== false) ? 'sidebar-flip' : '', (strpos(tpl_getConf('flexflip'), 'pagetools') !== false) ? 'pagetools-flip' : '', (strpos(tpl_getConf('flexflip'), 'socket') !== false) ? 'socket-flip' : '', tpl_getConf('uicolor').'-ui', (tpl_getConf('navcolors')) ? 'navcolors' : '', (tpl_getConf('dark')) ? 'dark-skin' : '', (strpos(tpl_getConf('print'), 'hrefs') !== false) ? 'printhrefs' : '', ($_GET['debug']==1) ? 'debug' : '');
//    array_push($classes, $pattern, $showSidebar ? ((strpos(tpl_getConf('flexflip'), 'sidebar') !== false) ? 'right-sidebar' : 'left-sidebar') : 'no-sidebar', tpl_getConf('layout').'-layout', (strpos(tpl_getConf('flexflip'), 'banner') !== false) ? 'banner-flip' : '', (strpos(tpl_getConf('flexflip'), 'pageheader') !== false) ? 'pageheader-flip' : '', (strpos(tpl_getConf('flexflip'), 'sidebar') !== false) ? 'sidebar-flip' : '', (strpos(tpl_getConf('flexflip'), 'pagetools') !== false) ? 'pagetools-flip' : '', (strpos(tpl_getConf('flexflip'), 'socket') !== false) ? 'socket-flip' : '', tpl_getConf('uicolor').'-ui', (tpl_getConf('navcolors')) ? 'navcolors' : '', (tpl_getConf('dark')) ? 'dark-skin' : '', (strpos(tpl_getConf('print'), 'hrefs') !== false) ? 'printhrefs' : '', ($_GET['debug']==1) ? 'debug' : '');
    array_push($classes, $pattern, $showSidebar ? ((strpos(tpl_getConf('flexflip'), 'sidebar') !== false) ? 'right-sidebar' : 'left-sidebar') : 'no-sidebar', tpl_getConf('layout').'-layout', (strpos(tpl_getConf('flexflip'), 'banner') !== false) ? 'banner-flip' : '', (strpos(tpl_getConf('flexflip'), 'pageheader') !== false) ? 'pageheader-flip' : '', (strpos(tpl_getConf('flexflip'), 'sidebar') !== false) ? 'sidebar-flip' : '', (strpos(tpl_getConf('flexflip'), 'pagetools') !== false) ? 'pagetools-flip' : '', (strpos(tpl_getConf('flexflip'), 'socket') !== false) ? 'socket-flip' : '', tpl_getConf('uicolor').'-ui', (tpl_getConf('dark')) ? 'dark-skin' : '', (strpos(tpl_getConf('print'), 'hrefs') !== false) ? 'printhrefs' : '', ($_GET['debug']==1) ? 'debug' : '');
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
//    if (isset($colormag['socials'][$glyph])) {
//        $maxsize = 4096;
//    } else {
//        $maxsize = 2048;
//    }
//    dbg($maxsize);
//    if ((isset($colormag['glyphs'][$glyph])) and (file_exists($colormag['glyphs'][$glyph]))) {
    if (file_exists($glyph)) {
//        $result = inlineSVG($glyph, $maxsize);
        $result = inlineSVG($glyph, 4096);
//dbg("ici?");
    } else {
        $result = inlineSVG(DOKU_INC.'lib/images/menu/00-default_checkbox-blank-circle-outline.svg', 2048);
//dbg("là");
    }
    if ($return) {
//dbg("ici aussi?");
//dbg($result);
        return $result;
    } else {
//dbg("là");
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

function colormag_usertools() {
    global $ID, $ACT, $lang, $INFO;

    $objects = (new \dokuwiki\Menu\UserMenu())->getItems();
    $object =  (array) $objects;
    foreach ($object as $key => $value) {
        $field = (array) $value;
//        if (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y') or (tpl_getConf('headertoolsIcons') == 0)) {
        if (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) {
            $class = null;
            //$icon = null;
        } else {
            $class = ' class="a11y"';
            //$icon = $field["\0*\0svg"];
        }
        $icon = $field["\0*\0svg"];
        if ($field["\0*\0type"] == "login") {
            if ($ACT == "denied") {
                print '<li class="menu-item action login"><a href="#colormag__content" rel="nofollow" title="'.$lang['btn_login'].'">'.inlineSVG($icon).'<span'.$class.'>'.$lang['btn_login'].'</span></a></li>';
            } else {
                print '<li class="menu-item action login"><a href="#colormag__userwidget" rel="nofollow" title="'.$lang['btn_login'].'">'.inlineSVG($icon).'<span'.$class.'>'.$lang['btn_login'].'</span></a></li>';
            }
        } elseif (($field["\0*\0type"] == "register") && ($ACT != "register")) {
            print '<li class="menu-item action register"><a href="/doku.php?id='.$ID.'&amp;do=register" rel="nofollow" title="'.$lang['btn_register'].'">'.inlineSVG($icon).'<span'.$class.'>'.$lang['btn_register'].'</span></a></li>';
        } elseif ($field["\0*\0type"] == "profile") {
            //print '<li class="action profile"><a href="/doku.php?id='.$ID.'#colormag__userwidget" rel="nofollow" title="'.$lang['profile'].'">'.inlineSVG($field["\0*\0svg"]).'<span class="a11y">'.$lang['profile'].'</span></a></li>';
            print '<li class="menu-item action profile"><a href="#colormag__userwidget" rel="nofollow" title="'.$lang['profile'].'">'.inlineSVG($icon).'<span'.$class.'>'.$lang['profile'].'</span></a></li>';

            //PAGES PERSOS MANQUANTES
            // Custom UserTools
            //if ($uhp['private']['id']) {
            //    print '<li>';
            //        tpl_link(wl($uhp['private']['id']),$uhp['private']['string'].inlineSVG($colormag['glyphs']['private']),' title="'.$uhp['private']['id'].'"');
            //    print '</li>';
            //}
            //if ($uhp['public']['id']) {
            //    print '<li>';
            //        tpl_link(wl($uhp['public']['id']),$uhp['public']['string'].inlineSVG($colormag['glyphs']['public']),' title="'.$uhp['public']['id'].'"');
            //    print '</li>';
            //}

        } elseif (($field["\0*\0type"] == "admin") && ($_SERVER['REMOTE_USER'] != NULL) && ($INFO['isadmin'])) {
            print '<li class="menu-item menu-item-has-children action admin">';
                print '<a href="/doku.php?id='.$ID.'&do=admin" rel="nofollow" title="'.$lang['btn_admin'].'">'.inlineSVG($icon).'<span'.$class.'>'.$lang['btn_admin'].'</span></a>';
                print '<ul class="sub-menu">';
                    colormag_admindropdown();
                print '</ul>';
            print '</li><!-- .action.admin -->';
        } elseif ($field["\0*\0type"] == "logout") {
            print '<li class="menu-item action logout"><a href="/doku.php?id='.$ID.'&amp;do=logout&amp;sectok='.$field["\0*\0params"]['sectok'].'" rel="nofollow" title="'.$lang['btn_logout'].'">'.inlineSVG($icon).'<span'.$class.'>'.$lang['btn_logout'].'</span></a></li>';
        } else {
            print '<li class="menu-item action debug '.$field["\0*\0type"].'"><a title="'.$field["\0*\0type"].'">'.inlineSVG($icon).'<span'.$class.'>'.$field["\0*\0type"].'</span></a></li>';
//dbg($field["\0*\0type"]);
//dbg($field["\0*\0type"]);
//dbg($field["\0*\0svg"]);
//dbg($lang['btn_'.$field["\0*\0type"]]);
//dbg($field);
        }
    }
}/* /colormag_usertools */

/**
 * Adapted from tpl_admin.php file of Bootstrap3 template by Giuseppe Di Terlizzi <giuseppe.diterlizzi@gmail.com>
 */
function colormag_admindropdown() {
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

/**
 * RETURN A DATE
 * 
 * @param string    $type "long" for long date based on 'dateString' setting, "short" for numeric
 * @param integer   $timestamp timestamp to use (null for current server time)
 * @param bool      $clock if true, add hour to the result
 * @param bool      $print if true, print the result instead of returning it
 */
function colormag_date($type = "long", $timestamp = null, $clock = false, $return = false) {
    global $conf;
    $datelocale = tpl_getConf('datelocale');
    if ($datelocale != null) {
        if (strpos($datelocale, ',') !== false) {
            $datelocale = explode(",", $datelocale)[1];
        }
        setlocale(LC_TIME, $datelocale);
    }
    if ($type == "short") {
        $format = tpl_getConf('shortdatestring');
    } else {
        $format = tpl_getConf('longdatestring');
    }
    if ($clock) {
        $format .= ' %H:%M';
    }
    if ($timestamp == null) {
        $result = utf8_encode(ucwords(strftime($format)));
    } else {
        $result = utf8_encode(ucwords(strftime($format, $timestamp)));
    }
    if ($return) {
        return $result;
    } else {
        print $result;
        return 1;
    }
}

/**
 * PRINT LAST CHANGES LIST
 * 
 * Print an <ul> loaded with @param last changes.
 *
 * @param integer   $n number of last changes to show in the list
 */
function colormag_newsticker($context = null) {
    global $colormag, $conf, $lang;
//dbg($colormag['recents']);

    $mediaPath = str_replace("/pages", "/media", $conf['datadir']);
    if (count($colormag['recents']) > 1) {
        print '<ul class="js-lastchanges">';
    }
    $i = 0;
    foreach ($colormag['recents'] as $key => $value) {
        $details = null;
        if ($value['sum'] != null) {
            //$details = ucfirst(trim($value['sum'], "."));
            $details = ucfirst(trim($value['sum'], "."));
        } else {
            $details = ucfirst(trim(str_replace(":", "", $lang['mail_changed']), chr(0xC2).chr(0xA0)));
        }
        if ($value['date'] != null) {
            $details .= " (".colormag_date("long", $value['date'], false, true).")";
        }
        if ($context == "landing") {
            $details .= ".";
        }
        //print '<li title="'.$value['id'].'">';
        if (count($colormag['recents']) > 1) {
            print '<li title="'.$details.'">';
        } else {
            print '<span title="'.$details.'">';
        }
            if ($value['media']) {
                if (is_file($mediaPath."/".str_replace(":", "/", $value['id']))) {
                    $exist = "wikilink1";
                } else {
                    $exist = "wikilink2";
                }
            } else {
                if (page_exists($value['id'])) {
                    $exist = "wikilink1";
                } else {
                    $exist = "wikilink2";
                }
            }
            if (($context == null) or ($conf['useheading'] == 0) or (p_get_first_heading($value['id']) == null)) {
                $pageName = $value['id'];
            } else {
                $pageName = p_get_first_heading($value['id']);
            }
            if ($value['media']) {
                tpl_link(
                    ml($value['id'],'',false),
                    $pageName,
                    'class="'.$exist.' medialink"'
                );
            } else {
                tpl_link(
                    wl($value['id']),
                    $pageName,
                    'class="'.$exist.'"'
                );
            }
            $by = null;
            if ($value['user'] != null) {
                $by = " ".$lang['by']." ";
            }
            if ($context == null) {
                //print '<span class="display-none xs-display-initial md-display-none wd-display-initial">'.$by.'<span class="text-capitalize"><bdi>'.$value['user'].'</bdi></span></span>';
                print '<span class="display-none xs-display-initial">'.$by.'<span class="text-capitalize"><bdi>'.$value['user'].'</bdi></span></span>';
            }
            $i++;
        if (count($colormag['recents']) > 1) {
            print '</li>';
        } else {
            print '</span>';
        }
    }
    if (count($colormag['recents']) > 1) {
        print '</ul>';
    }
}

/**
 * PRINT HIERARCHICAL BREADCRUMBS, adapted from core (template.php) to use a CSS separator solution and respect existing/non-existing page link colors
 *
 * This code was suggested as replacement for the usual breadcrumbs.
 * It only makes sense with a deep site structure.
 *
 * @return bool
 */
function colormag_youarehere() {
    global $conf, $ID, $lang, $colormag;

    // check if enabled
    if(!$conf['youarehere']) return false;

    $parts = explode(':', $ID);
    $count = count($parts);
//dbg($parts);
    print '<li class="label"><span title="'.rtrim($lang['youarehere'], ':').'">'.$lang['youarehere'].'</span></li>';
    // print the startpage unless we're in translated namespace (in wich case trace will start with current language start page)
//dbg($colormag['trans']);
    //if ((isset($colormag['trans']['parts'][0])) and (isset($colormag['trans']['defaultlang'])) and ($colormag['trans']['parts'][0] == $colormag['trans']['defaultlang'])) {
    if (((isset($colormag['trans']['parts'][0])) and (isset($colormag['trans']['defaultlang'])) and ($colormag['trans']['parts'][0] == $colormag['trans']['defaultlang'])) or ((!plugin_isdisabled('translation')) and (strpos($conf['plugin']['translation']['translations'], $colormag['trans']['defaultlang']) === false)) or (plugin_isdisabled('translation'))) {
        print '<li>'.tpl_pagelink(':'.$conf['start'], null, true).'</li>';
    }
    // print intermediate namespace links
    $part = '';
    for($i = 0; $i < $count - 1; $i++) {
        $part .= $parts[$i].':';
//dbg($part);
        $page = $part;
        print "<li>";
            if (p_get_metadata($page.$conf['start'], 'plugin_croissant_bctitle') != null) {
                tpl_pagelink($page, p_get_metadata($page.$conf['start'], 'plugin_croissant_bctitle'));
            } else {
//dbg("eh ben?".$page);
                tpl_pagelink($page);
            }
        print "</li>";
    }

    // print current page, skipping start page, skipping for namespace index
    resolve_pageid('', $page, $exists);
    if(isset($page) && $page == $part.$parts[$i]) {
        return true;
    }
    $page = $part.$parts[$i];
    if ($page == $conf['start']) {
        return true;
    }
    print "<li>";
        if (p_get_metadata($page, 'plugin_croissant_bctitle') != null) {
            tpl_pagelink($page, p_get_metadata($page, 'plugin_croissant_bctitle'));
        } else {
            tpl_pagelink($page);
        }
    print "</li>";
    return true;
}/* /colormag_youarehere */

/**
 * PRINT TRACE BREADCRUMBS, adapted from core (template.php) to use a CSS separator solution and respect existing/non-existing page link colors
 *
 * @return bool
 */
function colormag_trace() {
    global $lang, $conf, $ID;

    //check if enabled
    if(!$conf['breadcrumbs']) return false;

    $crumbs = breadcrumbs(); //setup crumb trace
//dbg($crumbs);
    // Make sure current page crumb is last in list (this also occurs with 'dokuwiki' template so it seems to be a core code minor bug)
    // COULD BE FIXED WITH FOLLOWING LINE BUT THIS BREAKS TWISTIENAV AS IT IS BASED ON CORE BREADCRUMBS()
    //$value = $crumbs[$ID];
    //unset($crumbs[$ID]);
    //$crumbs = array_merge($crumbs); 
    //$crumbs[$ID] = $value;
//dbg($crumbs);


    if (count($crumbs) > 0) {
//dbg($crumbs);
        //render crumbs, highlight the last one
        print '<li class="label"><span title="'.rtrim($lang['breadcrumb'], ':').'">'.$lang['breadcrumb'].'</span></li>';
        $last = count($crumbs);
        $i    = 0;
        foreach($crumbs as $target => $name) {
            $i++;
            print '<li>';
                if (count(explode(":",$target)) == 1) { $target = ":".$target; }
                if (p_get_metadata($target, 'plugin_croissant_bctitle') != null) {
                    tpl_pagelink($target, p_get_metadata($target, 'plugin_croissant_bctitle'));
                } else {
                    tpl_pagelink($target);
                }
            print '</li>';
        }
        return true;
    } else {
        return false;
    }
}/* /colormag_trace */

/**
 * adapted from core
 *
 * See original function in inc/template.php for details
 */
function colormag_searchform($ajax = true, $autocomplete = true, $dw = false) {
    global $colormag;
    global $lang, $ACT, $QUERY;

    // don't print the search form if search action has been disabled
    if(!actionOK('search')) return false;

//                            <form action="http://demo.themegrill.com/colormag/" class="search-form searchform clearfix" method="get">
//                                <div class="search-wrap">
//                                    <input type="text" placeholder="Search" class="s field" name="s">
//                                    <button class="search-icon" type="submit"></button>
//                                </div>
//                            </form><!-- .searchform -->


    print '<form id="search-form" action="'.wl().'" accept-charset="utf-8" class="search searchform clearfix';
//    if ($dw) { print ' dw'; }
//    print '" method="get" role="search"><div class="no">';
    print '" method="get" role="search"><div class="no">';
//    print '<div class="search-wrap">';
    print '<input type="hidden" name="do" value="search" />';
    print '<input type="text" ';

//    print '<form action="'.wl().'" accept-charset="utf-8" class="form-inline search" id="dw__search" method="get" role="search"><div class="no">';
//    print '<input type="hidden" name="do" value="search" />';
//    print '<input type="text" ';
    if($ACT == 'search') print 'value="'.htmlspecialchars($QUERY).'" ';
//    print 'placeholder="&#xF002; '.$lang['btn_search'].'" ';
    print 'placeholder="'.$lang['btn_search'].'" ';
    if(!$autocomplete) print 'autocomplete="off" ';
    print 'id="qsearch__in" accesskey="f" name="id" class="s field" title="[F]" />';
    if (!$dw) {
        print '<button type="submit" title="'.$lang['btn_search'].'">'.colormag_glyph($colormag['glyphs']['search'], true).'</button>';
    }
//    print '</div>';
//  REMOVED JSpopup class because when used, quick search result doesn't show up ("Found pages"). Original line: if ($ajax) print '<div id="qsearch__out" class="panel panel-default ajax_qsearch JSpopup"></div>';
    if ($ajax) print '<div id="qsearch__out" class="panel panel-default ajax_qsearch"></div>';
    print '</div></form>';
    return true;
}/* /colormag_searchform */

function colormag_social_link($network = null) {
    global $conf, $colormag;
//dbg($network);

//    // If there's a social network name and current wiki url is not included in given social network url
////dbg($colormag['socials'][$network]." vs ".trim(DOKU_URL, "/"));
//    if (($network != null) and (strpos($colormag['socials'][$network], trim(DOKU_URL, "/")) === false)) {
    if ($network != null) {
        $target = $conf['target']['extern'];
//dbg($colormag['socials'][$network]);
        $result = '<li><a href="'.$colormag['socials'][$network].'" class="social '.$network.' flex row"';
        if ($target != null) { $result .= ' target="'.$target.'"'; }
        if (($network == "digg") or ($network == "dribbble") or ($network == "facebook") or ($network == "flickr") or ($network == "reddit")) {
            $tooltip = $network;
        } elseif ($network == "codepen") {
            $tooltip = "CodePen";
        } elseif ($network == "github") {
            $tooltip = "GitHub";
        } elseif ($network == "google-plus") {
            $tooltip = "Google+";
        } elseif ($network == "stumbleupon") {
            $tooltip = "StumbleUpon";
        } elseif ($network == "wordpress") {
            $tooltip = "WordPress";
        } elseif ($network == "youtube") {
            $tooltip = "YouTube";
        } else {
            $tooltip = ucwords(str_replace("_", " ", $network));
        }
        if ($tooltip != null) { $result .= ' title="'.$tooltip.'"'; }
        $result .= ' rel="nofollow">';
//dbg($colormag['glyphs'][$network]);
//dbg($colormag['glyphs']['default']);
        //if (($colormag['glyphs'][$network] != null) and ($colormag['glyphs'][$network] != $colormag['glyphs']['default'])) {
        //    $result .= $colormag['glyphs'][$network];
        //} else {
        //    $result .= $tooltip;
        //}
//dbg($network);
//dbg($colormag['glyphs'][$network]);
//dbg(colormag_glyph($colormag['glyphs'][$network], true));
        $result .= colormag_glyph($colormag['glyphs'][$network], true);
        if (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) {
            $class = "";
        } else {
            $class=' class="a11y"';
        }
        $result .= '<span'.$class.'>'.$tooltip.'</span>';
        $result .= '</a></li>';
//dbg($result);
        if ($return) {
            return $result;
        } else {
            print $result;
            return 1;
        }
    }
}
