<x-layout :title="trans('dashboard.home')" :breadcrumbs="['dashboard.home']">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                    <div class="col-md-3">
                        @include('dashboard::components.info-box', [
                            'icon_color' => 'black',
                            'icon' => 'users',
                            'text' => trans('profiles.plural'),
                            'number' => number_format($profilesCount),
                        ])
                    </div>
            </div>
        </div>
    </div>

</x-layout>
