<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class LoanRatesBlock extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Loan Rates Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'Block with rates';

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
     * The block preview example data.
     *
     * @var array
     */
    public $example = [
        'items' => [
            ['item' => 'Item one'],
            ['item' => 'Item two'],
            ['item' => 'Item three'],
        ],
    ];

    /**
     * The block template.
     *
     * @var array
     */
    public $template = [
        'core/heading' => ['placeholder' => 'Hello World'],
        'core/paragraph' => ['placeholder' => 'Welcome to the Loan Rates Block block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'title' => $this->get_title(),
            'sub_title' => $this->get_sub_title(),
            'description' => $this->get_description(),
            'link' => $this->get_link(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('loan_rates_block');

        $fields
            ->addWysiwyg('title', [
                'label' => 'Title',
                'instructions' => 'Mark a part of text as bold to color in accent color',
            ])
            ->addText('sub_title', [
                'label' => 'Subtitle',
            ])
            ->addLink('link', [
                'label' => 'Button Link',
            ])
            ->addTextarea('description', [
                'label' => 'Under button text',
            ]);

        return $fields->build();
    }

    public function get_title()
    {
        return get_field('title') ?? false;
    }

    public function get_sub_title()
    {
        return get_field('sub_title') ?? false;
    }

    public function get_link()
    {
        return get_field('link') ?? false;
    }

    public function get_description()
    {
        return get_field('description') ?? false;
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
        return 'wp-block-loan-rates-block  py-10 bg-gray-200 lg:bg-white';
    }
}
