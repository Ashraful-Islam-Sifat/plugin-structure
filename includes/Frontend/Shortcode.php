<?php

namespace WeDevs\Academy\Frontend;

/**
 * Shortcode handler class
 */
class Shortcode {
    /**
     * Initializes the class
     */
    function __construct() {
        add_shortcode( 'wedevs_academy_shortcode', [ $this, 'render_shortcode' ] );
    }

    public function render_shortcode( $atts, $content = '' ) {
        return "<div class='test'>Hello from shorcode</div>";
    }
}
