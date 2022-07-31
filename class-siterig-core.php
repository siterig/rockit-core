<?php
namespace SiteRig;

class Core
{
    public $shortcodes;

    /**
     * Create a new instance
     *
     * @since 1.0.0
     */
    public function __construct() {

        add_shortcode( 'siterig', array( $this, 'create_shortcode' ) );

    }

    /**
     * Add to universal shortcode
     *
     * @since 1.0.0
     *
     * @param   array   $args
     * @return  boolean true if successful, false if option already exists
     */
    protected function add_option_to_shortcode( array $args ) {

        if ( ! array_key_exists( $args['output'], $this->shortcodes) ) {

            if ( function_exists( $args['function'] ) ) {

                $sanitised_args['function'] = $args['function'];

                if ( ! array_key_exists( 'filters', $args ) ) {

                    $sanitised_args['filters'] = $args['filters'];

                } else {

                    $sanitised_args['filters'] = null;

                }

                $this->shortcodes[$args['output']] = $sanitised_args;
                return true;

            }

        }
        return false;

    }

    /**
     * Shortcode to output various site settings in the content
     *
     * @since 1.0.0
     *
     * @param   array   $atts   Attributes
     * @return  string  Output of shortcode
     */
    private function create_shortcode( array $atts ) {

        extract( shortcode_atts( array(
            'output' => 'siterig',
        ), $atts ) );

        if ($atts['output'] == 'siterig') {
            return;
        }

        if ( !array_key_exists( $atts['output'], $this->shortcodes ) ) {
            return;
        }

        $this->shortcodes['output']( $this->shortcodes['output']['function'] );

    }

    /**
     * Turn slug into camel case
     *
     * @since 1.0.0
     *
     * @param   string  $slug
     * @return  string  Camelcase version of the slug
     */
    public function slug_to_camelcase( string $slug ) : string
    {
        return str_replace( ' ', '', ucwords( str_replace( '-', ' ', $slug ) ) );
    }

}
