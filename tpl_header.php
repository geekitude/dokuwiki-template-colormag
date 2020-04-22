<?php
/**
 * Template header, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>

<!-- ********** HEADER ********** -->
<header id="colormag__header" class="site-header clearfix<?php print (strpos(tpl_getConf('print'), 'siteheader') !== false) ? '' : ' noprint' ?>">

    <div id="colormag__skip" class="<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : "a11y " ?>skip group">
        <a href="#colormag__main"><?php print $lang['skip_to_content'] ?></a>
    </div>

    <div id="colormag__header-text-nav-container" class="clearfix">

        <?php tpl_includeFile('headertop.html') ?>

        <?php if ((strpos(tpl_getConf('topbar'), 'date') !== false) or (strpos(tpl_getConf('topbar'), 'newsticker') !== false) or (strpos(tpl_getConf('topbar'), 'socialnetworks') !== false)) : ?>
            <div id="colormag__topbar-wrapper" class="news-bar group<?php print (strpos(tpl_getConf('uicolorize'), 'topbar') !== false) ? " uicolor" : "" ?>">
                <div class="inner-wrap clearfix">
                    <?php
                        if (strpos(tpl_getConf('topbar'), 'date') !== false) {
                            $date = colormag_date("long", null, false, true);
                            print '<div id="colormag__topbar-date" title="'.$date.'">'.colormag_glyph($colormag['glyphs']['date'], true).'<span>'.$date.'</span></div>';
                        }
                    ?>
                    <?php if ((strpos(tpl_getConf('topbar'), 'newsticker') !== false) and ($colormag['recents'] != null) and is_array($colormag['recents'])) : ?>
                        <div id="colormag__topbar-newsticker" class="breaking-news" title="<?php print $lang['btn_recent']; ?>">
                            <?php colormag_glyph($colormag['glyphs']['news']) ?><strong<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : ' class="a11y"' ?>><?php print $lang['btn_recent']; ?>:</strong>
                            <?php colormag_newsticker(); ?>
                        </div>
                    <?php endif ?>
                    *SOCIAL?*
                </div>
            </div><!-- /#colormag__topbar-wrapper -->
        <?php endif ?>
        <div class="inner-wrap narrow-mix clearfix">
            <div id="colormag__header-text-nav-wrap" class="clearfix">
                <div id="colormag__header-left-section">
                    <h1>
                        <?php
                            // get logo either out of the template images folder or data/media folder
                            $logoSize = array();
                            $logo = tpl_getMediaFile(array(':wiki:logo.png', ':logo.png', 'images/logo.png'), false, $logoSize);

                            // display logo and wiki title in a link to the home page
                            tpl_link(
                                wl(),
                                '<img src="'.$logo.'" '.$logoSize[3].' alt="" /> <span>'.$conf['title'].'</span>',
                                'accesskey="h" title="[H]"'
                            );
                        ?>
                    </h1>
                    <?php if ($conf['tagline']): ?>
                        <p id="colormag__site-description" class="claim"><?php echo $conf['tagline']; ?></p>
                    <?php endif ?>
                </div>
                <div id="colormag__header-right-section">
                    <div class="advertisement-content widget clearfix">
                        *BANNER*
                    </div>
                    <div id="colormag__header-right-sidebar" class="clearfix">
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

        <aside id="colormag__alerts">
            <!-- ALERTS -->
            <?php html_msgarea() ?>
        </aside>

        <div id="colormag__site-navigation-sticky-wrapper" class="sticky-wrapper">
            <nav id="colormag__site-navigation" class="main-navigation clearfix" role="navigation">
                <div class="inner-wrap clearfix">
                    <div class="menu-primary-container">
                        <ul id="colormag__menu-primary" class="menunav-menu menu-primary-container-left-section">
                            <!-- HOME -->
                            <li class="menu-item"><a href="<?php print wl() ?>" title="Home"><?php colormag_glyph($colormag['glyphs']['home']) ?><span<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : " class='a11y'" ?>>Home</span></a></li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#" title="Blah1"><span>Blah1</span></a>
                                <ul class="sub-menu">
                                    <li class="sub-menu-item"><a href="#" title="Blah blah 1">Blah blah 1</a></li>
                                    <li class="sub-menu-item"><a href="#" title="Blah blah 2">Blah blah 2</a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="#" title="Blah2"><span>Blah2</span></a></li>
                        </ul><!-- /#colormag__menu-primary -->
                        <ul id="colormag__menu-tools" class="menunav-menu  menu-primary-container-right-section">
                            <!-- SEARCH -->
                            <li class="menu-item top-search-wrap">
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
