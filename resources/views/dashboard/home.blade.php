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
                    <div class="col-md-3">
                        @include('dashboard::components.info-box', [
                            'icon_color' => 'green',
                            'icon' => 'users',
                            'text' => trans('profiles.complete'),
                            'number' => number_format($profilesComplete),
                        ])
                    </div>
                    <div class="col-md-3">
                        @include('dashboard::components.info-box', [
                            'icon_color' => 'danger',
                            'icon' => 'users',
                            'text' => trans('profiles.in_complete'),
                            'number' => number_format($profilesInComplete),
                        ])
                    </div>
            </div>
        </div>
    </div>

</x-layout>
