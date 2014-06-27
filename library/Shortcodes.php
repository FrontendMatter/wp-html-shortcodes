<?php namespace Mosaicpro\WP\Plugins\HGShortcodes;

use Mosaicpro\WpCore\PluginGeneric;

/**
 * Class Shortcodes
 * @package Mosaicpro\WP\Plugins\HGShortcodes
 */
class Shortcodes extends PluginGeneric
{
    /**
     * Holds a Layout instance
     * @var
     */
    protected static $instance;

    /**
     * Initialize the plugin
     */
    public static function init()
    {
        $instance = self::getInstance();

        // i18n
        $instance->loadTextDomain();

        // Initialize Shortcodes
        $instance->initShortcodes();

        // Initialize Admin resources
        $instance->initAdmin();
    }

    /**
     * Get a Singleton instance of Layout
     * @return static
     */
    public static function getInstance()
    {
        if (is_null(self::$instance))
        {
            self::$instance = new static();
        }

        return self::$instance;
    }

    /**
     * Initialize Admin only resources
     * @return bool
     */
    private function initAdmin()
    {
        if (!is_admin()) return false;

        $this->initBuilderComponents();
    }

    /**
     * Enqueue Builder Extension
     */
    private function initBuilderComponents()
    {
        add_action('admin_enqueue_scripts', function(){
            wp_enqueue_script($this->getPrefix('builder-components'), plugin_dir_url(__DIR__) . '/assets/js/builder.js', ['jquery'], '1.0', true);
        });
    }

    /**
     * Initialize Shortcodes
     */
    private function initShortcodes()
    {
        add_action('init', function()
        {
            $shortcodes = [
                'Grid_Row',
                'Grid_Column',
                'Button'
            ];

            foreach ($shortcodes as $sc)
            {
                require_once realpath(__DIR__) . '/Shortcodes/' . $sc . '.php';
                forward_static_call([__NAMESPACE__ . '\\' . $sc . '_Shortcode', 'init']);
            }
        });
    }
}