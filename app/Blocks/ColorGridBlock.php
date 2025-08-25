<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class ColorGridBlock extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Color Grid Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Block with color cards';

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
        'core/paragraph' => ['placeholder' => 'Welcome to the Color Grid Block block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'title' => $this->get_title(),
            'cards' => $this->get_cards(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('color_grid_block');

        $fields
            ->addWysiwyg('title', [
                'label' => 'Title',
                'instructions' => 'Mark a part of text as bold to color in accent color',
            ])
            ->addRepeater('cards')
                ->addSelect('bg_color', [
                    'label' => 'Background color',
                    'instructions' => 'Select color',
                    'choices' => [
                        'bg-pink-600' => 'Pink',
                        'bg-blue-600' => 'Blue',
                        'bg-black-800' => 'Black',
                    ]
                ])
                ->addImage('icon', [
                    'label' => 'Icon',
                ])
                ->addTextarea('card_title', [
                    'label' => 'Title',
                    'new_lines' => 'br',
                    'rows' => 2,
                ])
                ->addTextarea('card_content', [
                    'label' => 'Content',
                    'new_lines' => 'br',
                    'rows' => 5,
                ])
                ->addLink('card_link', [
                    'label' => 'Button Link',
                ])
            ->endRepeater();

        return $fields->build();
    }


    public function get_title()
    {
        return get_field('title') ?? false;
    }

    public function get_cards()
    {
        return get_field('cards') ?? false;
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
        return 'wp-block-color-grid-block  py-10';
    }
}
