<?php
/*
Plugin Name: Rollover-Tab
Plugin URI:  http://sabaoh.sakura.ne.jp/wordpress/
Description: With this plugin, you can use [rollover-tabs name="rollover"][rollover-tab name="tab1" label="example"]...[rollover-tab ...]...[/rollover-tabs] shortcode. This may display in graphical tabs it's switched only mouse over. Not IE browser (chrome, firefox, opera, and safari was tested), IE 8 or above is required. And when browser is IE 5, IE 6 or IE 7, update recommendation will appear.
Version:     1.2.1
Author:      Eiji 'Sabaoh' Yamada
Author URI:  http://sabaoh.sakura.ne.jp/wordpress/
License:     GPLv2
*/


/*  Copyright 2012 Eiji 'Sabaoh' Yamada (email : age.yamada@kxa.biglobe.ne.jp)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/**
 * start with any potential translation
 */
load_plugin_textdomain( 'rollover-tab', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );


/**
 * Loads the stylesheet for tabs
 *
 * @since 1.0.0
 */
function rotab_enqueue_style()
{
	$css_path = WP_PLUGIN_URL.'/'.str_replace( basename( __FILE__ ), "", plugin_basename( __FILE__ ) );
	$css_path = $css_path.'css/rollover-tab.css';

	wp_register_style( 'rollover-tab-css', $css_path, array(), false, 'screen' );
	wp_enqueue_style( 'rollover-tab-css', false, array(), false, 'screen' );
}

add_action( 'wp_print_styles', 'rotab_enqueue_style' );


/**
 * Loads the IE bug fix script
 *
 * @since 1.0.0
 */
function rotab_enqueue_script()
{
	$js_path = 'http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js';
	wp_register_script( 'rollover-tab-js', $js_path );
	wp_enqueue_script( 'rollover-tab-js' );
}

add_action( 'wp_enqueue_scripts', 'rotab_enqueue_script' );


/**
 * add "rollover-tab" short code - hook 1
 *
 * @since 1.0.0
 */
function rollover_tab_shortcode1( $atts, $content = null ) {
	global $rotab_name;
	global $rotab_font;

	// get parameters
	extract( shortcode_atts( array(
		'name'  => false,
		'label' => false,
		'font'  => false,
	), $atts ) );

	if ( $name && $label ) {
		// generate tab
		$style = '';
		if ( $font )
			$style = ' style="font-size:' . $font . ';"';
		elseif ( $rotab_font )
			$style = ' style="font-size:' . $rotab_font . ';"';
		$html = <<< HERE
				<li><a id="$rotab_name-tab-$name" href="#$rotab_name-tabpanel-$name" role="tab"$style>$label</a></li>

HERE;
		return $html;
	} else {
		return '';
	}
}


/**
 * add "rollover-tab" short code - hook 2
 *
 * @since 1.0.0
 */
function rollover_tab_shortcode2( $atts, $content = null ) {
	global $rotab_name;

	// get parameters
	extract( shortcode_atts( array(
		'name' => false,
		'label' => false
	), $atts ) );

	if ( $name && $label ) {
		// generate tab panel
		$html = <<< HERE
			<section id="$rotab_name-tabpanel-$name" tabindex="0" role="tabpanel">

HERE;

		$html .= do_shortcode( $content );

		$html .= <<< HERE
			</section>

HERE;
		return $html;
	} else {
		return '';
	}
}


/**
 * add "rollover-tabs" short code
 *
 * @since 1.0.0
 */
function rollover_tabs_shortcode( $atts, $content = null ) {
	global $rotab_name;
	global $rotab_font;

	// get parameters
	extract( shortcode_atts( array(
		'name' => 'rollover',
		'norollover' => false,
		'border' => false,
		'margin' => false,
		'height' => false,
		'left'   => false,
		'right'  => false,
		'scroll' => false,
		'font'   => false,
	), $atts ) );

	if ( $name ) {
		$rotab_name = $name;
		$rotab_font = $font;

		// generate graphical tabs - header
		$html = '<section id="' . $name . '-tabbox"';
		if ( !$norollover )
			$html .= ' data-options="autofocus"';
		$html .= ">\n";

		$style = '';
		if ( $left )
			$style = ' style="left:' . $left . ';"';
		elseif ( $right )
			$style = ' style="left:auto; right:' . $right . ';"';
		$html .= <<< HERE
  <![if !IE 8]>
	<header>
  <![endif]>
  <!--[if IE 8]>
	<header style="height:22px;">
  <![endif]-->
		<![if !lte IE 7]>
			<ul role="tablist" aria-owns="$name-tabpanels"$style>
		<![endif]>
		<!--[if lte IE 7]>

HERE;
		$html .= "\t\t\t<h2>" . __( 'Index - Please try other (not IE) browser, or IE 8 or above.', 'rollover-tab' ) . "</h2>\n";
		$html .= <<< HERE
			<ul aria-owns="$name-tabpanels">
		<![endif]-->

HERE;

		// proceed nested shortcode 1
		add_shortcode( 'rollover-tab', 'rollover_tab_shortcode1' );
		$html .= do_shortcode( $content );

		// close header and start panels
		$style = '';
		if ( $margin || $border || $height || $scroll ) {
			$style = ' style="';
			if ( $margin )
				$style .= "margin-top:$margin;";
			if ( $border )
				$style .= 'border-style:solid;';
			if ( $height )
				$style .= "height:$height;";
			if ( $scroll )
				$style .= 'overflow:scroll;';
			$style .= '"';
		}
		$html .= <<< HERE
			</ul>
	</header>
	<div id="$name-tabpanels"$style>

HERE;

		// proceed nested shortcode 2
		add_shortcode( 'rollover-tab', 'rollover_tab_shortcode2' );
		$html .= do_shortcode( $content );

		// close panels
		$js_path = WP_PLUGIN_URL.'/'.str_replace( basename( __FILE__ ), "", plugin_basename( __FILE__ ) );
		$js_path = $js_path.'js/rollover-tab.js';
		$html .= <<< HERE
	</div>
</section>
<script src="$js_path"></script>

HERE;

		return $html;
	} else {
		return '';
	}
}

add_shortcode( 'rollover-tabs', 'rollover_tabs_shortcode' );
