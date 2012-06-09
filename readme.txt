=== Rollover Tab ===
Tags: tab, shortcode, graphical, style, css, javascript, js
Requires at least: 3.1
Tested up to: 3.3.2
Stable tag: 1.0.2
Contributors: Eiji 'Sabaoh' Yamada
License: GPLv2

This is shortcode plugin which make graphical tab panels available.


== Description ==

This plugin define two shortcodes to generate graphical tab panels in posts and pages. You don't have to edit your theme's style.css, and any templates. To browse it's tab panels, NOT IE browser (Chrome, FireFox, Opera, Safari were tested) or IE8 or above required. With IE7 or below, it will generate standard &lt;ul&gt; list and recommend to use other browser or update.

= Usage: =

<pre>
[rollover-tabs name="id" norollover="true"][rollover-tab name="tab1" label="sample1"]
content of tab1...
...
[/rollover-tab][rollover-tab name="tab2" label="sample2"]
content of tab2...
...
[/rollover-tab][/rollover-tabs]
</pre>

= Attribute: =

name: internal name (id). [rollover-tabs name="id"] is optional (default value is "rollover"). [rollover-tab name="tab1"] is required.

norollover: optional boolean. As default tab panels will switch when your mouse is on the tab (click is not necessary). If norollover is set "true", panels will switch when you click the tab.

label: caption of tabs, required.

NOTICE: with rich text editor, you must NOT insert any line breaks between [rollover-tabs] and next [rollover-tab], between [/rollover-tab] and next [rollover-tab], between [/rollover-tab] and [/rollover-tabs]. Due to wordpress automatic &lt;p&gt; insertion.

= Features: =

* You can create a panel which contain tabs, with [rollover-tabs] shortcode.
* In between [rollover-tabs] and [/rollober-tabs], you can define panels with [rollover-tab name="..." label="..."]...[/rollover-tab] shortcode.
* Tabs with label will display in rich graphical background.
* As default, tabs will switch when your mouse is on the tab. Optional, you can choose click-needed-switching.


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

1. As published, rollover tab will match white-background themes.


== For more information ==

Please visit http://sabaoh.sakura.ne.jp/wordpress/ . In Japanese only.
If you need information in English, please contact to age.yamada@kxa.biglobe.ne.jp .


== Changelog ==
= 1.0.2 =
stylesheet improved.
= 1.0.1 =
click-needed-swithing bug fix.
= 1.0.0 =
the first release.
