<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;

class ThemeSettings extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Theme Settings';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Theme Settings';

    /**
     * The option page field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('theme_settings');

        $fields
            ->addTab('header', [
                'label' => 'Header',
            ])
                ->addImage('logo', [
                    'label' => 'Logo',
                ])
                ->addText('header_phone', [
                    'label' => 'Phone',
                ])
            ->addTab('footer', [
                'label' => 'Footer',
            ])
                ->addImage('footer_logo', [
                    'label' => 'Logo',
                ])
            ->addText('footer_phone', [
                'label' => 'Phone',
                'wrapper' => [
                    'width' => '50%',
                ]
            ])
            ->addEmail('email', [
                'label' => 'Email',
                'wrapper' => [
                    'width' => '50%',
                ]
            ])
            ->addMessage('Social network links', '')
                ->addUrl('fb_link', [
                    'label' => 'Facebook',
                    'wrapper' => [
                        'width' => '25%'
                    ]
                ])
                ->addUrl('x_link', [
                    'label' => 'X',
                    'wrapper' => [
                        'width' => '25%'
                    ]
                ])
                ->addUrl('insta_link', [
                    'label' => 'Instagram',
                    'wrapper' => [
                        'width' => '25%'
                    ]
                ])
                ->addUrl('linked_link', [
                    'label' => 'LinkedIn',
                    'wrapper' => [
                        'width' => '25%'
                    ]
                ])
            ->addMessage('Footer Text', '')
            ->addWysiwyg('footer_text_col_1', [
                'label' => 'Footer Text Left Column',
                'wrapper' => [
                    'width' => '50%'
                ]
            ])
            ->addTextarea('footer_text_col_2', [
                'label' => 'Footer Text Right Column',
                'wrapper' => [
                    'width' => '50%'
                ],
                'new_lines' => 'br'
            ]);


        return $fields->build();
    }
}
