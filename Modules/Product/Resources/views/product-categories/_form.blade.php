<div data-repeater-item class="outer">
    @component('common-components.forms.text')
        @slot('field') {{localize_field('name')}} @endslot
        @slot('label') {{ _t('name') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('name') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text-area')
        @slot('field') {{localize_field('description')}} @endslot
        @slot('label') {{ _t('description') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('description') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.select',[
        'options' => \Modules\Product\Entities\ProductCategory::statuses(),
        'props' => [],
    ])
        @slot('field') status @endslot
        @slot('label') {{ _t('status') }} @endslot
    @endcomponent

    @component('common-components.forms.select',[
        'options' => $parents,
        'props' => ['class' => 'select2'],
    ])
        @slot('field') parent_id @endslot
        @slot('label') {{ _t('parent') }} @endslot
    @endcomponent

    @component('common-components.forms.checkbox')
        @slot('field') is_feature @endslot
        @slot('label') {{ _t('featured') }} @endslot
    @endcomponent

    @component('common-components.forms.image-view')
        @slot('path') {{ isset($productCategory) ? $productCategory->thumbnail : noImage() }} @endslot
    @endcomponent

    @component('common-components.forms.file')
        @slot('field') thumbnail @endslot
        @slot('label') {{ _t('thumbnail') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('thumbnail') . '...' }} @endslot
    @endcomponent
</div>
