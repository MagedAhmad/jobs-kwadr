@include('dashboard.errors')

@bsMultilangualFormTabs
{{ BsForm::text('name') }}
@endBsMultilangualFormTabs


@isset($customer)
    {{ BsForm::image('image')->collection('avatars')->files($customer->getMediaResource('image')) }}
@else
    {{ BsForm::image('image')->collection('image') }}
@endisset
