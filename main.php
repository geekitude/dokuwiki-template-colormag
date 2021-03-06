<?php
/**
 * Dokuwiki ColorMag template
 * Original Wordpress theme URI: https://themegrill.com/themes/colormag/
 * 
 * @link    https://www.dokuwiki.org/template:colormag
 * @author  Simon DELAGE <sdelage@gmail.com>
 * @license GPL 3 (https://www.gnu.org/licenses/gpl-3.0.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */

session_start();
// Store ID from HTTP_REFERER (aka origin URL) into PHP Session if it contains current wiki URL and doesn't contain `admin` or `playground` 
if ((strpos($_SERVER["HTTP_REFERER"], DOKU_URL) !== false) and (strpos($_SERVER["HTTP_REFERER"], 'admin') === false) and (strpos($_SERVER["HTTP_REFERER"], 'playground') === false)) {
    // get what's after "id="
    $tmp = explode("id=", $_SERVER["HTTP_REFERER"]);
//dbg($tmp);
    // get what's before potential "&"
    $tmp = explode("&", $tmp[1]);
    // store in PHP session
    $_SESSION["origID"] = $tmp[0];
//dbg($tmp[0]);
}

global $colormag, $showSidebar;
// Reset $colormag to make sure we don't inherit any value from previous page
$colormag = array();

colormag_init();

//dbg($colormag['images']['sidecard']);
if ((($ACT == "edit") or ($ACT == "preview")) and (page_exists("wiki:".tpl_getConf('cheatsheet')))) {
    $hasSidebar = "wiki:".tpl_getConf('cheatsheet');
    $showSidebar = 1;
} else {
    $hasSidebar = page_findnearest($conf['sidebar']);
    $showSidebar = $hasSidebar && ($ACT=='show');
}
if ($ACT == "show") {
    if (file_exists($colormag['images']['sidecard']['path'])) {
        $hasSidecard = 1;
        $showSidebar = 1;
    }
    if ((is_array($colormag['widgets']['side'])) and (count($colormag['widgets']['side']) > 0)) {
        $hasSidewidgets = 1;
        $showSidebar = 1;
    }
}
//dbg($hasSidebar);
//dbg($showSidebar);
//dbg($ACT);
//dbg(getNS($ID));
//dbg($lang);
//dbg($INFO);
//dbg($colormag['glyphs']);
//dbg($colormag['images']);
?><!DOCTYPE html>
<html id="dokuwiki__top" lang="<?php echo $conf['lang'] ?>" dir="<?php echo (($_GET['dir'] <> null)) ? $_GET['dir'] : $lang['direction'] ?>" class="no-js">
<head>
    <meta charset="utf-8" />
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php if ($_GET['debug'] != null): ?>
        <link rel="stylesheet" type="text/css" href="<?php print tpl_basedir(); ?>debug/colormag.debug.css">
    <?php endif ?>
    <?php if (isset($colormag['images']['pattern']['src'])): ?>
        <link rel="stylesheet" type="text/css" href="<?php print tpl_basedir(); ?>css/colormag.pattern.php?target=<?php print explode("media=", $colormag['images']['pattern']['src'])[1]; ?>" />
    <?php endif ?>
    <style type="text/css">
        <?php
            if (isset($colormag['theme'])) {
                echo $colormag['theme'];
            }
        ?>
    </style>
    <?php colormag_include('meta') ?>
</head>

<body class="<?php print colormag_bodyclasses(); ?>">
    <div id="colormag__page" class="site group <?php echo tpl_classes(); ?>">

        <?php include('tpl_header.php') ?>

        <?php if(($ACT == "show") or ($ACT == "edit")): ?>
            <nav id="colormag__pagenav" class="news-bar sticky-wrapper<?php print (strpos(tpl_getConf('uicolorize'), 'pagenav') !== false) ? " uicolor" : "" ?> <?php print explode("-", tpl_getConf('breadcrumbslook'))[0].'-look' ?>">
                <?php colormag_include("pagenavheader"); ?>
                <div class="inner-wrap flex row between">
                    <div class="primary">
                        <?php colormag_include("pagenavprimaryheader"); ?>
                        <div class="breadcrumbs youarehere flex">
                            <?php if(($conf['youarehere']) and ($conf['breadcrumbs'])): ?>
                                <h6 class="widget-title<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? '' : ' a11y' ?>"><span><?php print rtrim($lang['youarehere'], ":") ?></span></h6>
                                <div class="flex row center"><span class="label" title="<?php print rtrim($lang['youarehere'], ':') ?>"><?php colormag_glyph($colormag['glyphs']['youarehere']) ?></span>
                                    <?php colormag_youarehere() ?>
                                </div>
                            <?php else: ?>
                                <div class="pageId"><span><?php echo hsc($ID) ?></span></div>
                            <?php endif ?>
                        </div><!-- .breacrumbs.youarehere -->
                        <?php colormag_include("pagenavprimaryfooter"); ?>
                    </div><!-- .primary -->
                    <?php if(($conf['breadcrumbs'] || $conf['youarehere']) or (($colormag['translation']['helper']) and !($conf['youarehere']) and !($conf['breadcrumbs']))): ?>
                        <div class="secondary">
                            <?php colormag_include("pagenavsecondaryheader"); ?>
                            <div class="breadcrumbs youarehere flex">
                                <?php if(($conf['youarehere']) and !($conf['breadcrumbs'])): ?>
                                    <h6 class="widget-title<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? '' : ' a11y' ?>"><span><?php print $lang['youarehere'] ?></span></h6>
                                    <div class="flex row-reverse center">
                                        <span class="label"><?php colormag_glyph($colormag['glyphs']['youarehere']) ?></span>
                                        <?php colormag_youarehere() ?>
                                    </div>
                                <?php endif ?>
                            </div><!-- .breacrumbs.youarehere -->
                            <div class="breadcrumbs trace flex">
                                <?php if($conf['breadcrumbs']): ?>
                                    <h6 class="widget-title<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? '' : ' a11y' ?>"><span><?php print rtrim($lang['breadcrumb'], ":") ?></span></h6>
                                    <div class="flex row-reverse center">
                                        <span class="label" title="<?php print rtrim($lang['breadcrumb'], ':') ?>"><?php colormag_glyph($colormag['glyphs']['trace']) ?></span>
                                        <?php colormag_trace() ?>
                                    </div>
                                <?php endif ?>
                            </div><!-- .breacrumbs.trace -->
                            <?php if(($colormag['translation']['helper']) and !($conf['youarehere']) and !($conf['breadcrumbs'])) print $colormag['translation']['helper']->showTranslations(false); ?>
                            <?php colormag_include("pagenavsecondaryfooter"); ?>
                        </div><!-- /.secondary -->
                    <?php endif ?>
                </div><!-- .inner-wrap.flex -->
                        <div class="flex row center">
                            <?php if(($colormag['translation']['helper']) and (($conf['youarehere']) or ($conf['breadcrumbs']))) print $colormag['translation']['helper']->showTranslations(false); ?>
                        </div><!-- .flex -->
                <?php colormag_include("pagenavfooter"); ?>
            </nav><!-- /#colormag__pagenav -->
        <?php endif ?>

        <?php colormag_include("mainheader"); ?>

        <div id="colormag__main" class="group<?php print (strpos(tpl_getConf('uicolorize'), 'toc') !== false) ? " uicolor-toc" : "" ?><?php print (strpos(tpl_getConf('print'), 'toc') !== false) ? '' : ' noprint-toc' ?>">

            <div class="inner-wrap-left narrow-mix flex row stretch">

                <div id="colormag__main-content" class="flex row stretch between">

                    <!-- ********** CONTENT ********** -->
                    <div id="colormag__primary">
                        <div id="colormag__content" class="group">
                            <div class="page group">
                                <?php tpl_flush() ?>
                                <?php colormag_include('pageheader') ?>
                                <!-- wikipage start -->
                            <div class="article group">
                                <?php tpl_content() ?>
                            </div><!-- /.page.group -->
                                <!-- wikipage stop -->
                                <?php colormag_include('pagefooter') ?>
                            </div><!-- /.page.group -->

                            <hr <?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? '' : ' class="a11y"' ?> />

                            <?php if(($ACT == "show") or ($ACT == "edit")): ?>
                                <div class="docInfo news-bar flex row evenly<?php print (strpos(tpl_getConf('print'), 'docinfo') !== false) ? '' : ' noprint'; ?><?php print (strpos(tpl_getConf('uicolorize'), 'docinfo') !== false) ? " uicolor" : "" ?>"><?php print colormag_docinfo() ?></div>
                            <?php endif; ?>

                            <?php tpl_flush() ?>

                        </div><!-- /#colormag__content -->

                    </div><!-- /#colormag__primary -->

                    <?php if($showSidebar): ?>

                        <div class="vr<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? " notvisibleifextracted" : " a11y" ?>"></div>

                        <!-- ********** ASIDE ********** -->
                        <div id="colormag__secondary" class="<?php print (strpos(tpl_getConf('print'), 'sidebar') !== false) ? '' : ' noprint' ?>">

                            <?php if($hasSidecard): ?>
                                <aside id="colormag__sidecard-wrap" class="group">
                                    <?php
                                        colormag_ui_image('sidecard');
                                    ?>
                                </aside><!-- #colormag__sidecard-wrap -->
                            <?php endif; ?>

                            <?php if($hasSidebar): ?>
                                <aside class="pad aside widget include group<?php print (strpos(tpl_getConf('uicolorize'), 'sidebar') !== false) ? " uicolor" : "" ?>">
                                    <h6 class="aside-title toggle"><?php echo $lang['sidebar'] ?></h6>
                                    <div class="group">

                                        <?php colormag_include("sidebarheader"); ?>

                                        <div class="content group">
                                            <?php tpl_flush() ?>
                                            <?php tpl_includeFile('sidebarheader.html') ?>
                                            <?php tpl_include_page($hasSidebar, true, true) ?>
                                            <?php tpl_includeFile('sidebarfooter.html') ?>
                                        </div><!-- /.group -->

                                        <?php colormag_include("sidebarfooter"); ?>

                                    </div><!-- /#colormag__content -->
                                </aside><!-- /.pad.aside.include.group -->
                            <?php endif; ?>

                            <?php
                                if ($hasSidewidgets) {
                                    $class = "widget";
                                    if (strpos(tpl_getConf('uicolorize'), 'sidebar') !== false) {
                                        $class .= " uicolor";
                                    }
                                    if (($_GET['debug'] == 1) or ($_GET['debug'] == "widgets")) {
                                        $class .= " include-hook-sample";
                                    }
                                    foreach ($colormag['widgets']['side'] as $widget => $title) {
                                        print '<aside id="colormag__'.explode(".", $widget)[0].'" class="'.$class.'">';
                                            print '<h6 class="widget-title"><span class="label">'.$title.'</span></h6>';
                                            if (strpos($widget, '.html') !== false) {
                                                colormag_include($widget);
                                            } else {
                                                //colormag_render('wiki:'.$widget);
                                                print p_wiki_xhtml('wiki:'.$widget, '', false);
                                            }
                                        print '</aside>';
                                    }
                                }
                            ?>

                        </div><!-- /#colormag__secondary -->
                    <?php endif; ?>

                </div><!-- /#colormag__main-content -->

                <!-- PAGE ACTIONS -->
                <div id="colormag__pagetools">
                    <div class="tools<?php print (strpos(tpl_getConf('uicolorize'), 'pagetools') !== false) ? " uicolor-pagetools" : "" ?>">
                        <ul>
                            <li><h6 class="<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : "a11y " ?>aside-title"><?php print $lang['page_tools']; ?></h6></li>
                            <?php echo (new \dokuwiki\Menu\PageMenu())->getListItems(); ?>
                        </ul>
                    </div><!-- /.tools -->
                </div><!-- /#dokuwiki__pagetools -->
            </div><!-- /.inner-wrap-left -->

            <?php colormag_include("mainfooter"); ?>

        </div><!-- /#colormag__main -->

        <?php include('tpl_footer.php') ?>

    </div><!-- /#colormag__page -->

    <div id="colormag__housekeeper" class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
    <div id="colormag__helper" class="no">Window width: <span>.</span></div><?php /* helper to detect CSS media query in script.js and eventually display it if adding `&debug=1` to url*/ ?>
</body>
</html>
