<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Header extends Composer
{
    protected static $views = [
        'sections.header',
    ];

    public function with()
    {
        return [
            'logo' => get_field('logo', 'option') ?? false,
            'phone' => get_field('header_phone', 'option') ?? false,
            'feefo_img_mobile' => get_field('feefo_img_mobile', 'option') ?? false,
            'feefo_img_desktop' => get_field('feefo_img_desktop', 'option') ?? false,
        ];
    }
}
