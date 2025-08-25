<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class HeroBlock extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Hero Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A hero Block';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'theme';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'editor-ul';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = ['page'];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The ancestor block type allow list.
     *
     * @var array
     */
    public $ancestor = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'preview';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The default block spacing.
     *
     * @var array
     */
    public $spacing = [
        'padding' => null,
        'margin' => null,
    ];

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => false,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => true,
        'multiple' => false,
        'jsx' => false,
        'color' => [
            'background' => false,
            'text' => false,
            'gradients' => false,
        ],
        'spacing' => [
            'padding' => false,
            'margin' => false,
        ],
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    public $styles = [];

    /**
     * The block template.
     *
     * @var array
     */
    public $template = [
        'core/heading' => ['placeholder' => 'Hello World'],
        'core/paragraph' => ['placeholder' => 'Welcome to the Hero Block block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'title' => $this->title(),
            'subtitle' => $this->subtitle(),
            'secondary_subtitle' => $this->secondary_subtitle(),
            'button_link' => $this->button_link(),
            'after_button_text' => $this->after_button_text(),
            'big_image' => $this->big_image(),
            'big_image_overflow_image' => $this->big_image_overflow_image(),
            'small_image' => $this->small_image(),
            'heading' => $this->heading(),
            'sub_heading' => $this->sub_heading(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('hero_block');

        $fields
            ->addTab('Text Settings')
            ->addWysiwyg('title', [
                'label' => 'Title',
                'media_upload' => false,
                'default_value' => 'Secured Loans <br/> <strong>Made Easy</strong>',
            ])
            ->addText('subtitle', [
                'label' => 'Subtitle',
                'default_value' => 'Unlock the value in your home with expert advice, competitive rates, and 5-star service from Loanable.',
            ])
            ->addText('secondary_subtitle', [
                'label' => 'Secondary Subtitle',
                'default_value' => 'Agreements in principle in 60 minutes or less',
            ])
            ->addLink('button_link', [
                'label' => 'Button Link',
            ])
            ->addText('after_button_text', [
                'label' => 'After Button Text',
                'default_value' => 'Authorised and regulated by the FCA',
            ])
            ->addTab('Images Settings', [])
            ->addImage('big_image', [
                'label' => 'Big Image',
                'required' => true,
            ])
            ->addImage('big_image_overflow_image', [
                'label' => 'Image over a Big Image',
            ])
            ->addText('heading', [
                'label' => 'Title for a text card',
                'wrapper' => [
                    'width' => '50%',
                ],
                'default_value' => '400+',
            ])
            ->addText('sub_heading', [
                'label' => 'Subtitle for a text card',
                'wrapper' => [
                    'width' => '50%',
                ],
                'default_value' => 'Secured loan products',
            ])
            ->addImage('small_image', [
                'label' => 'Small Image',
            ]);

        return $fields->build();
    }

    /**
     * Retrieve the items.
     *
     * @return array
     */
    public function title()
    {
        return get_field('title') ?? false;
    }

    public function subtitle()
    {
        return get_field('subtitle') ?? false;
    }

    public function button_link()
    {
        return get_field('button_link') ?? false;
    }

    public function secondary_subtitle()
    {
        return get_field('secondary_subtitle') ?? false;
    }

    public function after_button_text()
    {
        return get_field('after_button_text') ?? false;
    }

    public function big_image()
    {
        return get_field('big_image') ?? false;
    }

    public function big_image_overflow_image()
    {
        return get_field('big_image_overflow_image') ?? false;
    }

    public function small_image()
    {
        return get_field('small_image') ?? false;
    }

    public function heading()
    {
        return get_field('heading') ?? false;
    }

    public function sub_heading()
    {
        return get_field('sub_heading') ?? false;
    }

    /**
     * Assets enqueued with 'enqueue_block_assets' when rendering the block.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/enqueueing-assets-in-the-editor/#editor-content-scripts-and-styles
     */
    public function assets(array $block): void
    {
        //
    }

    public function getClasses(): string
    {
        return 'wp-block-hero-block pt-6 pb-8 lg:pt-16';
    }
}
