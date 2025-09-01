<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class TextAndCheckmarksBlock extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Text And Checkmarks Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = '2 columns block with text on the left side and checkmark list on the rightside';

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
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'title' => $this->title(),
            'description' => $this->description(),
            'subtitle' => $this->subtitle(),
            'items' => $this->items(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('text_and_checkmarks_block');

        $fields
            ->addWysiwyg('title', [
                'label' => 'Title',
                'instructions' => 'Mark a part of text as bold to color in accent color',
            ])
            ->addWysiwyg('description', [
                'label' => 'Description',
            ])
            ->addTextarea('subtitle', [
                'label' => 'Subtitle',
                'rows' => 2,
                'new_lines' => 'br',
            ])
            ->addRepeater('items', [
                'max' => 3,
                'button_label' => 'Add Item',
            ])
                ->addText('title')
                ->addText('description')
            ->endRepeater();

        return $fields->build();
    }


    public function items()
    {
        return get_field('items') ?: [];
    }

    public function title()
    {
        return get_field('title') ?? false;
    }

    public function description()
    {
        return get_field('description') ?? false;
    }

    public function subtitle()
    {
        return get_field('subtitle') ?? false;
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
        return 'wp-block-text-checkmarks-block pb-10 lg:pt-14 lg:pb-20 text-center lg:text-left';
    }
}
