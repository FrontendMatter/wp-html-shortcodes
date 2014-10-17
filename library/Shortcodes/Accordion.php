<?php namespace Mosaicpro\WP\Plugins\HGShortcodes;

use Mosaicpro\HtmlGenerators\Accordion\Accordion;
use Mosaicpro\WpCore\Shortcode;

/**
 * Class Accordion_Shortcode
 * @package Mosaicpro\WP\Plugins\HGShortcodes
 */
class Accordion_Shortcode extends Shortcode
{
    /**
     * Holds an Accordion_Shortcode instance
     * @var
     */
    protected static $instance;

    /**
     * Add the Shortcode to WP
     */
    public function addShortcode()
    {
        add_shortcode('accordion', function($atts)
        {
            $atts = shortcode_atts( ['style' => 'btn-default', 'size' => 'default', 'label' => 'Button'], $atts );
            $attributes = [];

            // style
            $attributes['class'] = 'btn-' . $atts['style'];

            // size
            if ($atts['size'] !== false && $atts['size'] !== 'default')
                $attributes['class'] .= ' btn-' . $atts['size'];

            // create button
            // return Button::make($atts['label'])->addAttributes($attributes);
        });
    }
}