<?php
/**
 * Template header, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>

<!-- ********** HEADER ********** -->
<header id="colormag__header" class="site-header clearfix">

    <div id="colormag__skip" class="<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : "a11y " ?>skip group">
        <a href="#colormag__main"><?php print $lang['skip_to_content'] ?></a>
    </div>

    <div id="colormag__header-text-nav-container" class="clearfix">

        <?php tpl_includeFile('headertop.html') ?>

        <?php if ((strpos(tpl_getConf('topbar'), 'date') !== false) or (strpos(tpl_getConf('topbar'), 'newsticker') !== false) or (strpos(tpl_getConf('topbar'), 'socialnetworks') !== false)) : ?>
            <div id="spacious__topbar-wrapper" class="news-bar group<?php print (strpos(tpl_getConf('neutralize'), 'topbar') !== false) ? " neu" : "" ?>">
                <div class="inner-wrap clearfix">
                    *DATE* *NEWSTICKER* *SOCIAL?*
                </div>
            </div><!-- /#spacious__topbar-wrapper -->
        <?php endif ?>
        <div class="inner-wrap clearfix">
            <div id="colormag__header-text-nav-wrap" class="clearfix">
                <div id="colormag__header-left-section">
                    <h1><?php
                        // get logo either out of the template images folder or data/media folder
                        $logoSize = array();
                        $logo = tpl_getMediaFile(array(':wiki:logo.png', ':logo.png', 'images/logo.png'), false, $logoSize);

                        // display logo and wiki title in a link to the home page
                        tpl_link(
                            wl(),
                            '<img src="'.$logo.'" '.$logoSize[3].' alt="" /> <span>'.$conf['title'].'</span>',
                            'accesskey="h" title="[H]"'
                        );
                    ?></h1>
                    <?php if ($conf['tagline']): ?>
                        <p class="claim"><?php echo $conf['tagline']; ?></p>
                    <?php endif ?>
                </div>
                <div id="colormag__header-right-section">
                    <div class="advertisement-content widget clearfix">
                        *BANNER*
                    </div>
                    <div id="colormag__header-right-sidebar" class="clearfix">
                        <aside id="search-3" class="widget widget_search clearfix">
                            <?php tpl_searchform(); ?>
                        </aside>
                        <div class="tools group">
                            <!-- SITE TOOLS -->
                            <div id="colormag__sitetools">
                                <h3 class="a11y"><?php echo $lang['site_tools']; ?></h3>
                                <div class="mobileTools">
                                    <?php echo (new \dokuwiki\Menu\MobileMenu())->getDropdown($lang['tools']); ?>
                                </div><!-- /.mobiletools -->
                                <ul>
                                    <?php echo (new \dokuwiki\Menu\SiteMenu())->getListItems('action ', false); ?>
                                </ul>
                            </div><!-- /#colormag__sitetools -->
                        </div><!-- /.tools -->
                    </div>
                </div>
            </div>
        </div><!-- .inner-wrap -->
    </div><!-- #colormag__header-text-nav-container -->

</header><!-- /#colormag__header -->
