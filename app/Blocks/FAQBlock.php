<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class FAQBlock extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'FAQ Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Block Frequently asked questions';

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
        'core/paragraph' => ['placeholder' => 'Welcome to the F A Q Block block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'title' => $this->get_title(),
            'subtitle' => $this->get_subtitle(),
            'link' => $this->get_link(),
            'items' => $this->items(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('f_a_q_block');

        $fields
            ->addWysiwyg('title', [
                'label' => 'Title',
                'instructions' => 'Mark a part of text as bold to color in accent color',
            ])
            ->addWysiwyg('subtitle', [
                'label' => 'Subtitle',
            ])
            ->addLink('link', [
                'label' => 'Button Link',
            ])
            ->addRepeater('items')
                ->addText('title', [
                    'label' => 'Title',
                ])
                ->addWysiwyg('content', [
                    'label' => 'Content',
                ])
            ->endRepeater();

        return $fields->build();
    }

    public function get_title()
    {
        return get_field('title') ?? false;
    }

    public function get_subtitle()
    {
        return get_field('subtitle') ?? false;
    }

    public function get_link()
    {
        return get_field('link') ?? false;
    }
    public function items()
    {
        return get_field('items') ?? [];
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
        return 'wp-block-faq-block py-6 lg:py-12';
    }
}
