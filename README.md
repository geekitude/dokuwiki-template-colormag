![Colormag - Dokuwiki template](/images/colormag-logo.png)

# dokuwiki-template-colormag

<!--
---- template ----
description   : [Colormag Wordpress theme](https://themegrill.com/themes/colormag/) by [ThemeGrill](https://themegrill.com/) ported to DokuWiki
author        : Simon DELAGE
email         : sdelage@gmail.com
lastupdate_dt : 2020-04-08
compatible    : !Greebo
depends       : 
conflicts     : # prefix templates by template:
similar       : 
screenshot_img: # URL to a screenshot (should be a bigger one)
tags          : experimental, flexbox, hooks, html5, modern, namespace, polymorphic, responsive, scrollspy, sidebar, topbar, translation, wordpress

downloadurl   : http://github.com/Geekitude/dokuwiki-template-colormag/zipball/master
bugtracker    : http://github.com/Geekitude/dokuwiki-template-colormag/issues
sourcerepo    : http://github.com/Geekitude/dokuwiki-template-colormag/
donationurl   : https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=FE645CXCLH49U
----
-->

[Colormag Wordpress theme](https://themegrill.com/themes/colormag/) by [ThemeGrill](https://themegrill.com/) ported to DokuWiki using [this guide](https://www.dokuwiki.org/devel:wp_to_dw_template).

    See template.info.txt for template details
    Spacious is distributed under the terms of the GNU GPL V3 (see LICENSE file or [this link](https://www.gnu.org/licenses/gpl-3.0.html) for details)

*Version of Colormag Wordpress theme used as base for this project : 1.4.5 (2020-02-28)*

Since Dokuwiki's Starter template is too outdated for my development skill, mainly [because of new menus](https://github.com/selfthinker/dokuwiki_template_starter/issues/14), I started with a lightened version of Dokuwiki's default template.

## Credits

### About ThemeGrill

The copyright notice at the very bottom of page shouldn't be removed.

### Third party modules

* [Web Font Loader - 1.6.28](https://github.com/typekit/webfontloader) to nicely load fonts from Google Web Fonts, distributed under [Apache License 2.0](https://www.apache.org/licenses/LICENSE-2.0)
* [Advanced News Ticker - 1.0.11](http://risq.github.io/jquery-advanced-news-ticker/), distributed under [GNU General Public License v2.0](https://www.gnu.org/licenses/gpl-2.0.en.html)
* [JDENTICON - 2.2.0](https://jdenticon.com/) to add modern and highly recognizable identicons, distributed under [zlib License](https://www.zlib.net/zlib_license.html)
* Context logo Lighbox effect uses [Lity - 2.4.0](https://sorgalla.com/lity/), distributed under [MIT License](https://en.wikipedia.org/wiki/MIT_License)
* ToC scrollspy effect is provided by [Gumshoe - 5.1.2](https://github.com/cferdinandi/gumshoe), distributed under [MIT License](https://en.wikipedia.org/wiki/MIT_License)

### Extra

* Default optional background pattern comes from [Subtle Patterns](https://www.toptal.com/designers/subtlepatterns/)
* SVG icons come from [Material Design Icons](https://materialdesignicons.com)
* [Dummy avatar](https://imgbin.com/png/r454K96z) is free for non commercial use
* Font used for sample UI images (banner, widebanner and sidebar.png) is: [Rollandin by Emilie Rollandin](http://www.archistico.com/portfolio/nuovo-font-rollandin/).
* Special thanks to Giuseppe Di Terlizzi, author of [Bootstrap3](https://www.dokuwiki.org/template:bootstrap3) DokuWiki template who nicely acepted that I copy some of his code to build admin dropdown menu.

## Conversion todo

* [x] Start with ~~Starter~~ Default template (don't wan't to struggle with complex items like pagetools)
* [x] Basic HTML/PHP
  * [x] Meta elements
  * [x] Site containers
  * [x] Header
  * [x] Content area
  * [x] Footer
  * [x] Sidebar
  * [x] WP vs. DW functions
* [x] Basic CSS
  * [x] style.css
  * [ ] ~~rtl.css~~ (shouldn't be needed, thanks to Grunt and Flexbox)
  * [x] print.css
  * [x] Necessary changes
* [ ] JS
* [x] Further HTML/PHP
  * [x] Other layouts
  * [x] Special DW elements
  * [x] Other actions
* [x] Further CSS
  * [x] style.ini
  * [x] WP vs. DW classes
* [x] Rename IDs
* [x] Support specific custom WP theme functionality
  * [x] Custom colours
  * [x] Custom background
* [x] Further Reading

## Main features

* [ ] Namespace dependent CSS (for colors and fonts)
* [ ] Namespace dependent UI images ([x] background pattern, [ ] logo, [ ] banner, [ ] widebanner and a potential [ ] sidebar header image aka sidecard)
* [ ] Google Fonts : each of main text, headings, condensed text (mostly nav bar) and monospaced text (```code``` syntax) can use a different Google font (be warned that main text font should be kept very readable)
* [ ] Wide banner slider with latest changes at wiki home?
* [ ] Tested with most common plugins (Blockquote, Discussion, Wrap)
* [x] Dark color scheme
* [x] Topbar with date, newsticker (based on current namespace and sub content) and social links
* [ ] Easy to customize glyphs(*) (from [Material Design Icons](https://materialdesignicons.com/) like other DW's SVG glyphs or [IcoMoon](https://icomoon.io/) for social links)
* [ ] Sidebar and ToC can be moved out of page content on wide screen (only works in boxed layout)
* [ ] Extracted ToC can be given [scrollspy](https://codepen.io/latifur/pen/qLKXpj) superpowers
* [ ] Hidable sidebar
* [ ] Stickable main navigation bar, pageheader, sidebar and docinfo
* [ ] Dynamic navigation button (current NS home, parent NS start, home or "back to article")
* [ ] High number of HTML hooks (based on [this document](https://www.dokuwiki.org/include_hooks))
* [ ] A few HTML replace hooks that let you replace some elements with more fancy HTML code
* [ ] Sub namespaces list based on [Twistienav](https://www.dokuwiki.org/plugin:twistienav) plugin?
* [ ] Siblings based on [Twistienav](https://www.dokuwiki.org/plugin:twistienav) plugin (a breadcrumbs like list of other pages in current namespace)
* [ ] Expanded debug mode to show some specific elements (sample code or images)
  * [x] *a11y* (visual accessibility helpers)
  * [x] *alerts*
  * [ ] *banner*
  * [ ] *card* (sidebar namespace card image)
  * [ ] *conlogo* (namespace logo within page header aka context logo)
  * [ ] *images* (all UI images)
  * [ ] *include* (HTML include hooks)
  * [ ] *logo*
  * [x] *pattern*
  * [ ] *replace* (HTML replace hooks)
  * [x] *social* (load a dummy social networks list)

## Settings

* **layout** (*box2wide*) : choose site layout
  * `box` wastes a little space around content on narrow screens
  * `wide` is incompatible with "scrollspy" ToC and will override that setting
  * `box2wide` switches from `box` on large screens to `wide` on smaller ones
  * `mix` aesthically ressembles `wide` layout but site header and main content are still limited to **style.ini** file's `site-width` value
* **flexflip** (*nothing*) : flip corresponding element's position
  * `banner` : will be moved under site tools
  * `pageheader` : switch PageID and Breadcrumbs positions
  * `sidebar` : will be moved on the osther side of page
  * `pagetools` : just like `sidebar` above
  * `socket` : flip content
* **uicolorize** (*nothing*) : choose UI elements to colorize between *topbar*, *pageheader*, *sidebar*, *toc*, *docinfo*, *footersocket*
* **uicolor** (*neu*) : color set from **style.ini** file to use for elements selected above (*neu* or *alt*)
* **glypholors** (*[ ]*) : add some color to social and/or user tools glyphs
* **topbar** (*nothing*) : choose topbar elements
  * `date` : just the server's current date based on `datelocale` and `longdatestring` settings
  * `newsticker` : dynamic list of last changes in current namespace and sub ones (elements listed depend on `newsTicker` setting)
  * `socialnetworks` : list of social networks links (see [Topbar social links](https://github.com/geekitude/dokuwiki-template-spacious#topbar-social-links) below)
* **datelocale** (*fra*) : language used for dates
* **longdatestring** (*%A %d %B %Y*) : how long date strings are built (typically with full day of week, ...), [see this page](https://www.php.net/manual/fr/function.strftime.php)
* **shortdatestring** (*%d/%m/%Y*) : how short and typically fully numeric dates are built, [see this page](https://www.php.net/manual/fr/function.strftime.php) too
* **newsTicker** (*skip_minors,pages,media,5*): options used to built last changes list
  * `skip_deleted` : ignore deleted items
  * `skip_minors` : ignore minor updates
  * `skip_subspaces` : only consider elements from current namespace, not sub-namespaces
  * `pages` : show or ignore pages in list
  * `media` : show or ignore media files
  * the number in text field is the number of elements to show (starting from most recent)
* **headerflexalign** (*start*) : set vertical alignment of header items (ie. logo, branding text, right section), note that `start` and `center` are the most common choices
  * `start` : to the top
  * `baseline` : at text baseline level - still looking for a situation where it's different from `start` 8-)
  * `center`
  * `end` : to the bottom
* **breadcrumbslook** (*classic*) : choose between *classic* or *pills* breadcrumbs
* **breadcrumbsglyphs** ([x]) : add glyphs to distinguish specific pages in breadcrumbs (wiki home, user public page, user home private ns, translated pages)
* **links** (*links*) : name of wiki page to use to feed footer links widget
* **dark** ([ ]) : switch to dark color skin
* **licensevisual** (*badge*) : select license image between a small button, larger badge or nothing
* **print** (*siteheader,docinfo,sitefooter,hrefs*) : a few elements you can choose to print or not (*hrefs* is about adding target url to as subscript to all external links)

## About

### Social network links

Copy `dokuwiki/lib/tpl/colormag/debug/social.local.conf` file to `dokuwiki/conf` folder and adapt it to your needs.

You can add new lines for social networks that are not in the list yet. Note that the name must be lower case and contain no special characters (spaces must be replaced by underscores), `my_network` is a valid example.

As for other SVG glyphs, you can put your own SVG files in `conf/svg` folder as long as it is named exactly like corresponding target network in configuration file.

:bulb: you can add `<title>` tag within your SVG files to add a custom tooltip on hover.
