<?php
/**
 * Template header, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>

<!-- ********** HEADER ********** -->
<header id="colormag__header" class="site-header group<?php print (strpos(tpl_getConf('print'), 'siteheader') !== false) ? '' : ' noprint' ?>">

    <div id="colormag__skip" class="<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : "a11y " ?>skip group">
        <a href="#colormag__main"><?php print $lang['skip_to_content'] ?></a>
    </div>

    <div id="colormag__header-text-nav-container" class="group">

        <?php tpl_includeFile('headertop.html') ?>

        <?php if ((strpos(tpl_getConf('topbar'), 'date') !== false) or (strpos(tpl_getConf('topbar'), 'newsticker') !== false) or (strpos(tpl_getConf('topbar'), 'socialnetworks') !== false)) : ?>
            <div id="colormag__topbar-wrapper" class="news-bar group<?php print (strpos(tpl_getConf('uicolorize'), 'topbar') !== false) ? " uicolor" : "" ?>">
                <div class="inner-wrap flex row between">
                    <div class="flex row">
                        <?php
                            if (strpos(tpl_getConf('topbar'), 'date') !== false) {
                                $date = colormag_date("long", null, false, true);
                                print '<div id="colormag__topbar-date" class="flex row" title="'.$date.'">'.colormag_glyph($colormag['glyphs']['date'], true).'<span>'.$date.'</span></div>';
                            }
                        ?>
                        <?php if ((strpos(tpl_getConf('topbar'), 'newsticker') !== false) and ($colormag['recents'] != null) and is_array($colormag['recents'])) : ?>
                            <div id="colormag__topbar-newsticker" class="breaking-news flex row" title="<?php print $lang['btn_recent']; ?>">
                                <?php colormag_glyph($colormag['glyphs']['news']) ?><strong><?php print $lang['btn_recent']; ?>:</strong>
                                <?php colormag_newsticker(); ?>
                            </div>
                        <?php endif ?>
                    </div>
                    *SOCIAL?*
                </div>
            </div><!-- /#colormag__topbar-wrapper -->
        <?php endif ?>
        <div class="inner-wrap narrow-mix group">
            <div id="colormag__header-text-nav-wrap" class="flex row stretch between">
                <div id="colormag__header-left-section" class="flex row start">
                    <div id="colormag__site-logo">
                        <?php
                            // get logo either out of the template images folder or data/media folder
                            $logoSize = array();
                            $logo = tpl_getMediaFile(array(':wiki:logo.png', ':logo.png', 'images/logo.png'), false, $logoSize);

                            // display logo and wiki title in a link to the home page
                            tpl_link(
                                wl(),
                                '<img src="'.$logo.'" '.$logoSize[3].' alt="" />',
                                'accesskey="h" title="[H]"'
                            );
                        ?>
                    </div>
                    <div class="flex column start">
                        <h1 id="colormag__site-title">
                            <?php
                                // display logo and wiki title in a link to the home page
                                tpl_link(
                                    wl(),
                                    '<span>'.$conf['title'].'</span>',
                                    'accesskey="h" title="[H]"'
                                );
                            ?>
                        </h1>
                        <?php if ($conf['tagline']): ?>
                            <p id="colormag__site-description" class="claim"><?php echo $conf['tagline']; ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div id="colormag__header-right-section">
                    <div class="advertisement-content widget group">
                        *BANNER*
                    </div>
                    <div id="colormag__header-right-sidebar" class="widget group">
                        <div class="tools group">
                            <!-- SITE TOOLS -->
                            <div id="colormag__sitetools">
                                <h6 class="<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : "a11y " ?>widget-title"><span><?php print $lang['site_tools']; ?></span></h6>
                                <div class="mobileTools">
                                    <?php echo (new \dokuwiki\Menu\MobileMenu())->getDropdown($lang['tools']); ?>
                                </div><!-- /.mobiletools -->
                                <ul class="flex row between">
                                    <?php echo (new \dokuwiki\Menu\SiteMenu())->getListItems('action ', true); ?>
                                </ul>
                            </div><!-- /#colormag__sitetools -->
                        </div><!-- /.tools -->
                    </div>
                </div>
            </div>
        </div><!-- .inner-wrap -->

        <aside id="colormag__alerts" class="group">
            <!-- ALERTS -->
            <?php html_msgarea() ?>
        </aside>

        <div id="colormag__site-navigation-sticky-wrapper" class="sticky-wrapper">
            <div id="colormag__site-navigation-titles" class="<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : "a11y " ?>group">
                <div class="inner-wrap group">
                    <h6 class="widget-title alignleft"><span><?php print tpl_getLang('contools'); ?><span></h6>
                    <h6 class="widget-title alignright"><span><?php print $lang['user_tools']; ?></span></h6>
                </div>
            </div>
            <nav id="colormag__site-navigation" class="main-navigation group" role="navigation">
                <div class="inner-wrap group">
                    <div class="menu-primary-container">
                        <ul id="colormag__menu-primary" class="menunav-menu menu-primary-container-left-section">
                            <!-- HOME -->
                            <li class="menu-item nav home"><a href="<?php print wl() ?>" title="Home"><?php colormag_glyph($colormag['glyphs']['home']) ?><span<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : " class='a11y'" ?>>Home</span></a></li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#" title="Blah1"><span>Blah1</span></a>
                                <ul class="sub-menu">
                                    <li class="sub-menu-item"><a href="#" title="Blah blah 1">Blah blah 1</a></li>
                                    <li class="sub-menu-item"><a href="#" title="Blah blah 2">Blah blah 2</a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="#" title="Blah2"><span>Blah2</span></a></li>
                        </ul><!-- /#colormag__menu-primary -->
                        <ul id="colormag__menu-tools" class="menunav-menu  menu-primary-container-right-section widget">
                            <!-- SEARCH -->
                            <li class="menu-item top-search-wrap action search">
                                <input id="colormag__searchcheck01" type="checkbox" name="menu-tools-search" />
                                <label for="colormag__searchcheck01" title="<?php print $lang['btn_search']; ?>"><?php colormag_glyph($colormag['glyphs']['search']) ?><span<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : " class='a11y'" ?>><?php print $lang['btn_search']; ?></span></label>
                                <div class="search-form-top">
                                    <?php tpl_searchform(); ?>
                                </div>
                            </li>
                            <!-- USERTOOLS -->
                            <?php
                                if ($conf['useacl']) {
                                    colormag_usertools();
                                }
                            ?>
                        </ul><!-- /#colormag__menu-tools -->
                    </div><!-- /.menu-primary-container -->
                </div><!-- /.inner-wrap -->
            </nav><!-- /#colormag__site-navigation -->
        </div><!-- /#colormag__site-navigation-sticky-wrapper -->

    </div><!-- #colormag__header-text-nav-container -->

</header><!-- /#colormag__header -->
