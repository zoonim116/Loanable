<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class FormWrapperBlock extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Form Wrapper Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A FF wrapper';

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
            'shortcode' => $this->shortcode(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('form_wrapper_block');

        $fields
            ->addText('shortcode', [
                'label' => 'Shortcode',
                'instructions' => 'Enter shortcode like [your_shortcode]',
                'required' => true,
            ]);

        return $fields->build();
    }

    /**
     * Retrieve the items.
     *
     * @return array
     */
    public function shortcode()
    {
        return get_field('shortcode') ?? false;
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
        return 'wp-block-form-wrapper-block  py-10 lg:py-20 bg-blue-300';
    }
}
