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
* Extracting color from image comes from a comment on [this page](https://stackoverflow.com/questions/10290259/detect-main-colors-in-an-image-with-php)
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

* [x] Namespace dependent CSS for colors and fonts (an automatic theme color is possible while quite experimental)
* [x] Namespace dependent UI images (background pattern, banner, widebanner and a potential sidebar header image aka sidecard)
* [ ] Google Fonts : each of main text, headings, condensed text (mostly nav bar) and monospaced text (```code``` syntax) can use a different Google font (be warned that main text font should be kept very readable)
* [ ] Wide banner slider with latest changes at wiki home?
* [ ] Tested with most common plugins ([Blockquote](https://www.dokuwiki.org/plugin:blockquote), [Captcha](https://www.dokuwiki.org/plugin:captcha), [Discussion](https://www.dokuwiki.org/plugin:discussion), [Move](https://www.dokuwiki.org/plugin:move), [SearchIndex](https://www.dokuwiki.org/plugin:searchindex), [SiteMapNavi](https://www.dokuwiki.org/plugin:sitemapnavi), [Styling](https://www.dokuwiki.org/plugin:styling), [Tag](https://www.dokuwiki.org/plugin:tag), [TagAlerts](https://www.dokuwiki.org/plugin:tagalerts), [Translation](https://www.dokuwiki.org/plugin:translation), [Wrap](https://www.dokuwiki.org/plugin:wrap))
* [x] Dark color scheme guidelines
* [x] Topbar with date, newsticker (based on current namespace and sub content) and links
* [x] Easy to customize glyphs(*) (from [Material Design Icons](https://materialdesignicons.com/) like other DW's SVG glyphs or [IcoMoon](https://icomoon.io/) for social links)
* [ ] Sidebar and ToC can be moved out of page content on wide screen (only works in boxed layout)
* [ ] Extracted ToC can be given [scrollspy](https://codepen.io/latifur/pen/qLKXpj) superpowers
* [ ] Retractable sidebar
* [ ] Stickable main navigation bar, pageheader, sidebar and docinfo
* [x] Dynamic navigation button (current NS home, parent NS start or "back to article")
* [x] High number of HTML hooks (based on [this document](https://www.dokuwiki.org/include_hooks))
* [ ] A few HTML replace hooks that let you replace some elements with more fancy HTML code
* [ ] Sub namespaces list based on [Twistienav](https://www.dokuwiki.org/plugin:twistienav) plugin?
* [ ] Siblings based on [Twistienav](https://www.dokuwiki.org/plugin:twistienav) plugin (a breadcrumbs like list of other pages in current namespace)
* [x] Social networks links (see [Social links](https://github.com/geekitude/dokuwiki-template-colormag#social-links) below)
* [x] Supports a cheatsheet that will be shown as a sidebar in edit and preview modes
* [ ] Expanded debug mode to show some specific elements (sample code or images)
  * [x] *a11y* (visual accessibility helpers)
  * [x] *alerts*
  * [x] *banner*
  * [x] *sidecard* (sidebar header image)
  * [x] *images* (all UI images)
  * [x] *includes* (HTML include hooks)
  * [x] *pattern*
  * [ ] *replace* (HTML replace hooks)
  * [x] *social* (load a dummy social networks list)
  * [x] *timers* (show alerts reporting time taken by a few functions, currently autotheme and colored breadcrumbs)
  * [x] *widebanner*
  * [x] *widgets* (show dummy widgets set by `debug/footer.widgets.local.conf` and `debug/side.widgets.local.conf` file)

(*) to replace a glyph by another, simply put desired SVG file (4kb max) in `conf/glyphs` folder (you will most likely need to create it) and name it after the target social network or after one of the following elements : acl.svg, config.svg, date.svg, discussion.svg, editor.svg, extentions.svg, externaleditor.svg, from-playground.svg, help.svg, hide.svg, home.svg, lastmod.svg, locked.svg, map.svg, namespace-start.svg, news.svg, pagepath.svg, parent-namespace.svg, playground.svg, popularity.svg, previous.svg, private-ns.svg, profile.svg, public-page.svg, recycle.svg, refresh.svg, revert.svg, save.svg, search.svg, show.svg, social.svg, styling.svg, translated.svg, translation.svg, upgrade.svg, usertools.svg, usermanager.svg (collapse, ellipsis, expand, menu-down and menu-right are too specific and cannot be customized). Site, user and page tools glyphs can't be customized as they come from DokuWiki core code.

:warning: POSSIBLE SVG NAMES LIST ABOVE NEEDS TO BE UPDATED :warning:

## Settings

* **layout** (*box2wide*) : choose site layout
  * `box` wastes a little space around content on narrow screens
  * `wide` is incompatible with "scrollspy" ToC and will override that setting
  * `box2wide` switches from `box` on large screens to `wide` on smaller ones
  * `mix` most "UI elements" get a `wide` layout while site header and main content are still limited to **style.ini** file's `site-width` value
* **flexflip** (*nothing*) : flip corresponding element's position
  * `banner` : will be moved under site tools
  * `pagenav` : switch PageID and Breadcrumbs positions
  * `sidebar` : will be moved on the osther side of page
  * `pagetools` : just like `sidebar` above
  * `socket` : flip content
* **uicolorize** (*nothing*) : choose UI elements to colorize with `style.ini` file "UI" colors between *topbar*, *pagenav*, *sidebar*, *toc*, *pagetools*, *docinfo* and *footersocket*
* **uicolor** (*neu*) : color set from **style.ini** file to use for elements selected above (*neu*, *alt*, *theme* or *dark* wich uses a slightly lightened __theme_dark__color_ background color to keep contrast with main navigation)
* **autotheme** (*disabled*) : generate a theme color based on this setting if not at home page (translated or not) or at any admin page ([namespace style](https://github.com/geekitude/dokuwiki-template-colormag#namespace-dependent-css) has priority over this setting)
  * `disabled` : theme color will only be based on Colormag's `style.ini` or namespace's `theme.ini`
  * `pageid` : color will be extracted from a *md5* hash of current namespace ID (this doesn't allways give nice results but it's a light and straight forward process)
  * `banner`, `widebanner` or `sidecard` : Colormag will collect main color of corresponding UI image (as this process might be heavy depending on environment, I added a notification showing time used for wiki admins), remember that `sidecard` is only available in namspaces with sidebar
* **glypholors** ([ ]) : add some color to social and/or user tools glyphs
* **topbar** (*date,newsticker,links*) : choose topbar elements
  * `date` : just the server's current date based on `datelocale` and `longdatestring` settings
  * `newsticker` : dynamic list of last changes in current namespace and sub ones (elements listed depend on `newsTicker` setting)
  * `links` : a simple list of links based on a wiki page from current namespace or it's parents
* **newsTicker** (*skip_minors,pages,media,5*) : options used to built last changes list
  * `skip_deleted` : ignore deleted items
  * `skip_minors` : ignore minor updates
  * `skip_subspaces` : only consider elements from current namespace, not sub-namespaces
  * `pages` : show or ignore pages in list
  * `media` : show or ignore media files
  * the number in text field is the number of elements to show (starting from most recent)
* **topbarlinks** (*topbar*) : page containing the list of links to show in topbar
* **datelocale** (*fra*) : language used for dates
* **longdate** (*%A %d %B %Y*) : how long date strings are built (typically with full day of week, ...), [see this page](https://www.php.net/manual/fr/function.strftime.php)
* **shortdate** (*%d/%m/%Y*) : how short and typically fully numeric dates are built, [see this page](https://www.php.net/manual/fr/function.strftime.php) too
* **headerflexalign** (*start*) : set vertical alignment of header items (ie. logo, branding text, right section), note that `start` and `center` are the most common choices
  * `start` : to the top
  * `center`
  * `end` : to the bottom
* **widgetslook** (*classic*) : choose between *classic* or *bordered* widgets
* **breadcrumbslook** (*classic*) : choose between *classic*, *underlined*, *pills*, *underlined-nscolored*, *pills-nscolored* breadcrumbs :bulb: "-nscolored" is based on `style.ini` file if target is home (translated or not) > `theme.ini` file > UI image from `autotheme` setting > target's $ID
* **breadcrumbsglyphs** ([x]) : add glyphs to distinguish specific pages in breadcrumbs (wiki home, user public page, user home private ns, translated pages)
* **links** (*links*) : name of wiki page to use to feed footer links widget
* **licensevisual** (*badge*) : select license image between a small button, larger badge or nothing
* **print** (*siteheader,docinfo,sitefooter,hrefs*) : a few elements you can choose to print or not (**)
  * `siteheader`, `siteheader-banner`, `widebanner`, `toc`, `sidebar`, `docinfo` and `sitefooter` are quite self-explanatory
  * `hrefs` consists in adding the complete target URL as subscript after each link
* **banner** (*banner*) : file name to look after for site banner
* **pattern** (*pattern*) : file name to look after for site background pattern
* **sidecard** (*sidecard*) : file name to look after to use as sidebar header
* **widebanner** (*widebanner*) : file name to look after for widebanner
* **uiimagetarget** (*image-ns*) : choose if UI images are links to a choosen target or just straight images (images from `wiki` namespace will however point to home or have no link at all)
  * `image-ns` : image's namespace start page
  * `current-ns` : current namespace start page
  * `home` : wiki home
  * `none` : no link at all
* **cheatsheet** (*cheatsheet*) : page to look after in "wiki:" namespace to use as an edit and preview modes sidebar

(*) *Autotheme* gives most consistent results if you keep LESS formulas based on theme color in `style.ini` file for alternate colors, UI colors, headings, dark and light theme colors

(**) Note that, so far, ToC and Sidebar can only be printed as pretty ugly full-width blocks

## About

### Breadccrumbs

Both `youarehere` and `trace` code differs from core functions to bring the markup needed for "pills" look and the code for `underlined` colors. While `trace` content is the same, `youarehere` is a bit specific and reflects current page ID parts (ie. current page, current page's namespace's start page if it's different, then other parents) and "home" link is not forced in since it's available in main nav just above.

:memo: Note that Colormag is designed to have both `youarehere` and `trace` enabled at same time (but if `youarehere` is disabled, it will be replaced by a simple page ID string)

Some page links will get glyphs in breadcrumbs :
* ![Wiki Home](/images/glyphs/home.svg) Wiki Home : "absolute" untranslated or default language wiki home
* ![Translated Wiki Home](/images/glyphs/flag.svg) Translated Wiki Home : translated or secondary language wiki home
* ![Namespace Start](/images/glyphs/folder-home.svg) Namespace Start : any none home namespace start page
* ![Translated page](/images/glyphs/flag-triangle.svg) Translated page : any none start page in a secondary language namespace

### UI Images

Banner, site pattern, sidecard and widebanner images are meant to be namespace dependent: simply upload the images you want to use in corresponding namespace (they will also be used for sub-namespaces that don't have them). They can be of jpg, gif or png images but have to respect the names set by corresponding setting.

Images uploaded to `wiki` namespace will be used as default for the whole wiki.

:memo: Note that all UI images are responsive and will shrink or grow with container and sidecard is the only one that will be upscaled if needed to match sidebar width set through `style.ini`.

### Namespace dependent CSS

Copy `colormag/debug/theme.ini` file to a `dokuwiki/conf/colormag/<namespace path>` folder (just create inexistant folders) and customize it's values to your likings. Note that it is not recomended to make huge changes on main and neutral color sets.

You can add other values from `colormag/style.ini` files but it is not recommended to ensure consistency across your wiki.

### Social links

Copy `dokuwiki/lib/tpl/colormag/debug/social.local.conf` file to `dokuwiki/conf` folder and adapt it to your needs.

You can add new lines for social networks that are not in the list yet (but you will eventually have to provide CSS color with a rule like `#colormag__social.glyphcolors a.social.github svg { fill: #24292e; }`). Note that the name must be lower case and contain no special characters (spaces must be replaced by underscores), `my_network` is a valid example.

As for other SVG glyphs, you can put your own SVG files in `conf/svg` folder as long as it is named exactly like corresponding target network in configuration file.

:bulb: you can add `<title>` tag within your SVG files to add a custom tooltip on hover.

### Widgets

#### Bundled footer widgets

* Login form or informations about current user as well as potentially usefull links like `register` and `update profile`
* Links: will show the content of closest `links` wiki page (you can choose another page name in settings and can find an example of such page in `colormag/debug` folder)
* Licence widget shows current license choosen for the whole wiki (you can choose between no image, small button or larger badge
* QRCode to current page shows up when printing page if `QRCode2` plugin is enabled

#### Want more widgets ?

You can add your own widgets based on html files or on pages from `wiki:` namespace (kind of site wide extra sidebars). Simply copy `dokuwiki/lib/tpl/colormag/debug/footer.widgets.local.conf` and/or  `dokuwiki/lib/tpl/colormag/debug/side.widgets.local.conf` file(s) to `dokuwiki/conf` folder and adapt it/them to your needs to include any page from `wiki:` namespace or any HTML file you created in `dokuwiki/lib/tpl/colormag` folder to add them as widgets to the side of main content or in site footer.

Widgets based on HTML files work just like [HTML hooks](https://github.com/geekitude/dokuwiki-template-colormag#include-hooks and you can get started with `dokuwiki/lib/tpl/colormag/debug/samplewidget.html` file as an example).

The main advantage of widgets over classic sidebar is that Dokuwiki's cache is not involved (you don't need to remember to add `~~NOCACHE~~`. The second advantage is that splitting content between sidebar and widgets can make things aesthically less bulky.

The drawback of widgets against sidebar is that they do not depend on current namespace (except if based on Dokuwiki syntax that .

### HTML hooks

Spacious can be customized using HTML files that will be displayed at one of the many available include or replace hooks. Include hooks add some content while replace hooks take place of standard content.
To get started, copy the correspondig HTML file from `dokuwiki/lib/tpl/colormag/debug` folder to `dokuwiki/lib/tpl/colormag` folder and change it to your liking (don't forget to remove existing `*-hook-sample` class).

You can add `noprint` class to avoid the content to be printed.

See [DokuWiki's documentation](https://www.dokuwiki.org/include_hooks) for more details about include hooks.

#### Include hooks

* *meta.html* : just before `</head>` tag (use this to add additional styles or metaheaders)
* *header.html* : right above everything but [Skip to Content] and [Topbar]
* *brandingfooter.html* : just below site-logo/title/banner section
* *bannerheader.html* : above banner
* *bannerfooter.html* : below banner
* *toolsheader.html* : above header tools area
* *toolsfooter.html* : below header tools area
* *headerfooter.html* : below site header (just before main navigation area)
* *pagenavheader.html* : at the begining of pagenav area
* *pagenavfooter.html* : at the bottom of pagenav area
* *pagenavprimaryheader.html* : above pageid/youarehere
* *pagenavprimaryfooter.html* : below pageid/youarehere
* *pagenavsecondaryheader.html* : above trace breadcrumbs
* *pagenavsecondaryfooter.html* : below trace breadcrumbs
* *mainheader.html* : above main content area
* *sidebarheader.html* : before sidebar content
* *pageheader.html* : above actual DW page content
* *sidebarfooter.html* : after sidebar content
* *pagefooter.html* : below actual DW page content
* *mainfooter.html* : between main content area and site footer, 
* *footerheader.html* : at the top of site footer
* *widgetsheader.html* : above footer widgets area
* *footerwidget.html* : included as a footer widget (after other widgets)
* *widgetsfooter.html* : below footer widgets area
* *footer.html* : at the very end of site page (last visible item before `</body>` tag)

#### Replace hooks

These specific HTML hooks let you change some template elements with fancier HTML code of your own
* *sidebar.html* : replacement for sidebar page
* *title.html* : replace wiki title string with HTML element
* *tagline.html* : replace wiki description string with HTML element
* *banner.html* : replaces potential banner image with HTML element
* *widebanner.html* : replaces potential banner image with HTML element

### Cheatsheet

You can create a "wiki:cheatsheet" page (or another name if you change `cheatsheet` setting) that will be shown as a sidebar in edit and preview modes.

This page should provide hints about syntax not allready provided by edit form buttons or directions for users editing pages. You can copy `colormag/debug/cheatsheet.txt` to `dokuwiki/data/pages/wiki` to get started.

:warning: It should be kept as short as possible to be efficient since there's not ToC :warning: 

### Dark skin

Here are a few suggested steps to get a nice consistent dark wiki with Colormag :
* change the following values in `style.ini` file
```__text__                = "#ccc"
__background__          = "#333"
__background_neu__      = "#eee"
__border__              = "#aaa"
__background_site__     = "#000"
__background_ui_color__ = "darken(@ini_theme_dark_color, 5%)"
__shadows_color__       = "#fff"```

*You may want to invert "alt" text and background colors.*

* go to settings and enable all elements in **uicolorize**
