<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class LoanDataBlock extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Loan Data Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A columns with a data filled at Loan form';

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
            'amount_icon' => $this->amount_icon(),
            'amount_title' => $this->amount_title(),
            'amount_value' => $this->amount_value(),
            'purpose_icon' => $this->purpose_icon(),
            'purpose_title' => $this->purpose_title(),
            'purpose_value' => $this->purpose_value(),
            'duration_icon' => $this->duration_icon(),
            'duration_title' => $this->duration_title(),
            'duration_value' => $this->duration_value(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('loan_data_block');

        $fields
            ->addImage('amount_icon', [
                'label' => 'Loan amount icon',
            ])
            ->addText('amount_title', [
                'label' => 'Loan amount title',
            ])
            ->addImage('purpose_icon', [
                'label' => 'Loan purpose icon',
            ])
            ->addText('purpose_title', [
                'label' => 'Loan purpose title',
            ])
            ->addImage('duration_icon', [
                'label' => 'Loan duration icon',
            ])
            ->addText('duration_title', [
                'label' => 'Loan duration title',
            ]);

        return $fields->build();
    }

    /**
     * Retrieve the items.
     *
     * @return array
     */
    public function amount_icon()
    {
        return get_field('amount_icon') ?? false;
    }

    public function amount_title()
    {
        return get_field('amount_title') ?? false;
    }

    public function purpose_icon()
    {
        return get_field('purpose_icon') ?? false;
    }

    public function purpose_title()
    {
        return get_field('purpose_title') ?? false;
    }

    public function duration_icon()
    {
        return get_field('duration_icon') ?? false;
    }

    public function duration_title()
    {
        return get_field('duration_title') ?? false;
    }

    public function amount_value()
    {
        if (isset($_GET['amount']) && is_numeric($_GET['amount'])) {
            return number_format($_GET['amount'], 0, '.', ',');
        }
        return false;
    }

    public function purpose_value()
    {
        if (isset($_GET['purpose'])) {
            return htmlspecialchars($_GET['purpose']);
        }
        return false;
    }

    public function duration_value()
    {
        if (isset($_GET['duration']) && is_numeric($_GET['duration'])) {
            $duration = $_GET['duration'];
            return $duration . ' ' . \Illuminate\Support\Str::plural('year', $duration);
        }
        return false;
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
        return 'wp-block-loan-data-block py-10';
    }
}
