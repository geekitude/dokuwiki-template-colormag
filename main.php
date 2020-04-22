<?php
/**
 * Dokuwiki ColorMag template
 * Original Wordpress theme URI: https://themegrill.com/themes/colormag/
 * 
 * @link    https://www.dokuwiki.org/template:spacious
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
$showSidebar = $hasSidebar && ($ACT=='show');
?><!DOCTYPE html>
<html id="dokuwiki__top" lang="<?php echo $conf['lang'] ?>" dir="<?php echo (($_GET['dir'] <> null)) ? $_GET['dir'] : $lang['direction'] ?>" class="no-js">
<head>
    <meta charset="utf-8" />
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
    <?php if (tpl_getConf('dark')): ?>
        <link rel="stylesheet" type="text/css" href="<?php print tpl_basedir(); ?>css/colormag.dark.css">
    <?php endif ?>
</head>

<body class="<?php print colormag_bodyclasses(); ?>">
    <div id="colormag__page" class="site clearfix <?php echo tpl_classes(); ?>">

        <?php include('tpl_header.php') ?>

        <!-- BREADCRUMBS -->
        <?php if($conf['breadcrumbs'] || $conf['youarehere']): ?>
            <div id="colormag__breadcrumbs-wrapper" class="news-bar breadcrumbs group<?php print (strpos(tpl_getConf('uicolorize'), 'breadcrumbs') !== false) ? " uicolor" : "" ?>">
                <div class="inner-wrap clearfix">
                    <?php if($conf['youarehere']): ?>
                        <div class="youarehere"><?php tpl_youarehere() ?></div>
                    <?php endif ?>
                    <?php if($conf['breadcrumbs']): ?>
                        <div class="trace"><?php tpl_breadcrumbs() ?></div>
                    <?php endif ?>
                </div>
            </div><!-- /#spacious__topbar-wrapper -->
        <?php endif ?>

        <div id="colormag__main" class="clearfix<?php print (strpos(tpl_getConf('uicolorize'), 'toc') !== false) ? " uicolor-toc" : "" ?>">
            <div class="inner-wrap clearfix">

                <?php if($showSidebar): ?>
                    <!-- ********** ASIDE ********** -->
                    <div id="colormag__secondary"<?php print (strpos(tpl_getConf('uicolorize'), 'sidebar') !== false) ? " class='uicolor'" : "" ?>>
                        <div class="pad aside include group">
                            <h3 class="toggle"><?php echo $lang['sidebar'] ?></h3>
                            <div id="colormag__content" class="content clearfix">
                                <div class="group">
                                    <?php tpl_flush() ?>
                                    <?php tpl_includeFile('sidebarheader.html') ?>
                                    <?php tpl_include_page($conf['sidebar'], true, true) ?>
                                    <?php tpl_includeFile('sidebarfooter.html') ?>
                                </div><!-- /.group -->
                            </div><!-- /#colormag__content -->
                        </div><!-- /.pad.aside.include.group -->
                    </div><!-- /#colormag__secondary -->
                <?php endif; ?>

                <!-- ********** CONTENT ********** -->
                <div id="colormag__primary">
                    <div id="colormag__content" class="clearfix">

                        <div class="pageId"><span><?php echo hsc($ID) ?></span></div>

                        <div class="page group">
                            <?php tpl_flush() ?>
                            <?php tpl_includeFile('pageheader.html') ?>
                            <!-- wikipage start -->
                            <?php tpl_content() ?>
                            <!-- wikipage stop -->
                            <?php tpl_includeFile('pagefooter.html') ?>
                        </div><!-- /.page.group -->

                        <div class="docInfo<?php print (strpos(tpl_getConf('print'), 'docinfo') !== false) ? '' : ' noprint' ?><?php print (strpos(tpl_getConf('uicolorize'), 'docinfo') !== false) ? " uicolor" : "" ?>"><?php tpl_pageinfo() ?></div>

                        <?php tpl_flush() ?>
                    </div><!-- /#colormag__content -->
                </div><!-- /#colormag__primary -->

            </div><!-- /.inner-wrap.clearfix -->
        </div><!-- /#colormag__main -->

        <?php include('tpl_footer.php') ?>

    </div><!-- /#colormag__page -->

                <div class="wrapper group">

                    <hr class="a11y" />

                    <!-- PAGE ACTIONS -->
                    <div id="dokuwiki__pagetools">
                        <h3 class="a11y"><?php echo $lang['page_tools']; ?></h3>
                        <div class="tools">
                            <ul>
                                <?php echo (new \dokuwiki\Menu\PageMenu())->getListItems(); ?>
                            </ul>
                        </div><!-- /.tools -->
                    </div><!-- /#dokuwiki__pagetools -->

                </div><!-- /.wrapper.group -->

    <div id="colormag__housekeeper" class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
    <div id="colormag__helper" class="no">Window width: <span>.</span></div><?php /* helper to detect CSS media query in script.js and eventually display it if adding `&debug=1` to url*/ ?>
</body>
</html>
