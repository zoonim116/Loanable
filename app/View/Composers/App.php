<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Retrieve the site name.
     */
    public function siteName(): string
    {
        return get_bloginfo('name', 'display');
    }

    public function mainLogo()
    {
        return get_field('logo', 'option') ?? false;
    }

    public function hideCtaButton()
    {
        global $post;
        return !(is_null(get_field('hide_cta', $post->ID)) || !get_field('hide_cta', $post->ID));
    }
}
