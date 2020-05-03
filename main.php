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

global $colormag, $showSidebar;
// Reset $colormag to make sure we don't inherit any value from previous page
$colormag = array();
colormag_init();

$hasSidebar = page_findnearest($conf['sidebar']);
//dbg($hasSidebar);
$showSidebar = $hasSidebar && ($ACT=='show');
//dbg($showSidebar);
//dbg($ACT);
//dbg(getNS($ID));
//dbg($lang);
//dbg($colormag['glyphs']);
?><!DOCTYPE html>
<html id="dokuwiki__top" lang="<?php echo $conf['lang'] ?>" dir="<?php echo (($_GET['dir'] <> null)) ? $_GET['dir'] : $lang['direction'] ?>" class="no-js">
<head>
    <meta charset="utf-8" />
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php if (tpl_getConf('dark')): ?>
        <link rel="stylesheet" type="text/css" href="<?php print tpl_basedir(); ?>css/colormag.dark.css">
    <?php endif ?>
    <?php if ($_GET['debug'] != null): ?>
        <link rel="stylesheet" type="text/css" href="<?php print tpl_basedir(); ?>debug/debug.css">
    <?php endif ?>
    <?php //if ($_GET['debug'] != null): ?>
        <link rel="stylesheet" type="text/css" href="<?php print tpl_basedir(); ?>css/pattern.php?ns=<?php print getNS($ID); ?>" />
    <?php //endif ?>
    <?php colormag_include('meta') ?>
</head>

<body class="<?php print colormag_bodyclasses(); ?>">
    <div id="colormag__page" class="site group <?php echo tpl_classes(); ?>">

        <?php include('tpl_header.php') ?>

        <header id="colormag__pageheader" class="news-bar sticky-wrapper<?php print (strpos(tpl_getConf('uicolorize'), 'pageheader') !== false) ? " uicolor" : "" ?>">
            <div class="inner-wrap flex row between">
                <!-- PAGEID -->
                <div class="flex column start">
                    <?php colormag_include("pageidheader"); ?>
                    <div class="pageId"><span><?php echo hsc($ID) ?></span></div>
                    <?php colormag_include("pageidfooter"); ?>
                </div>
                <!-- BREADCRUMBS -->
                <?php if($conf['breadcrumbs'] || $conf['youarehere']): ?>
                    <nav id="colormag__breadcrumbs-wrapper" class="breadcrumbs <?php print tpl_getConf('breadcrumbslook').'-look' ?>">
                        <?php colormag_include("breadcrumbsheader"); ?>
                        <?php if($conf['youarehere']): ?>
                            <ul class="youarehere"><?php colormag_youarehere() ?></ul>
                        <?php endif ?>
                        <?php if($conf['breadcrumbs']): ?>
                            <ul class="trace"><?php colormag_trace() ?></ul>
                        <?php endif ?>
                        <?php colormag_include("breadcrumbsfooter"); ?>
                    </nav><!-- /#colormag__breadcrumbs-wrapper -->
                <?php endif ?>
            </div>
        </header><!-- /#colormag__main -->

        <?php colormag_include("mainheader"); ?>

        <div id="colormag__main" class="group<?php print (strpos(tpl_getConf('uicolorize'), 'toc') !== false) ? " uicolor-toc" : "" ?>">

            <div class="inner-wrap-left narrow-mix group flex row stretch">

                <div id="colormag__main-content" class="flex row stretch between">

                    <!-- ********** CONTENT ********** -->
                    <div id="colormag__primary">
                        <div id="colormag__content" class="group">
                            <div class="page group">
                                <?php tpl_flush() ?>
                                <?php colormag_include('pageheader') ?>
                                <!-- wikipage start -->
                                <?php tpl_content() ?>
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
                        <div id="colormag__secondary"<?php print (strpos(tpl_getConf('uicolorize'), 'sidebar') !== false) ? " class='uicolor'" : "" ?>>

                            <?php colormag_include("sidebarheader"); ?>

                            <div class="pad aside include group">
                                <h6 class="aside-title toggle"><?php echo $lang['sidebar'] ?></h6>
                                <div class="content group">
                                    <div class="group">
                                        <?php tpl_flush() ?>
                                        <?php tpl_includeFile('sidebarheader.html') ?>
                                        <?php tpl_include_page($conf['sidebar'], true, true) ?>
                                        <?php tpl_includeFile('sidebarfooter.html') ?>
                                    </div><!-- /.group -->
                                </div><!-- /#colormag__content -->
                            </div><!-- /.pad.aside.include.group -->

                            <?php colormag_include("sidebarfooter"); ?>

                        </div><!-- /#colormag__secondary -->
                    <?php endif; ?>

                </div><!-- /#colormag__main-content -->

                <!-- PAGE ACTIONS -->
                <div id="colormag__pagetools">
                    <div class="tools">
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
