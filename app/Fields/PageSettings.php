<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class PageSettings extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('page_settings');

        $fields
            ->setLocation('post_type', '==', 'page');

        $fields
            ->addTrueFalse('hide_cta', [
                'label' => __('Hide CTA button?', 'sage'),
                'ui_on_text' => 'Yes',
                'ui_off_text' => 'No',
                'default' => false,
            ]);

        return $fields->build();
    }
}
