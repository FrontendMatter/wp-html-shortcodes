<?php namespace Mosaicpro\WP\Plugins\HGShortcodes;

use Mosaicpro\HtmlGenerators\Grid\Grid;
use Mosaicpro\WpCore\Shortcode;

/**
 * Class Grid_Column_Shortcode
 * @package Mosaicpro\WP\Plugins\HGShortcodes
 */
class Grid_Column_Shortcode extends Shortcode
{
    /**
     * Holds a Grid_Column_Shortcode instance
     * @var
     */
    protected static $instance;

    /**
     * Add the Shortcode to WP
     */
    public function addShortcode()
    {
        add_shortcode('column', function($atts, $content)
        {
            $atts = shortcode_atts( ['size' => '6'], $atts );
            $attributes = [];
            if (isset($atts['class'])) $attributes['class'] = $atts['class'];
            return Grid::column($atts['size'], do_shortcode($content), $attributes);
        });
    }
}