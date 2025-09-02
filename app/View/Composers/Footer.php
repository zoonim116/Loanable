<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Footer extends Composer
{
    protected static $views = [
        'sections.footer',
    ];

    public function with()
    {
        $formObj = false;
        if (get_field('contact_form', 'option')) {
            $formId = str_replace('ff_', '', get_field('contact_form', 'option'));
            $formApi = fluentFormApi('forms');
            $formObj = $formApi->find($formId = $formId);
        }

        return [
            'logo' => get_field('footer_logo', 'option') ?? false,
            'socials' => [
                'facebook' => get_field('fb_link', 'option') ?? false,
                'x' => get_field('x_link', 'option') ?? false,
                'instagram' => get_field('insta_link', 'option') ?? false,
                'linkedin' => get_field('linked_link', 'option') ?? false,
            ],
            'footer_text_col_1' => get_field('footer_text_col_1', 'option') ?? false,
            'footer_text_col_2' => get_field('footer_text_col_2', 'option') ?? false,
            'email' => get_field('email', 'option') ?? false,
            'phone' => get_field('footer_phone', 'option') ?? false,
            'cta_link' => get_field('cta_link', 'option') ?? false,
            'contact_form_id' => $formObj ? $formObj->id : false,
            'contact_form_title' => $formObj ? $formObj->title : false,
        ];
    }
}
