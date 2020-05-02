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
                                print '<div id="colormag__topbar-date" class="flex row" title="'.$date.'">'.colormag_glyph($colormag['glyphs']['date'], true).'<strong>'.$date.'</strong></div>';
                            }
                        ?>
                        <?php if ((strpos(tpl_getConf('topbar'), 'newsticker') !== false) and ($colormag['recents'] != null) and is_array($colormag['recents'])) : ?>
                            <div id="colormag__topbar-newsticker" class="breaking-news flex row" title="<?php print $lang['btn_recent']; ?>">
                                <?php colormag_glyph($colormag['glyphs']['news']) ?><strong><?php print $lang['btn_recent']; ?>:</strong>
                                <?php colormag_newsticker(); ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <?php if (((strpos(tpl_getConf('topbar'), 'socialnetworks') !== false) or ($_GET['debug'] == 1) or ($_GET['debug'] == "social")) and $colormag['socials'] != null) : ?>
                        <div id="colormag__topbar-social" class="flex row<?php print (strpos(tpl_getConf('glyphcolors'), 'usertools') !== false) ? ' glyphcolors' : '' ?>">
                            <?php colormag_glyph($colormag['glyphs']['social']); ?>
                            <ul class="flex row">
                                <?php
                                    foreach ($colormag['socials'] as $key => $value) {
                                        colormag_social_link($key);
                                    }
                                ?>
                            </ul>
                        </div>
                    <?php endif ?>
                </div>
            </div><!-- /#colormag__topbar-wrapper -->
        <?php endif ?>
        <div class="inner-wrap narrow-mix group">
            <div id="colormag__header-text-nav-wrap" class="flex row stretch between">
                <div id="colormag__header-left-section" class="flex row <?php print tpl_getConf('headerflexalign') ?>">
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
                    <div class="flex column <?php print tpl_getConf('headerflexalign') ?>">
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
                <div id="colormag__header-right-section" class="flex row <?php print tpl_getConf('headerflexalign') ?>">
                    <div class="flex column end">
                        <div class="dbg advertisement-content widget group">
                            *BANNER*
                        </div>
                        <div id="colormag__header-right-sidebar" class="widget group">
                            <div class="tools group">
                                <!-- SITE TOOLS -->
                                <div id="colormag__sitetools">
                                    <h6 class="<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : "a11y " ?>widget-title"><span><?php print $lang['site_tools']; ?></span></h6>
                                    <ul class="flex row end wrap">
                                        <?php echo (new \dokuwiki\Menu\SiteMenu())->getListItems('action ', true); ?>
                                    </ul>
                                    <div class="mobileTools">
                                        <?php echo (new \dokuwiki\Menu\MobileMenu())->getDropdown($lang['tools']); ?>
                                    </div><!-- /.mobiletools -->
                                </div><!-- /#colormag__sitetools -->
                            </div><!-- /.tools -->
                        </div>
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
                <div class="inner-wrap flex row between">
                    <h6 class="widget-title alignleft"><span><?php print tpl_getLang('contools'); ?><span></h6>
                    <h6 class="widget-title alignright"><span><?php print $lang['user_tools']; ?></span></h6>
                </div>
            </div>
            <nav id="colormag__site-navigation" class="main-navigation group" role="navigation">
                <div class="inner-wrap flex row between">
                    <div id="colormag__site-navigation-primary" class="flex row start">
                        <ul id="colormag__contools" class="menunav-menu menu-primary-container-left-section">
                            <!-- HOME -->
                            <li class="menu-item nav home"><a href="<?php print wl() ?>" title="Home"><?php colormag_glyph($colormag['glyphs']['home']) ?><span<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : " class='a11y'" ?>>Home</span></a></li>
                            <!-- NSINDEX DROPDOWN -->
                            <li id="colormag__nsindex-dropdown" class="menu-item nav nsindex menu-item-has-children sub-toggle"><a href="<?php print wl($ID) ?>&do=index" title="<?php print tpl_getLang('nscontent') ?>"><?php colormag_glyph($colormag['glyphs']['map']) ?><span<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : " class='a11y'" ?>><?php print tpl_getLang('nscontent') ?></span></a></li>
                        </ul><!-- /#colormag__contools -->
                        <ul id="colormag__nsindex-menu" class="sub-menu">
                            <li class="menu-item menu-item-has-children">
                                <a href="#" title="Blah1"><span>Blah1</span></a>
                                <ul class="sub-menu">
                                    <li class="sub-menu-item"><a href="#" title="Blah blah 1">Blah blah 1.1</a></li>
                                    <li class="sub-menu-item menu-item-has-children">
                                        <a href="#" title="Blah blah 2">Blah blah 1.2</a>
                                        <ul class="sub-menu">
                                            <li class="sub-menu-item menu-item-has-children"><a href="#" title="Blah blah 1">Blah blah 1.2.1</a>
                                                <ul class="sub-menu">
                                                    <li class="sub-menu-item "><a href="#" title="Blah 1">Blah blah 1.2.1.1</a></li>
                                                    <li class="sub-menu-item"><a href="#" title="Blah 2">Blah blah 1.2.1.2</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-menu-item"><a href="#" title="Blah blah 2">Blah blah 1.2.2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="#" title="Blah2"><span>Blah2</span></a></li>
                        </ul><!-- /#colormag__nsindex-menu -->
                    </div><!-- /#colormag__site-navigation-primary -->
                    <div id="colormag__site-navigation-secondary" class="flex row end">
                        <ul id="colormag__menu-search" class="menunav-menu  menu-primary-container-right-section widget<?php print (strpos(tpl_getConf('glyphcolors'), 'usertools') !== false) ? ' glyphcolors' : '' ?>">
                            <!-- SEARCH -->
                            <li class="menu-item top-search-wrap action search">
                                <input id="colormag__searchcheck01" type="checkbox" name="menu-tools-search" />
                                <label for="colormag__searchcheck01" title="<?php print $lang['btn_search']; ?>"><?php colormag_glyph($colormag['glyphs']['search']) ?><span<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : " class='a11y'" ?>><?php print $lang['btn_search']; ?></span></label>
                                <div class="search-form-top">
                                    <?php colormag_searchform(); ?>
                                </div>
                            </li>
                        </ul><!-- /#colormag__menu-search -->
                        <ul id="colormag__usertools" class="menunav-menu  menu-primary-container-right-section widget<?php print (strpos(tpl_getConf('glyphcolors'), 'usertools') !== false) ? ' glyphcolors' : '' ?>">
                            <!-- USERTOOLS -->
                            <?php
                                if ($conf['useacl']) {
                                    colormag_usertools();
                                }
                            ?>
                        </ul><!-- /#colormag__usertools -->
                    </div><!-- /#colormag__site-navigation-secondary -->
                </div><!-- /.inner-wrap -->
            </nav><!-- /#colormag__site-navigation -->
        </div><!-- /#colormag__site-navigation-sticky-wrapper -->

    </div><!-- #colormag__header-text-nav-container -->

</header><!-- /#colormag__header -->
