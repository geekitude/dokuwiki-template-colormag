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
                    <?php
                        if (strpos(tpl_getConf('topbar'), 'links') !== false) {
                            print '<div id="colormag__topbar-links" class="flex row" title="'.$colormag['topbar-links'].'"><ul><li class="menu-item-has-children">';
                                if ($colormag['topbar-links']) {
                                    tpl_link(wl($colormag['topbar-links']), colormag_glyph($colormag['glyphs']['topbar-page'], true).'<span'.((($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? '' : ' class="a11y"').'>'.tpl_getLang("links").'</span>',' title="'.$colormag['topbar-links'].'"');
                                    tpl_include_page($colormag['topbar-links'], true, true, true); /* includes the topbar links wiki page */
                                } elseif (auth_quickaclcheck(getns($ID).':'.tpl_getConf('topbarlinks')) >= 4) {
                                    tpl_link(wl(getns($ID).':'.tpl_getConf('topbarlinks')).'&do=edit', colormag_glyph($colormag['glyphs']['topbar-page-add'], true).'<span'.((($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? '' : ' class="a11y"').'>'.tpl_getLang('addtopbarlinks').'</span>',' title="'.tpl_getLang('addtopbarlinks').'"');
                                //} else {
                                    //print colormag_glyph($colormag['glyphs']['topbar-page-denied'], true)." permission do add links is denied.";
                                }
                            print '</li></ul></div>';
                        }
                    ?>
                </div>
            </div><!-- /#colormag__topbar-wrapper -->
        <?php endif ?>

        <?php colormag_include("header"); ?>

        <div class="inner-wrap narrow-mix group">
            <div id="colormag__header-text-nav-wrap" class="flex row stretch between">
                <div id="colormag__header-left-section" class="flex column <?php print "justify".tpl_getConf('headerflexalign') ?>">
                    <div class="flex row <?php print tpl_getConf('headerflexalign') ?>">
                        <div id="colormag__site-logo">
                            <?php
                                // get logo either out of the template images folder or data/media folder
                                $logoSize = array();
                                $logo = tpl_getMediaFile(array(':wiki:logo.png', ':logo.png', 'images/logo.png'), false, $logoSize);

                                // display logo and wiki title in a link to the home page
                                tpl_link(
                                    wl(),
                                    '<img src="'.$logo.'" '.$logoSize[3].' alt="*logo*" />',
                                    'accesskey="h" title="'.tpl_getLang('wikihome').' [H]"'
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
                                        'accesskey="h" title="'.tpl_getLang('wikihome').' [H]"'
                                    );
                                ?>
                            </h1>
                            <?php if ($conf['tagline']): ?>
                                <p id="colormag__site-description" class="claim"><?php echo $conf['tagline']; ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                    <?php colormag_include("brandingfooter"); ?>
                </div>
                <div id="colormag__header-right-section" class="flex column <?php print "justify".tpl_getConf('headerflexalign') ?>">
                    <div class="flex column end">
                        <div id="colormag__banner-wrap" class="advertisement-content widget flex column end<?php print (strpos(tpl_getConf('print'), 'siteheader-banner') !== false) ? '' : ' noprint' ?>">
                            <?php
                                colormag_include("bannerheader");
                                colormag_ui_image('banner');
                                colormag_include("bannerfooter");
                            ?>
                        </div>
                        <div id="colormag__header-right-sidebar" class="widget group">
                            <div class="tools group">
                                <?php colormag_include("toolsheader"); ?>
                                <!-- SITE TOOLS -->
                                <nav id="colormag__sitetools">
                                    <h6 class="<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : "a11y " ?>widget-title"><span><?php print $lang['site_tools']; ?></span></h6>
                                    <ul class="flex row end wrap">
                                        <?php echo (new \dokuwiki\Menu\SiteMenu())->getListItems('action ', true); ?>
                                    </ul>
                                    <div class="mobileTools">
                                        <?php echo (new \dokuwiki\Menu\MobileMenu())->getDropdown($lang['tools']); ?>
                                    </div><!-- /.mobiletools -->
                                </nav><!-- /#colormag__sitetools -->
                                <?php colormag_include("toolsfooter"); ?>
                            </div><!-- /.tools -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .inner-wrap -->

        <?php colormag_include("headerfooter"); ?>

        <aside id="colormag__alerts" class="group">
            <!-- ALERTS -->
            <?php
                html_msgarea();
                // If Translation plugin is enabled, check current page
                if (($colormag['translation']['helper']) and (($ACT == 'show') or ($ACT == 'edit'))) {
                    $colormag['translation']['helper']->checkAge();
                }
                // If in playground...
                if (strpos($ID, 'playground') !== false) {
                    // ...and admin, show a link to managing page...
                    if ($INFO['isadmin']) {
                        msg(tpl_getLang('playground_admin'), 2);
                    // ...else, show a few hints on what it's for
                    } else {
                        msg(tpl_getLang('playground_user'), 0);
                    }
                //} elseif (($ACT == 'edit') and (strpos($ID, tpl_getConf('topbarlinks') !== false))) {
                } elseif (($ACT == 'edit') and (strpos($ID, tpl_getConf('topbarlinks')) !== false)) {
                //} elseif ($ACT == 'edit') {
                    msg(tpl_getLang('edit_topbar'), 0);
                }
            ?>
        </aside>

       <div id="colormag__site-navigation-sticky-wrapper" class="sticky-wrapper">
            <div id="colormag__site-navigation-titles" class="<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : "a11y " ?>group">
                <div class="inner-wrap flex row between">
                    <h6 class="widget-title"><span><?php print tpl_getLang('contools'); ?><span></h6>
                    <h6 class="widget-title"><span><?php print $lang['user_tools']; ?></span></h6>
                </div>
            </div>
            <nav id="colormag__site-navigation" class="main-navigation group" role="navigation">
                <div class="inner-wrap flex row between">
                    <div id="colormag__site-navigation-primary" class="flex row start">
                        <ul id="colormag__contools" class="menunav-menu menu-primary-container-left-section">
                            <!-- HOME -->
                            <?php //if(($colormag['translation']['ishome'] == "translated") or (($colormag['translation']['istranslated']) and ($conf['plugin']['translation']['redirectstart']))): ?>
                            <?php if(($colormag['ishome'] == "translated") or (($colormag['translation']['istranslated']) and ($conf['plugin']['translation']['redirectstart']))): ?>
                                <li class="menu-item nav home menu-item-has-children">
                                    <a href="<?php print wl() ?>" title="<?php print tpl_getLang('wikihome') ?>"><?php colormag_glyph($colormag['glyphs']['language-home']); ?><span<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : " class='a11y'" ?>><?php print tpl_getLang('wikihome') ?></span></a>
                                    <ul class="sub-menu">
                                        <li class="menu-item nav home"><a href="<?php print wl($colormag['translation']['untranslatedhome']) ?>" title="<?php print tpl_getLang('untranslated_wikihome') ?>"><?php colormag_glyph($colormag['glyphs']['home']); ?><span<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : " class='a11y'" ?>><?php print tpl_getLang('untranslated_wikihome') ?></span></a></li>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li class="menu-item nav home"><a href="<?php print wl() ?>" title="<?php print tpl_getLang('wikihome') ?>"><?php colormag_glyph($colormag['glyphs']['home']); ?><span<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : " class='a11y'" ?>><?php print tpl_getLang('wikihome') ?></span></a></li>
                            <?php endif; ?>
                            <!-- DYNAMIC PARENT -->
                            <?php if ((is_array($colormag['parents'])) and (count($colormag['parents']) > 1)) : ?>
                                <li class="menu-item nav parent">
                                    <?php
                                        if ((($ACT == "edit") or ($ACT == "recent") or ($ACT == "media") or ($ACT == "index") or ($ACT == "admin") or ($_GET['media'] != null)) and (isset($_SESSION["origID"]))) {
                                            $glyph = "back-to-article";
                                            $target = $_SESSION["origID"];
                                        } elseif (end($colormag['parents']) == getNS($ID).":".$conf['start']) {
                                            $glyph = "namespace-start";
                                            $target = end($colormag['parents']);
                                        } else {
                                            $glyph = "parent-namespace";
                                            $target = end($colormag['parents']);
                                        }
                                    ?>
                                    <a href="<?php echo wl($target); ?>" title="<?php echo tpl_getLang($glyph) ?>" rel="prev"><?php colormag_glyph($colormag['glyphs'][$glyph]); ?><span<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : " class='a11y'" ?>><?php echo tpl_getLang($glyph) ?></span></a>
                                </li>
                            <?php endif; ?>
                            <?php //if ((strpos(tpl_getConf('contools'), 'syntax') !== false) and ($ACT == "edit")) : ?>
                            <?php if ($ACT == "edit") : ?>
                                <li class="menu-item nav syntax"><a href="/doku.php?id=wiki:syntax" title="wiki:syntax"><?php colormag_glyph($colormag['glyphs']['help']); ?><span<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : " class='a11y'" ?>><?php print tpl_getLang('syntax'); ?></span></a></li>
                            <?php endif; ?>
                            <!-- NSINDEX DROPDOWN -->
                            <li id="colormag__nsindex-dropdown" class="menu-item nav nsindex menu-item-has-children sub-toggle"><a href="<?php print wl($ID) ?>&do=index" title="<?php print tpl_getLang('nscontent') ?>"><?php colormag_glyph($colormag['glyphs']['map']) ?></a></li>
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
                        <ul id="colormag__usertools" class="menunav-menu  menu-primary-container-right-section widget<?php print (strpos(tpl_getConf('glyphcolors'), 'usertools') !== false) ? ' glyphcolors' : '' ?>">
                            <!-- SEARCH -->
                            <li class="menu-item top-search-wrap action search">
                                <input id="colormag__searchcheck01" type="checkbox" name="menu-tools-search" />
                                <label for="colormag__searchcheck01" title="<?php print $lang['btn_search']; ?>"><?php colormag_glyph($colormag['glyphs']['search']) ?><span<?php print (($_GET['debug'] == 1) or ($_GET['debug'] == 'a11y')) ? "" : " class='a11y'" ?>><?php print $lang['btn_search']; ?></span></label>
                                <div class="search-form-top">
                                    <?php colormag_searchform(); ?>
                                </div>
                            </li>
                            <!-- USERTOOLS DROPDOWN -->
                            <li id="colormag__usertools-dropdown" class="menu-item nav nsindex menu-item-has-children sub-toggle"><a href="<?php print wl($ID) ?>&do=index" title="<?php print $lang['tools'] ?>"><?php colormag_glyph($colormag['glyphs']['usertools']) ?></a></li>
                        </ul><!-- /#colormag__usertools -->
                        <ul id="colormag__usertools-menu" class="sub-menu <?php print (strpos(tpl_getConf('glyphcolors'), 'usertools') !== false) ? ' glyphcolors' : '' ?>">
                            <!-- USERTOOLS -->
                            <?php
                                if ($conf['useacl']) {
                                    colormag_usertools();
                                }
                            ?>
                        </ul><!-- /#colormag__usertools-menu -->
                    </div><!-- /#colormag__site-navigation-secondary -->
                </div><!-- /.inner-wrap -->
            </nav><!-- /#colormag__site-navigation -->
        </div><!-- /#colormag__site-navigation-sticky-wrapper -->

    </div><!-- #colormag__header-text-nav-container -->

    <?php if($ACT == "show"): ?>
        <div id="colormag__widebanner-wrap" class="group<?php print (strpos(tpl_getConf('print'), 'widebanner') !== false) ? '' : ' noprint' ?>">
            <?php
                colormag_ui_image('widebanner');
            ?>
        </div><!-- #colormag__widebanner-wrap -->
    <?php endif; ?>

</header><!-- /#colormag__header -->
