=== Rollover Tab ===
Tags: tab, shortcode, graphical, style, css, javascript, js
Requires at least: 3.1
Tested up to: 3.3.2
Stable tag: 1.2.1
Contributors: Eiji 'Sabaoh' Yamada
License: GPLv2

This is shortcode plugin which make graphical tab panels available.


== Description ==

This plugin define two shortcodes to generate graphical tab panels in posts and pages. You don't have to edit your theme's style.css, and any templates. 

To browse it's tab panels, NOT IE browser (Chrome, FireFox, Opera, Safari were tested) or IE8 or above required. With IE7 or below, it will generate standard &lt;ul&gt; list and recommend to use other browser or update.

Please visit my sample at http://sabaoh.sakura.ne.jp/wordpress/?page_id=106

"right" attribute sample at http://sabaoh.sakura.ne.jp/wordpress/?page_id=116

"scroll" attribute sample at http://sabaoh.sakura.ne.jp/wordpress/?page_id=122

= Usage: =

<pre>
[rollover-tabs name="id" norollover="true" border="true" margin="-2px" height="1.5in" left="1px" right="1px" scroll="true" font="small"][rollover-tab name="tab1" label="sample1"]
content of tab1...
...
[/rollover-tab][rollover-tab name="tab2" label="sample2" font="large"]
content of tab2...
...
[/rollover-tab][/rollover-tabs]
</pre>

= Attribute: =

name:
internal name (id). [rollover-tabs name="id"] is optional (default value is "rollover"). [rollover-tab name="tab1"] is required.

norollover:
optional boolean. As default tab panels will switch when your mouse is on the tab (click is not necessary). If norollover is set "true", panels will switch when you click the tab.

border:
optional boolean. As default panel has no border. If border is set "true", border will display.

margin:
optional. As default margin-top was defined in css/rollover-tab.css (Now vlaue has changed to 0 for all themes). If your panels' top border didn't match the tab graphic, you could adjust the position of the top border by either edit css/rollover-tab.css or set margin attribute in each rollover-tabs tag.

height:
optional. As default panels' height will adjust automatic. You can assign fixed height to your panels.

left:
optional. As default left defined in css/rollover-tab.css (Value is "1px"). If you wanted to make space in left of tabs, you could set greater value to this attribute. "0" or "0px" is NOT recommended due to avoid lack of border.

right:
optional. Default value is false. If you wanted to make tabs align right, you could set "1px" or greater value to this attribute. If "left" attribute was setted, this attribute would be ignored. "0" or "0px" is NOT recommended due to avoid lack of border.

scroll:
optional boolean. As default panel has no scroll bar. If scroll attribute was set "true", panel will have scroll bar.

font:
optional. You can assign font-size in tabs, for example "10pt" or "small". If it was used with [rollover-tab ...], size would be assigned for just ONE tab. With [rollover-tabs ...], size would be applied all of tabs, except [rollover-tab ...] with font attribute assigned.

label:
caption of tabs, required.

NOTICE: Since 1.2.0, margin attribute's default value changed from "-26px" to "0". So if you've assigned margin value, You had to change your assignment in order to maintain good display.

NOTICE: with rich text editor, you must NOT insert any line breaks between [rollover-tabs] and next [rollover-tab], between [/rollover-tab] and next [rollover-tab], between [/rollover-tab] and [/rollover-tabs]. Due to wordpress automatic &lt;p&gt; insertion.

= Features: =

* You can create a panel which contain tabs, with [rollover-tabs] shortcode.
* In between [rollover-tabs] and [/rollober-tabs], you can define panels with [rollover-tab name="..." label="..."]...[/rollover-tab] shortcode.
* Tabs with label will display in rich graphical background.
* As default, tabs will switch when your mouse is on the tab. Optional, you can choose click-needed-switching.
* You can choose the border on or off.
* You can adjust position of top border without editing stylesheet.
* You can assign height of panels, without editing stylesheet of course.
* Stylesheet was improved and top border will match with graphics, theme proof positioning was innovated since 1.2.0.
* You can use some other shortcodes between [rollover-tab...] and [/rollover-tab], since 1.2.0.
* You can assign position of tabs left or right, since 1.2.0.
* You can choose the scroll bar on or off. Since 1.2.0.
* You can assign font size for tabs. Since 1.2.1.

== Installation ==

* Download and extract the Rollover Tab archive file into your wordpress/wp-content/plugins/ folder.
* Access your site. Go to dashboard. And activate this plugin.
* Then edit your posts or pages with shortcodes added.


== Frequently Asked Questions ==

= My tabs are NOT displayed in line. They looks like steps down. =

You DID insert some line breaks between two shortcodes with rich text editor, did'nt you?

For example:
<pre>
[rollover-tabs]
[rollover-tab name="tab1" label="Sample1"]
Sample
This is a sample.
[/rollover-tab]
[rollover-tab name="tab2" label="For example"]
Example
This is example.
[/rollover-tab]
[/rollover-tabs]
</pre>
Show above is incorrect. Below one is correct.
<pre>
[rollover-tabs][rollover-tab name="tab1" label="Sample1"]
Sample
This is a sample.
[/rollover-tab][rollover-tab name="tab2" label="For example"]
Example
This is example.
[/rollover-tab][/rollover-tabs]
</pre>

= I want to my tabs switch when it's clicked. =

In [rollover-tabs] shortcode, please set norollover attribute "true".

For example:
<pre>
[rollover-tabs norollover="true"][rollover-tab name="tab1" label="Sample1"]
Sample
...
</pre>

= I want to make 2 [rollover-tabs] in one post. =

In [rollover-tabs] shortcode, please set name attribute some unique name.

For example:
<pre>
[rollover-tabs name="tabs1"][rollover-tab name="tab1" label="Sample1"]
Sample
...
[/rollover-tab][/rollover-tabs]
...
[rollover-tabs name="tabs2"][...
</pre>


== Screenshots ==
1. Graphics will match white-background themes.


== For more information ==

Please visit http://sabaoh.sakura.ne.jp/wordpress/ . In Japanese only.
If you need information in English, please contact to age.yamada@kxa.biglobe.ne.jp .


== Changelog ==
= 1.2.1 =
* Font attribute was added.
* border color and thickness moved from php to css.
= 1.2.0 =
* Theme proof positioning was innovated. So "margin" attribute's default value changed from "-26px" in php to "0" in css.
* Nested shortcode will proceed between [rollover-tab ...] and [/rollover-tab].
* You can assign position of tabs left or right.
* You can choose the scroll bar on or off.
= 1.1.0 =
* You can choose the border on or off.
* You can adjust position of top border.
* You can assign height of panels.
= 1.0.2 =
stylesheet improved.
= 1.0.1 =
click-needed-swithing bug fix.
= 1.0.0 =
the first release.
