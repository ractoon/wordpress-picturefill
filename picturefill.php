<?php
/**
 * Picturefill Shortcode Plugin
 *
 * Imports the Picturefill version 2 library for responsive images and provides a shortcode.
 *
 * @package   Picturefill
 * @author    ractoon
 * @license   GPL-2.0+
 * @link      http://www.ractoon.com
 * @copyright 2014 ractoon, Inc.
*
* @wordpress-plugin
* Plugin Name: WordPress Picturefill
* Description: Shortcode that uses the Picturefill polyfill to enable responsive image handling.
* Version: 1.0.0
* Author: ractoon
* Author URI: http://www.ractoon.com
* License: GPL-2.0+
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
* GitHub Plugin URI: https://github.com/ractoon/wordpress-picturefill
* WordPress-Picturefill: v1.0.0
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Picturefill {
	public function __construct() {
		// custom head scripts
		add_action( 'wp_head', array( $this, 'head_scripts' ) );

		// shortcodes
		add_shortcode( 'picture', array( $this, 'fn_picture_sc' ) );
		add_shortcode( 'source', array( $this, 'fn_source_sc' ) );
	}

	// Custom script inclusion in head
	public function head_scripts() {
		// Picture element HTML5 shiv
    echo '<script>document.createElement( "picture" );</script>';
	}

	// [picture]
	public function fn_picture_sc( $atts, $content ) {
		wp_enqueue_script( 'picturefill', plugins_url( 'assets/js/picturefill.min.js', dirname(__FILE__) ), array(), '2.1', true );

	  $a = shortcode_atts( array(
	    'class'     => '',
	    'img'       => '',
	    'alt'       => '',
	    'themedir'  => false,
	    'width'     => '',
	    'height'    => ''
	  ), $atts );

	  $html = '<picture';
	  if ( !empty( $a['class'] ) ) $html .= ' class="' . $a['class'] . '"';
	  $html .= '>';

	  if ( !empty( $content ) ) {
	    $html .= '<!--[if IE 9]><video style="display: none;"><![endif]-->';
	    $html .= do_shortcode( $content );
	    $html .= '<!--[if IE 9]></video><![endif]-->';
	  }

	  $html .= '<img srcset="';
	  if ( !empty( $a['themedir'] ) ) $html .= get_stylesheet_directory_uri();
	  $html .= $a['img'] . '" alt="' . $a['alt'] . '"';
	  if ( !empty( $a['width'] ) ) $html .= ' width="' . $a['width'] . '"';
	  if ( !empty( $a['height'] ) ) $html .= ' height="' . $a['height'] . '"';
	  $html .= '>';
	  $html .= '</picture>';

	  return $html;
	}

	// [source]
	public function fn_source_sc( $atts ) {
	  $a = shortcode_atts( array(
	    'srcset'    => '',
	    'media'     => '',
	    'type'      => '',
	    'themedir'  => false
	  ), $atts );

	  $html = '<source srcset="';
	  if ( !empty( $a['themedir'] ) ) $html .= get_stylesheet_directory_uri();
	  $html .= $a['srcset'] . '"';
	  if ( !empty( $a['media'] ) ) $html .= ' media="' . $a['media'] . '"';
	  if ( !empty( $a['type'] ) ) $html .= ' type="' . $a['type'] . '"';
	  $html .= '>';

	  return $html;
	}

}

$wpPicturefill = new Picturefill();