<?php
/**
 * Template footer, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>

<!-- ********** FOOTER ********** -->
<footer id="colormag__colophon" class="group<?php print (strpos(tpl_getConf('print'), 'sitefooter') !== false) ? '' : ' noprint' ?>">

    <div class="footer-widgets-wrapper">
        <div class="inner-wrap">

            <?php colormag_include("footerheader"); ?>

            <div class="footer-widgets-area flex row start evenly">
                <?php if ($conf['useacl'] && $ACT != "login" && $ACT != "denied"): ?>
                    <aside id="colormag__userwidget" class="widget">
                        <?php
                            //if (($conf['useacl']) and (empty($_SERVER['REMOTE_USER'])) and (strpos(tpl_getConf('widgets'), 'footer_login') !== false))
                            if (($conf['useacl']) && (empty($_SERVER['REMOTE_USER']))) {
                                //<!-- LOGIN FORM -->
                                colormag_loginform('widget');
                            //} elseif ($colormag['show']['tools']) {
                            } else {
                                print '<h6 class="widget-title title-block-wrap group"><span class="label">'.$lang['profile'].'</span></h6>';
                                if ($colormag['images']['avatar']['target'] != null) {
                                    if (strpos($colormag['images']['avatar']['target'], "debug") !== false) {
                                        print '<a href="/doku.php?id='.$ID.'&amp;do=media&amp;ns='.tpl_getConf('avatars').'&amp;tab_files=upload" title="'.tpl_getLang('upload_avatar').'"><img id="colormag__user-avatar" src="'.$colormag['images']['avatar']['target'].'" title="'.tpl_getLang('upload_avatar').'" alt="*'.tpl_getLang('upload_avatar').'*" width="64px" height="100%" /></a>';
                                    } else {
                                        if ($colormag['images']['avatar']['thumbnail'] != null) {
                                            print '<a href="'.$colormag['images']['avatar']['target'].'" data-lity data-lity-desc="'.tpl_getLang('your_avatar').'" title="'.tpl_getLang('your_avatar').'"><img id="colormag__user-avatar" src="'.$colormag['images']['avatar']['thumbnail'].'" title="'.tpl_getLang('your_avatar').'" alt="*'.tpl_getLang('your_avatar').'*" width="64px" height="100%" /></a>';
                                        } else {
                                            print '<a href="'.$colormag['images']['avatar']['target'].'" data-lity data-lity-desc="'.tpl_getLang('your_avatar').'" title="'.tpl_getLang('your_avatar').'"><img id="colormag__user-avatar" src="'.$colormag['images']['avatar']['target'].'" title="'.tpl_getLang('your_avatar').'" alt="*'.tpl_getLang('your_avatar').'*" width="64px" height="100%" /></a>';
                                        }
                                    }
                                }
                                print '<ul>';
                                    print '<li>'.$lang['fullname'].' : <em>'.$INFO['userinfo']['name'].'</em></li>'; 
                                    print '<li>'.$lang['user'].' : <em>'.$_SERVER['REMOTE_USER'].'</em></li>'; 
                                    print '<li>'.$lang['email'].' : <em>'.$INFO['userinfo']['mail'].'</em></li>'; 
                                print '</ul>';
                                echo '<p class="user">';
                                    // If user has public page ID but no private space ID (most likely because UserHomePage plugin is not available)
                                    //if (($colormag['user']['private'] == null) && ($colormag['user']['public']['link'] != null)) {
                                    if (($colormag['user']['public']['id'] != null) && ($colormag['user']['private']['id'] != null)) {
dbg("vérifier ces liens");
                                        tpl_link(wl($colormag['user']['private']['id']),'<span>'.$colormag['user']['private']['title'].'</span>','title="'.$colormag['user']['private']['title'].'" class="'.$colormag['user']['private']['classes'].'"');
                                        print " - ";
                                        tpl_link(wl($colormag['user']['public']['id']),'<span>'.$colormag['user']['public']['title'].'</span>','title="'.$colormag['user']['public']['title'].'" class="'.$colormag['user']['public']['classes'].'"');
                                    } elseif (($colormag['user']['public']['id'] != null) && ($colormag['user']['private'] == null)) {
                                        print '<span title="'.$colormag['user']['public']['title'].'">'.$colormag['user']['public']['string'].'</span>';
                                    // If user has both public page ID and private space ID
                                    // In any other case, use DW's default function
                                    //} else {
                                    //    print $lang['loggedinas'].' '.userlink(); /* 'Logged in as ...' */
                                    }
                                echo '</p>';
                                echo '<p class="profile">';
                                    //print '<a href="/doku.php?id='.$ID.'&amp;do=profile" rel="nofollow" title="'.$lang['btn_profile'].'"><span>'.$lang['btn_profile'].'</span>'.colormag_glyph("profile", true).'</a>';
                                    print '<a href="/doku.php?id='.$ID.'&amp;do=profile" rel="nofollow" title="'.$lang['btn_profile'].'"><span>'.$lang['btn_profile'].'</span></a>';
                                echo '</p>';
                            }
                        ?>
                    </aside><!-- /#colormag__usertools -->
                <?php endif; ?>
                <?php if(page_exists("wiki:contact") && (!$useacl || auth_quickaclcheck("wiki:contact") >= AUTH_READ)): ?>
                    <aside id="colormag__contactwidget" class="widget">
                        <h6 class="widget-title"><span class="label"><?php print tpl_getLang('contact'); ?></span></h6>
                        <?php print p_wiki_xhtml('wiki:contact', '', false); /* includes the wiki:contact page */ ?>
                    </aside>
                <?php endif; ?>
                <?php if (page_findnearest(tpl_getConf('links'), $useacl)): ?>
                    <aside id="colormag__linkswidget" class="widget">
                        <h6 class="widget-title"><span class="label"><?php print tpl_getLang('links'); ?></span></h6>
                        <?php tpl_include_page(tpl_getConf('links'), true, true, true); /* includes the links wiki page */ ?>
                    </aside>
                <?php endif; ?>
                <aside id="colormag__licensewidget" class="widget group">
                    <h6 class="widget-title"><span><?php print tpl_getLang('license'); ?></span></h6>
                    <div class="textwidget">
                        <?php tpl_license(tpl_getConf('licensevisual')) /* content license, parameters: img=*badge|button|0, imgonly=*0|1, return=*0|1 */ ?>
                    </div>
                </aside>
                <aside id="colormag__pageqrwidget" class="widget">
                    <h6 class="widget-title"><span class="label"><?php print tpl_getLang('onlineversion'); ?></span></h6>
                    <img class="qrcode url" src="<?php print $colormag['qrcode']['id']; ?>" alt="*qrcode*" title="<?php print tpl_getLang('onlineversion'); ?>" />
                </aside>

                <?php colormag_include("footerwidget"); ?>

            </div><!-- /.footer-widgets-area.group -->

        </div><!-- /.inner-wrap -->
    </div><!-- /.footer-widgets-wrapper -->
    <div class="footer-socket-wrapper group<?php print (strpos(tpl_getConf('uicolorize'), 'footersocket') !== false) ? " uicolor" : "" ?>">
        <div class="inner-wrap">
            <div class="footer-socket-area flex row between stretch">
                <div class="footer-socket-left-section">
                    <div class="copyright">
                        Copyright &copy; 2020 <a href="https://demo.themegrill.com/colormag/" title="ColorMag" ><span>ColorMag</span></a> All rights reserved.<br />
                        A <a href="https://wordpress.org/" title="WordPress"><span>WordPress</span></a> theme by <a href="https://themegrill.com/" title="ThemeGrill" rel="author"><span>ThemeGrill</span></a> ported to <a href="https://dokuwiki.org/" title="DokuWiki"><span>DokuWiki</span></a>.
                    </div><!-- /.copyright -->
                </div><!-- /.footer-socket-left-section -->
                <div class="footer-socket-right-section flex">
                    <div class="buttons">
                        <ul class="flex wrap justifyend">
                            <li>
                                <a href="https://dokuwiki.org/" title="Driven by DokuWiki" <?php echo $target?>>
                                    <img src="<?php echo tpl_basedir(); ?>images/button-dw.png" width="80" height="15" alt="Driven by DokuWiki" />
                                </a>
                            </li>
                            <li>
                                <a href="https://translate.dokuwiki.org/" title="Localized (you can help)">
                                    <img src="<?php print tpl_basedir(); ?>images/button-localized.png" width="80" height="15" alt="Localized" />
                                </a>
                            </li>
                            <li>
                                <a href="https://www.dokuwiki.org/donate" title="Donate" <?php echo $target?>>
                                    <img src="<?php echo tpl_basedir(); ?>images/button-donate.png" width="80" height="15" alt="Donate" />
                                </a>
                            </li>
                            <li>
                                <a href="https://php.net" title="Powered by PHP" <?php echo $target?>>
                                    <img src="<?php echo tpl_basedir(); ?>images/button-php.png" width="80" height="15" alt="Powered by PHP" />
                                </a>
                            </li>
                            <li>
                                <a href="//validator.w3.org/check/referer" title="Valid HTML5" <?php echo $target?>>
                                    <img src="<?php echo tpl_basedir(); ?>images/button-html5.png" width="80" height="15" alt="Valid HTML5" />
                                </a>
                            </li>
                            <li>
                                <a href="//jigsaw.w3.org/css-validator/check/referer?profile=css3" title="Valid CSS" <?php echo $target?>>
                                    <img src="<?php echo tpl_basedir(); ?>images/button-css.png" width="80" height="15" alt="Valid CSS" />
                                </a>
                            </li>
                        </ul>
                    </div><!-- /.buttons -->
                </div><!-- /.footer-socket-right-section -->
            </div><!-- /.footer-socket-area -->
        </div><!-- /.inner-wrap -->
    </div><!-- /.footer-socket-wrapper -->
</footer>

<?php colormag_include("footer");
