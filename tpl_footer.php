<?php
/**
 * Template footer, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>

<!-- ********** FOOTER ********** -->
<footer id="colormag__colophon" class="clearfix">
    <div class="footer-widgets-wrapper">
        <div class="inner-wrap">
            <div class="footer-widgets-area clearfix">
                <aside id="text-3" class="widget widget_text clearfix">
                    <h3 class="widget-title"><span>About Us</span></h3>
                    <div class="textwidget">
                        <?php tpl_license(''); // license text ?>
                    </div>
                </aside>
            </div><!-- /.footer-widgets-area.clearfix -->
        </div><!-- /.inner-wrap -->
    </div><!-- /.footer-widgets-wrapper -->
    <div class="footer-socket-wrapper clearfix">
        <div class="inner-wrap">
            <div class="footer-socket-area">
                <div class="footer-socket-right-section">
                    <div class="social-links clearfix">
                        <ul>
                            <li>
                                <?php
                                    tpl_license('button', true, false, false); // license button, no wrapper
                                    $target = ($conf['target']['extern']) ? 'target="'.$conf['target']['extern'].'"' : '';
                                ?>
                            </li>
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
                <div class="footer-socket-left-section">
                    <div class="copyright">
                        Copyright &copy; 2020 <a href="https://demo.themegrill.com/colormag/" title="ColorMag" ><span>ColorMag</span></a> All rights reserved.<br />
                        A <a href="https://wordpress.org/" title="WordPress"><span>WordPress</span></a> theme by <a href="https://themegrill.com/" title="ThemeGrill" rel="author"><span>ThemeGrill</span></a> ported to DokuWiki.
                    </div><!-- /.copyright -->
                </div><!-- /.footer-socket-left-section -->
        </div><!-- /.inner-wrap -->
    </div><!-- /.footer-socket-wrapper -->
</footer>
<?php
tpl_includeFile('footer.html');
