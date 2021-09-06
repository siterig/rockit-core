<?php
namespace SiteRig\Rockit;

class Core
{
    /**
     * Create a new instance
     *
     * @author Matt Stone <matt@rockandscissor.com>
     *
     * @since 1.0.0
     */
    public function __construct() {

    }

    /**
     * Turn slug into camel case
     *
     * @param string $slug
     * @return string Camelcase version of the slug
     *
     * @author Matt Stone <matt@rockandscissor.com>
     *
     * @since 1.0.0
     */
    public function rockit_slug_to_camelcase( string $slug ) : string
    {
        return str_replace( ' ', '', ucwords( str_replace( '-', ' ', $slug ) ) );
    }

}
