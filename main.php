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
</head>

<body class="<?php print colormag_bodyclasses(); ?>">
    <div id="colormag__page" class="site <?php echo tpl_classes(); ?> <?php echo ($showSidebar) ? 'showSidebar' : ''; ?> <?php echo ($hasSidebar) ? 'hasSidebar' : ''; ?> clearfix">

        <?php include('tpl_header.php') ?>
        <div class="tools group">
            <!-- USER TOOLS -->
            <?php if ($conf['useacl']): ?>
                <div id="dokuwiki__usertools">
                    <h3 class="a11y"><?php echo $lang['user_tools']; ?></h3>
                    <ul>
                        <?php
                            if (!empty($_SERVER['REMOTE_USER'])) {
                                echo '<li class="user">';
                                tpl_userinfo(); /* 'Logged in as ...' */
                                echo '</li>';
                            }
                            echo (new \dokuwiki\Menu\UserMenu())->getListItems('action ');
                        ?>
                    </ul>
                </div><!-- /#dokuwiki__usertools -->
            <?php endif ?>


        </div><!-- /.tools.group -->

        <!-- BREADCRUMBS -->
        <?php if($conf['breadcrumbs'] || $conf['youarehere']): ?>
            <div class="breadcrumbs">
                <?php if($conf['youarehere']): ?>
                    <div class="youarehere"><?php tpl_youarehere() ?></div>
                <?php endif ?>
                <?php if($conf['breadcrumbs']): ?>
                    <div class="trace"><?php tpl_breadcrumbs() ?></div>
                <?php endif ?>
            </div><!-- /.breadcrumbs -->
        <?php endif ?>

        <div id="colormag__main" class="clearfix">
            <div class="inner-wrap clearfix">

                <?php if($showSidebar): ?>
                    <!-- ********** ASIDE ********** -->
                    <div id="colormag__secondary">
                        <div class="pad aside include group">
                            <h3 class="toggle"><?php echo $lang['sidebar'] ?></h3>
                            <div class="content">
                                <div class="group">
                                    <?php tpl_flush() ?>
                                    <?php tpl_includeFile('sidebarheader.html') ?>
                                    <?php tpl_include_page($conf['sidebar'], true, true) ?>
                                    <?php tpl_includeFile('sidebarfooter.html') ?>
                                </div><!-- /.group -->
                            </div><!-- /.content -->
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

                        <div class="docInfo"><?php tpl_pageinfo() ?></div>

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
    <div id="screen__mode" class="no"></div><?php /* helper to detect CSS media query in script.js */ ?>
</body>
</html>
