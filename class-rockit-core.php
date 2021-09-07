<?php
namespace SiteRig\Rockit;

class Core
{
    /**
     * Create a new instance
     */
    public function __construct() {

        add_shortcode( 'rockit', array( $this, 'create_shortcode' ) );

    }

    /**
     * Turn slug into camel case
     *
     * @param   string  $slug
     * @return  string  Camelcase version of the slug
     */
    public function rockit_slug_to_camelcase( string $slug ) : string
    {
        return str_replace( ' ', '', ucwords( str_replace( '-', ' ', $slug ) ) );
    }

    /**
     * Shortcode to output various site settings in the content
     *
     * @param   array   $atts
     * @return  string  Output of shortcode
     */
    function create_shortcode( $atts ) {

        extract( shortcode_atts( array(
            'option' => 'rockit',
        ), $atts ) );

        // return the field content
        return "hello world";

    }

}
